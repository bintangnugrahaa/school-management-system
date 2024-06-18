<?php

namespace App\Http\Controllers;

use App\Models\FeeHead;
use Illuminate\Http\Request;

class FeeHeadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.fee-head.fee_head');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $data = new FeeHead();
        $data->name = $request->name;
        $data->save();

        return redirect()->route('fee-head.create')->with('success', 'Class created successfully');
    }

    public function read()
    {
        $data['fee_head'] = FeeHead::get();
        return view('admin.fee-head.fee_head_list', $data);
    }

    public function delete($id)
    {
        $data = FeeHead::find($id);
        $data->delete();
        return redirect()->route('fee-head.read')->with('success', 'Fee Head deleted successfully');
    }

    public function edit($id)
    {
        $data['fee_head'] = FeeHead::find($id);
        return view('admin.fee-head.edit_fee_head', $data);
    }

    public function update(Request $request)
    {
        $data = FeeHead::find($request->id);
        $data->name = $request->name;
        $data->update();
        return redirect()->route('fee-head.read')->with('success', 'Fee Head updated successfully');
    }
}
