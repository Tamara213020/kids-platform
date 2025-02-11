<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class CourseController extends Controller
{
    public function show(Course $course): Response
    {
        $course->loadMissing('lectures');
        return Inertia::render('Course/Show', compact('course'));
    }
}
