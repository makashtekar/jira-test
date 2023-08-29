<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {


        return [
            'project_id' => Project::all()->random()->id,
            'title' => fake()->words(4, true),
            'description' => fake()->sentence(10),
            'priority' => rand(0,50),
            'status' =>  fake()->randomElement(Task::getStatuses()),
            'deadline' => fake()->dateTimeBetween('-1 week', '+1 week'),
        ];
    }
}
