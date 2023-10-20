<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\ListTask::create([
            'user_id'=>'1',
            'task_name'=>'Testttt',
            'deskripsi'=>'Test Task',
            'gambar_task' => 'public/frontend/images/profil.png',
        ]);
    }
}
