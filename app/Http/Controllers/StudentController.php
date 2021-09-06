<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $students = Student::all();

        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $lessons = Lesson::all();
        return view('students.create', compact('lessons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'first_name' => 'string|max:30',
            'last_name' => 'string|max:30',
            'email' => 'required|unique:students,email,NULL,id,deleted_at,NULL|max:100',
            'lessons' => 'required|array'
        ]);

        $student = Student::create($request->except(['lessons']));
        $student->lessons()->attach($request->input('lessons'));

        return redirect()->route('students.show', [$student->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param Student $student
     * @return View
     */
    public function show(Student $student): View
    {
        $lessons = [];
        foreach ($student->lessons as $lesson) {
            $lessons[] = $lesson->name;
        }
        $lessons = implode(', ', $lessons);
        return view('students.show', compact('student', 'lessons'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Student $student
     * @return View
     */
    public function edit(Student $student): View
    {
        $lessons = Lesson::all();
        return view('students.edit', compact('student', 'lessons'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Student $student
     * @return RedirectResponse
     */
    public function update(Request $request, Student $student): RedirectResponse
    {
        $request->validate([
            'first_name' => 'string|max:30',
            'last_name' => 'string|max:30',
            'email' => 'required|unique:students,email,'.$student->id.',id,deleted_at,NULL|max:100',
            'lessons' => 'required|array'
        ]);

        $student->fill($request->except(['lessons']));
        $student->save();
        $student->lessons()->attach($request->input('lessons'));

        return redirect()->route('students.show', [$student->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Student $student
     * @return RedirectResponse
     */
    public function destroy(Student $student): RedirectResponse
    {
        $student->delete();

        return redirect()->route('students.index');
    }
}
