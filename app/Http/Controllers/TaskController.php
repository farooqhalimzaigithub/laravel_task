<?php
namespace App\Http\Controllers;

use App\Helpers\ApiHelper;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Fetch all tasks
     */
    public function index()
    {
        $tasks = Task::all();

        return ApiHelper::sendResponse(
            true,
            'Tasks fetched successfully',
            $tasks
        );
    }

    /**
     * Create a new task
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $task = Task::create([
            'title'     => $request->title,
            'completed' => false,
        ]);

        return ApiHelper::sendResponse(
            true,
            'Task created successfully',
            $task,
            201
        );
    }

    /**
     * Toggle task completion (completed <-> pending)
     */
    public function update($id)
    {
        $task            = Task::findOrFail($id);
        $task->completed = ! $task->completed;
        $task->save();

        return ApiHelper::sendResponse(
            true,
            'Task status updated successfully',
            $task
        );
    }

    /**
     * Delete a task
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return ApiHelper::sendResponse(
            true,
            'Task deleted successfully'
        );
    }
}
