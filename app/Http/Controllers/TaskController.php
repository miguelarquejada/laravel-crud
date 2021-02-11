<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;

class TaskController extends Controller
{
    public function list()
    {
        $tasks = Task::all();
        return view('tasks.list', ['tasks' => $tasks]);
    }

    public function add()
    {
        return view('tasks.add');
    }

    public function addAction(Request $request)
    {
        $request->validate([
            'title' => ['required','string']
        ]);

        $title = $request->input('title');
        $task = new Task();
        $task->title = $title;
        $task->save();

        return redirect()->route('tasks.list');
    }

    public function edit($id)
    {
        $task = Task::find($id);
        if($task) {
            return view('tasks.edit', ['task' => $task]);
        }
        
        return redirect()->route('tasks.list');
    }

    public function editAction(Request $request, $id)
    {
        $request->validate([
            'title' => ['required','string']
        ]);

        $title = $request->input('title');
        // $task = Task::find($id);
        // $task->title = $title;
        // $task->save();
        Task::find($id)->update(['title' => $title]);
        
        return redirect()->route('tasks.list');
    }

    public function delete($id)
    {
        Task::find($id)->delete();
        return redirect()->route('tasks.list');
    }

    public function check($id)
    {
        $task = Task::find($id);
        if($task) {
            $task->checked = 1 - $task->checked;
            $task->save();
        }
        return redirect()->route('tasks.list');
    }
}
