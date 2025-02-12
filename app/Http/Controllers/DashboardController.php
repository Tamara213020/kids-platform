<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $courses = Course::query()
            ->withCount('lectures', 'users')
            ->get();

        return Inertia::render('Dashboard', compact('courses'));
    }
}
