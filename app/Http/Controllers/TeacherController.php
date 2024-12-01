<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource with optional search functionality.
     */
    public function index(Request $request): View
    {
        $search = $request->input('search');
        $teachers = Teacher::query()
            ->when($search, function ($query, $search) {
                $query->where('name', 'LIKE', "%{$search}%");
            })
            ->orderBy('id', 'asc')
            ->get();

        return view('teachers.index', compact('teachers', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'mobile' => 'required|digits:10',
            'subject' => 'required|string|max:255', // New field validation
        ]);

        // Create the Teacher
        Teacher::create($validated);

        // Redirect back to the Teacher list
        return redirect()->route('teachers.index')->with('success', 'Teacher created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $teacher = Teacher::findOrFail($id);
        return view('teachers.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $teacher = Teacher::findOrFail($id);
        return view('teachers.edit', compact('teacher'));
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
            'subject' => 'required|string|max:255', // New field validation
        ]);

        // Find and update the teacher
        $teacher = Teacher::findOrFail($id);
        $teacher->update($validated);

        return redirect()->route('teachers.index')->with('success', 'Teacher updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Teacher::destroy($id);
        return redirect()->route('teachers.index')->with('success', 'Teacher deleted successfully!');
    }
}
