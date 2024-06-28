<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use App\Models\Classes;
use App\Models\FeeHead;
use App\Models\FeeStructure;
use Illuminate\Http\Request;

class FeeStructureController extends Controller
{
    public function index()
    {
        $data['academic_year'] = AcademicYear::all();
        $data['class'] = Classes::all();
        $data['fee_head'] = FeeHead::all();
        return view('admin.fee-structure.fee_structure', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'academic_year_id' => 'required',
            'class_id' => 'required',
            'fee_head_id' => 'required',
        ]);

        FeeStructure::create($request->all());
        return redirect()->route('fee-structure.create')->with('success', 'Fee Structure created successfully');
    }

    public function read()
    {
        $data['fee_structure'] = FeeStructure::with(['FeeHead', 'AcademicYear', 'Class'])->latest()->get();
        return view('admin.fee-structure.fee_structure_list', $data);
    }

    public function delete($id)
    {
        $data = FeeHead::find($id);
        $data->delete();
        return redirect()->route('fee-head.read')->with('success', 'Fee Head deleted successfully');
    }

    public function edit($id)
    {
        $data['fee_structure'] = FeeStructure::find($id);
        return view('admin.fee-structure.edit_fee_structure', $data);
    }

    public function update(Request $request)
    {
        $data = FeeHead::find($request->id);
        $data->name = $request->name;
        $data->update();
        return redirect()->route('fee-head.read')->with('success', 'Fee Head updated successfully');
    }
}
