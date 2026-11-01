<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class StudentController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->query('search');

        $students = Student::with('department')
            ->when($search, function ($query, $search) {
                $query->where(
                    'student_name',
                    'like',
                    "%{$search}%"
                );
            })
            ->orderBy('student_name')
            ->paginate(10)
            ->withQueryString();

        return view(
            'students.index',
            compact('students', 'search')
        );
    }

    public function create(): View
    {
        $departments = Department::orderBy('dept_name')->get();

        return view('students.create', compact('departments'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'student_name' => ['required', 'string', 'max:150'],
            'gender' => ['nullable', 'string', 'max:20'],
            'dob' => ['nullable', 'date'],
            'enrollment' => [
                'nullable',
                'string',
                'max:50',
                'unique:students,enrollment',
            ],
            'enrollment_date' => ['nullable', 'date'],
            'description' => ['nullable', 'string'],
            'dept_id' => ['required', 'exists:departments,dept_id'],
        ]);

        Student::create($validated);

        return redirect()
            ->route('students.index')
            ->with('success', 'Student created successfully.');
    }

    public function edit(Student $student): View
    {
        $departments = Department::orderBy('dept_name')->get();

        return view(
            'students.edit',
            compact('student', 'departments')
        );
    }

    public function update(
        Request $request,
        Student $student
    ): RedirectResponse {
        $validated = $request->validate([
            'student_name' => ['required', 'string', 'max:150'],
            'gender' => ['nullable', 'string', 'max:20'],
            'dob' => ['nullable', 'date'],
            'enrollment' => [
                'nullable',
                'string',
                'max:50',
                Rule::unique('students', 'enrollment')
                    ->ignore($student->student_id, 'student_id'),
            ],
            'enrollment_date' => ['nullable', 'date'],
            'description' => ['nullable', 'string'],
            'dept_id' => ['required', 'exists:departments,dept_id'],
        ]);

        $student->update($validated);

        return redirect()
            ->route('students.index')
            ->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student): RedirectResponse
    {
        $student->delete();

        return redirect()
            ->route('students.index')
            ->with('success', 'Student deleted successfully.');
    }
}