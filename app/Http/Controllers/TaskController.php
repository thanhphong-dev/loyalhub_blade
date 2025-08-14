<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;

class TaskController extends Controller
{
    /**
     * Return view index
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): View
    {
        $employees = User::where('id', '!=', auth()->id())->get();

        return view('work.index', compact('employees'));
    }

    public function create() {}
}
