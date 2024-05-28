<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Project;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@example.com',
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);


        User::factory(10)->create();

        $projects =  Project::factory(20)->create();

        foreach ($projects as $project) {
            $tasks = Task::factory(rand(1,10))->create();
            $index = 1;
            foreach ($tasks as $task) {
                $task->project_id = $project->id;
                $task->position = $index;
                $task->save();
                $index ++;
            }
        }

    }
}
