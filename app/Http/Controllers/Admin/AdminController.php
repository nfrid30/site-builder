<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ShowRequest;
use App\Http\Requests\Admin\SortRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(): View
    {
        return view('admin.index');
    }

    public function sort(SortRequest $request): void
    {
        $className = 'App\\Models\\' . $request->model;
        $instance = new $className();
        $value = $request->sort;
        $index = 'id';

        batch()->update($instance, $value, $index);
    }

    public function show(ShowRequest $request): void
    {
        $className = 'App\\Models\\' . $request->model;
        $instance = new $className();

        $showValue = $instance->where('id', $request->id)->value('show');
        $instance->where('id', $request->id)->update(['show' => !$showValue]);
    }
}
