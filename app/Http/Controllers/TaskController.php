<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function list()
    {
        $tasks = DB::select('select * from tasks');
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
        DB::insert("insert into tasks (title) values (:title)", [
            'title' => $title
        ]);

        return redirect()->route('tasks.list');
    }

    public function edit($id)
    {
        $task = DB::select("select * from tasks where id = :id", ['id' => $id]);
        if($task) {
            return view('tasks.edit', ['task' => $task[0]]);
        }
        
        return redirect()->route('tasks.list');
    }

    public function editAction(Request $request, $id)
    {
        $request->validate([
            'title' => ['required','string']
        ]);

        $task = DB::select("select * from tasks where id = ?", [$id]);

        $title = $request->input('title');
        DB::insert("update tasks set title = :title where id = :id", [
            'title' => $title,
            'id' => $id
        ]);
        
        return redirect()->route('tasks.list');
    }

    public function delete($id)
    {
        DB::delete('delete from tasks where id = ?', [$id]);
        return redirect()->route('tasks.list');
    }

    public function check($id)
    {
        DB::update('update tasks set checked = 1 - checked where id = ?', [$id]);
        return redirect()->route('tasks.list');
    }
}
