<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    //
    public function index()
    {
        $students = Student::orderBy('student_id', 'ASC')
            ->paginate(10);

        return view('student.list', compact('students'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        try {
            $student = new Student();
            $student->name = $request->input('name');
            $student->surname = $request->input('surname');
            $student->department = $request->input('department');
            $student->email = $request->input('email');
            $student->phone = $request->input('phone');

            $student->save();

            return redirect()->back()->with('messages', 'Student has been created successfully!');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while adding the student.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::find($id);
        return view('student.detail', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::find($id);
        return view('student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // Formdan gelen verileri kontrol et
        $this->validate($request, [
            'name' => 'required',
            'surname' => 'required',
            'department' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        $student = Student::find($request->id);

        if (!$student) {
            return redirect()->back()->with('error', 'Student not found.');
        }

        $student->name = $request->name;
        $student->surname = $request->surname;
        $student->department = $request->department;
        $student->email = $request->email;
        $student->phone = $request->phone;

        $student->update();
        return redirect()->back()->with('messages', 'Student has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::find($id);
        $student->delete();

        return redirect()->back()->with('messages', 'Student has been deleted successfully!');
    }
}

