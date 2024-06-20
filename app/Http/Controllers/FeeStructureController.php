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
            'academic_year' => 'required',
            'class' => 'required',
            'fee_head' => 'required'
        ]);
    }

    public function read()
    {
        $data['fee_structure'] = FeeStructure::get();
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
