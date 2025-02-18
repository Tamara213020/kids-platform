<?php

namespace App\Http\Controllers;

use App\Models\Badge;
use App\Models\BadgeUser;
use App\Models\Course;
use App\Models\CourseQuiz;
use App\Models\CourseQuizUser;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class CourseQuizController extends Controller
{
    public function show(Course $course, CourseQuiz $courseQuiz): Response
    {
        $courseQuiz->loadMissing('courseQuizQuestions.courseQuizQuestionAnswers');

        return Inertia::render('Quiz/Show', compact('course', 'courseQuiz'));
    }

    public function submit(Course $course, CourseQuiz $courseQuiz, Request $request): Response
    {
        $totalPoints = $courseQuiz->courseQuizQuestions->sum('points');
        $earnedPoints = 0;

        foreach ($request->answers as $submittedAnswer) {
            $question = $courseQuiz->courseQuizQuestions->firstWhere('id', $submittedAnswer['question_id']);

            if ($question) {
                $correctAnswer = $question->courseQuizQuestionAnswers->where('id', $submittedAnswer['answer_id'])->where('correct', true)->first();

                if ($correctAnswer) {
                    $earnedPoints += $question->points;
                }
            }
        }

        $result = $totalPoints > 0 ? round(($earnedPoints / $totalPoints) * 100) : 0;

        CourseQuizUser::query()
            ->create([
                'user_id' => auth()->id(),
                'course_quiz_id' => $courseQuiz->id,
                'score' => $result,
            ]);

        if ($result > $courseQuiz->min_points) {
            $badge = Badge::query()->inRandomOrder()->first();

            BadgeUser::query()
                ->create([
                    'user_id' => auth()->id(),
                    'badge_id' => $badge->id,
                ]);
        }

        return Inertia::render('Quiz/Result', compact('course', 'courseQuiz', 'result'));
    }
}
