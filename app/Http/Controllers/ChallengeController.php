<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ChallengeController extends Controller
{
    public function index(): Response
    {
        $challenges = Challenge::all();
        return Inertia::render('Challenge/Index', compact('challenges'));
    }
}
