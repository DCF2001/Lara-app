<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class StudentController extends Controller
{
    
      //Display a listing of the resource.
     
    public function index(): View
    {
        $students = Student::all();
        return view("students.index")->with('students', $students);
    }

    
      //Show the form for creating a new resource.
     
    public function create(): View
    {
        return view('students.create');
    }

    
      //Store a newly created resource in storage.
     
    public function store(Request $request): RedirectResponse
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'mobile' => 'required|digits:10',
        ]);

        // Create the student
        Student::create($validated);

        // Redirect back to the student list
        return redirect()->route('students.create')->with('success', 'Student created successfully!');
    }

    
     //Display the specified resource.
     
    public function show(string $id): View
    {
        $students = Student::findOrFail($id);
        return view('students.show')->with('students',$students);
    }

    
      //Show the form for editing the specified resource.
     
    public function edit(string $id): View
    {
        $students = Student::findOrFail($id);
        return view('students.edit')->with('students', $students);
    }
    

    
    public function update(Request $request, string $id): RedirectResponse
    {
        $students = Student::find($id);
        $input = $request->all();
        $students->update($input);
        return redirect('students')->with('flash_message', 'student Updated!');  
    }
    
    public function destroy(string $id): RedirectResponse
    {
        Student::destroy($id);
        return redirect('students')->with('flash_message', 'Student deleted!'); 
    }
}