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
            'academic_year'=>'required',
            'class'=>'required',
            'fee_head'=>'required'
        ]);
    }
}
