<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\Badge;
use App\Models\Course;
use App\Models\CourseQuiz;
use App\Models\Lecture;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory(10)->create();

        Badge::factory(10)->create();

        $users->each(function ($user) {
            $randomBadgeCount = rand(1, 5);

            $badges = Badge::query()->inRandomOrder()->take($randomBadgeCount)->pluck('id');

            $user->badges()->attach($badges);
        });

        $courses = Course::factory(10)->create();
        $courses->each(function ($course) {
            Lecture::factory(10)->create(['course_id' => $course->id]);
        });

        Course::all()->each(function ($course) {
            CourseQuiz::factory()->create(['course_id' => $course->id]);
        });

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'role' => UserRole::ADMIN,
            'password' => 'password',
        ]);
    }
}
