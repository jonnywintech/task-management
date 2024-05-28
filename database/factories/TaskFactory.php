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
        $priorities = ['high', 'medium', 'normal'];
        $statuses = ['created', 'in progress', 'done'];

        return [
            'name' => $this->faker->name(),
            'photos' => $this->faker->imageUrl(),
            'description' => $this->faker->sentence(3),
            'priority' => $priorities[rand(0, 2)],
            'status' => $statuses[rand(0, 2)],
            'project_id' => Project::factory(),
        ];
    }
}
