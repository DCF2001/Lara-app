<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher; // Import Teacher model
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $students = Student::all();
        return view("students.index")->with('students', $students);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $teachers = Teacher::all(); // Fetch all teachers
        return view('students.create', compact('teachers')); // Pass teachers to the view
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate the request, including the teacher_id
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'mobile' => 'required|digits:10',
            'teacher_id' => 'required|exists:teachers,id', // Ensure teacher exists
        ]);

        // Save the student with the validated data, including the teacher_id
        Student::create($validated);

        // Redirect back to the student list
        return redirect()->route('students.index')->with('success', 'Student created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $students = Student::findOrFail($id);
        return view('students.show')->with('students', $students);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $students = Student::findOrFail($id);
        $teachers = Teacher::all(); // Fetch all teachers for selection
        return view('students.edit')->with(['students' => $students, 'teachers' => $teachers]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'mobile' => 'required|digits:10',
            'teacher_id' => 'required|exists:teachers,id', // Validate teacher_id
        ]);

        // Find the student by ID and update their details
        $student = Student::findOrFail($id);
        $student->update($validated);

        // Redirect back with a success message
        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Student::destroy($id);
        return redirect()->route('students.index')->with('flash_message', 'Student deleted!');
    }
}

