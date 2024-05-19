<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    public function index()
    {
        $students = \App\Models\Student::all();
        return view('admin.students.index', ['students' => $students]);
    }

    public function create()
    {
        return view('admin.students.add');
    }

    public function store(StoreStudentRequest $request)
    {
        $validatedData = $request->validated();

        if(isset($validatedData['active'])) {
            $validatedData['active'] = 1;
        } else {
            $validatedData['active'] = 0;
        }

        \App\Models\Student::create($validatedData);

        return redirect()->route('admin.students.index')->with('success', 'Aluno criado com sucesso!');
    }


    public function edit($student)
    {
        $student = \App\Models\Student::find($student);
        $genders = \App\Models\Student::pluck('gender', 'gender')->unique();

        return view('admin.students.edit', ['student' => $student, 'genders' => $genders]);
    }

    public function update(UpdateStudentRequest $request, $studentId)
    {
        $student = \App\Models\Student::findOrFail($studentId);

        $validatedData = $request->validated();

        if(isset($validatedData['active'])) {
            $validatedData['active'] = 1;
        } else {
            $validatedData['active'] = 0;
        }

        $student->update($validatedData);

        return redirect()->route('admin.students.index')->with('success', 'Aluno atualizado com sucesso!');
    }

    public function view($studentId)
    {
        $student = \App\Models\Student::findOrFail($studentId);
        
        return view('admin.students.view', ['student' => $student]);
    }


    public function destroy($studentId)
    {
        $student = \App\Models\Student::findOrFail($studentId);
        $student->delete();
    }

    public function restore($studentId)
    {
        $student = \App\Models\Student::withTrashed()->findOrFail($studentId);
        $student->restore();

        return redirect()->route('admin.students.index')->with('success', 'Aluno restaurado com sucesso.');
    }
}
