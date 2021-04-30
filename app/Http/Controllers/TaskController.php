<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\JsonResponse;

class TaskController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        Task::create($request->all());

        return response()->json();
    }

    public function delete(int $id): JsonResponse
    {
        if (!$id) {
            throw new \Exception('Не правильный тип данных');
        }
        Task::destroy($id);

        return response()->json();
    }
}
