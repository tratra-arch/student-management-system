<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Validation\Rule;

class DepartmentController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->query('search');

        $departments = Department::withCount('students')
            ->when($search, function ($query, $search) {
                $query->where('dept_name', 'like', "%{$search}%");
            })
            ->orderBy('dept_name')
            ->paginate(10)
            ->withQueryString();

        return view('departments.index', compact('departments', 'search'));
    }

    public function create(): View
    {
        return view('departments.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'dept_name' => [
                'required',
                'string',
                'max:100',
                'unique:departments,dept_name',
            ],
            'manager_id' => ['nullable', 'integer', 'min:1'],
            'location_id' => ['nullable', 'integer', 'min:1'],
        ]);

        Department::create($validated);

        return redirect()
            ->route('departments.index')
            ->with('success', 'Department created successfully.');
    }

    public function edit(Department $department): View
    {
        return view('departments.edit', compact('department'));
    }

    public function update(
        Request $request,
        Department $department
    ): RedirectResponse {
        $validated = $request->validate([
            'dept_name' => [
                'required',
                'string',
                'max:100',
                Rule::unique('departments', 'dept_name')
                    ->ignore($department->dept_id, 'dept_id'),
            ],
            'manager_id' => ['nullable', 'integer', 'min:1'],
            'location_id' => ['nullable', 'integer', 'min:1'],
        ]);

        $department->update($validated);

        return redirect()
            ->route('departments.index')
            ->with('success', 'Department updated successfully.');
    }

    public function destroy(Department $department): RedirectResponse
    {
        if ($department->students()->exists()) {
            return redirect()
                ->route('departments.index')
                ->with(
                    'error',
                    'Cannot delete this department because students are assigned to it.'
                );
        }

        $department->delete();

        return redirect()
            ->route('departments.index')
            ->with('success', 'Department deleted successfully.');
    }
}