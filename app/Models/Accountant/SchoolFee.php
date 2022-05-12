<?php

namespace App\Models\Accountant;
use App\Models\Administrator\Student;
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


}
