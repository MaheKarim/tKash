<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TkashMethod;
use Illuminate\Http\Request;

class TkashMethodController extends Controller
{
    public function index()
    {
        $pageTitle = 'Tkash Methods';
        $methods = TkashMethod::latest()->paginate(getPaginate());
        return view('admin.tkash-methods.index', compact('pageTitle', 'methods'));
    }

    public function create()
    {
        $pageTitle = 'New Tkash Method';
        return view('admin.tkash-methods.create', compact('pageTitle'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'min_trx_limit' => 'required|numeric|gt:0',
            'max_trx_limit' => 'required|numeric|gt:min_trx_limit',
            'fixed_charge' => 'nullable|numeric|gte:0',
            'percent_charge' => 'nullable|numeric|between:0,100',
            'currency' => 'required',
            'rate' => 'required|numeric|between:0,100',
            'user_daily_trx_limit' => 'required|numeric|gt:0',
            'user_monthly_trx_limit' => 'required|numeric|gt:user_daily_trx_limit',
            'agent_daily_trx_limit' => 'required|numeric|gt:0',
            'agent_monthly_trx_limit' => 'required|numeric|gt:agent_daily_trx_limit',
        ]);

        $method = new TkashMethod();
        $method->name = $request->name;
        $method->min_trx_limit = $request->min_trx_limit;
        $method->max_trx_limit = $request->max_trx_limit;
        $method->fixed_charge = $request->fixed_charge;
        $method->percent_charge = $request->percent_charge;
        $method->currency = $request->currency;
        $method->rate = $request->rate;
        $method->user_daily_trx_limit = $request->user_daily_trx_limit;
        $method->user_monthly_trx_limit = $request->user_monthly_trx_limit;
        $method->agent_daily_trx_limit = $request->agent_daily_trx_limit;
        $method->agent_monthly_trx_limit = $request->agent_monthly_trx_limit;
        $method->save();

        $notify[] = ['success', $request->name . ' Method ' . ' created successfully'];
        return to_route('admin.tkash-methods.index')->withNotify($notify);
    }

    public function edit($id)
    {
        $pageTitle = 'Update Tkash Method';
        $method = TkashMethod::findOrFail($id);

        return view('admin.tkash-methods.edit', compact('pageTitle', 'method'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'min_trx_limit' => 'required|numeric|gt:0',
            'max_trx_limit' => 'required|numeric|gt:min_trx_limit',
            'fixed_charge' => 'nullable|numeric',
            'percent_charge' => 'nullable|numeric',
            'currency' => 'required',
            'rate' => 'required|numeric|between:0,100',
            'user_daily_trx_limit' => 'required|numeric|gt:0',
            'user_monthly_trx_limit' => 'required|numeric|gt:user_daily_trx_limit',
            'agent_daily_trx_limit' => 'required|numeric|gt:0',
            'agent_monthly_trx_limit' => 'required|numeric|gt:agent_daily_trx_limit',
        ]);

        $method = TkashMethod::findOrFail($id);
        $method->name = $request->name;
        $method->min_trx_limit = $request->min_trx_limit;
        $method->max_trx_limit = $request->max_trx_limit;
        $method->fixed_charge = $request->fixed_charge;
        $method->percent_charge = $request->percent_charge;
        $method->currency = $request->currency;
        $method->rate = $request->rate;
        $method->user_daily_trx_limit = $request->user_daily_trx_limit;
        $method->user_monthly_trx_limit = $request->user_monthly_trx_limit;
        $method->agent_daily_trx_limit = $request->agent_daily_trx_limit;
        $method->agent_monthly_trx_limit = $request->agent_monthly_trx_limit;
        $method->save();

        $notify[] = ['success', $request->name . ' Method ' . ' updated successfully'];
        return back()->withNotify($notify);
    }

    public function status($id)
    {
        return TkashMethod::changeStatus($id);
    }
}
