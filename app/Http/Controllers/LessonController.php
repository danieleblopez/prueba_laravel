<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $lessons = Lesson::all();

        return view('lessons.index', compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('lessons.create');
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
            'name' => 'required|unique:lessons,name,NULL,id,deleted_at,NULL|max:100',
            'description' => 'string'
        ]);

        $lesson = Lesson::create($request->all());

        return redirect()->route('lessons.show', [$lesson->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param Lesson $lesson
     * @return View
     */
    public function show(Lesson $lesson): View
    {
        return view('lessons.show', compact('lesson'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Lesson $lesson
     * @return View
     */
    public function edit(Lesson $lesson): View
    {
        return view('lessons.edit', compact('lesson'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Lesson $lesson
     * @return RedirectResponse
     */
    public function update(Request $request, Lesson $lesson): RedirectResponse
    {
        $request->validate([
            'name' => 'required|unique:lessons,name,'.$lesson->id.',id,deleted_at,NULL|max:100',
            'description' => 'string'
        ]);

        $lesson->fill($request->all());
        $lesson->save();

        return redirect()->route('lessons.show', [$lesson->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Lesson $lesson
     * @return RedirectResponse
     */
    public function destroy(Lesson $lesson): RedirectResponse
    {
        $lesson->delete();

        return redirect()->route('lessons.index');
    }
}
