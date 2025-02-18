<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use App\Models\ChallengeUser;
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

    public function show(Challenge $challenge): Response
    {
        $challenge->load('challengeCodeParts');

        return Inertia::render('Challenge/Show', compact('challenge'));
    }

    public function submit(Challenge $challenge, Request $request): Response
    {
        $correctOrder = $challenge->challengeCodeParts()->orderBy('order')->pluck('id')->toArray();
        $submittedOrder = array_column($request->input('solution'), 'id');

        $isCorrect = $correctOrder === $submittedOrder;

        if ($isCorrect) {
            ChallengeUser::query()
                ->firstOrCreate([
                    'user_id' => auth()->id(),
                    'challenge_id' => $challenge->id,
                ]);

            return Inertia::render('Challenge/Success');
        }

        return Inertia::render('Challenge/Error', compact('challenge'));
    }
}
