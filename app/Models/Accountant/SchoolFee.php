<?php

namespace App\Models\Accountant;
use App\Models\Administrator\Student;
use App\Models\Classes\_Class;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolFee extends Model
{
    use HasFactory;
    protected $guarded = [];

    
    // relationships

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function class()
    {
        return $this->belongsToThrough(_class::class, Student::class);
    }

}
