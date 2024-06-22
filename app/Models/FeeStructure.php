<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeStructure extends Model
{
    use HasFactory;
    protected $fillable = [
        'academic_year_id',
        'class_id',
        'fee_head_id',
        'january',
        'february',
        'march',
        'april',
        'may',
        'june',
        'july',
        'august',
        'september',
        'october',
        'november',
        'december',
    ];

    public function FeeHead()
    {
        return $this->belongsTo(FeeHead::class, 'fee_head_id');
    }

    public function AcademicYear()
    {
        return $this->belongsTo(AcademicYear::class, 'academic_year_id');
    }

    public function Class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }
}
