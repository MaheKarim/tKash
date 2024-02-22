<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TkashMethod;

class TkashMethodController extends Controller
{
    public function index()
    {
        $pageTitle = 'Tkash Methods';
        $methods = TkashMethod::searchable('name')->latest()->paginate(getPaginate());
        return view('admin.tkash-methods.index', compact('pageTitle', 'methods'));
    }

    public function status($id)
    {
        return TkashMethod::changeStatus($id);
    }
}
