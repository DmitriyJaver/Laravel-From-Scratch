<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Project;


class ProjectTaskController extends Controller
{
    public function update(Task $task)
    {
        /*$task->update([
            'completed' => request()->has('completed')
        ]);*/
        $task->complete(request()->has('completed'));
        return back();
    }
    public function store(Project $project)
    {
        $attributes = request()->validate(['description' => 'required']);
        /**
         * метод addTask написан в App\Task мной
         */
        $project->addTask($attributes);

       return back();
    }

}
