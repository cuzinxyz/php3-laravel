<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
//        $students = Student::all()->orderBy('id', 'ASC')->limit(10);

        $students = Student::select('id', 'name', 'class', 'birthday')
            ->where('id', '>=', 1)
            ->where('id', '<=', 10)
            ->orWhere('name', 'Jonathan Goyette')
            ->orderBy('id', 'DESC')
            ->get();

        $getAnStudent = Student::where('id', 1)->first();

        if($request->input() && $request->search) {
            $students = Student::select('id', 'name', 'class', 'birthday')
                ->where('name', 'LIKE', '%'.$request->search.'%')
                ->get();
        }

        return view('student', [
            'students' => $students,
            'anStudent' => $getAnStudent
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addStudent');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        Student::create($request->validated());

        return redirect()->route('student.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
//        dd($student);
        return view('editStudent', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student['name'] = $request->name;
        $student['birthday'] = $request->birthday;
        $student['class'] = $request->class;

        $student->save();

        return redirect()
            ->route('student.edit', $student->id)
                ->with('success', "Cập nhật thành công!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        if ($student) {
            $student->delete();
            return redirect()->route('student.index')->with('success', 'Student deleted successfully!');
        }
        return redirect()->route('student.index')->with('errors', 'Student not found!');
    }
}
