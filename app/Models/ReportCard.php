<?php

namespace App\Models;
use App\Models\Administrator\Student;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Classes\_Class as ClassRoom; 


class ReportCard extends Model
{
    use HasFactory;
    // public $guarded = [];

    protected $fillable = [
        '__class',
        '_term',
        '_subject',
        '_classScore',
        '_examsScore',
        '_totalScore',
         '_grade',
        '_remarks',
        '_classTeacherRemark',
        'headTeacherRemark',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

     public function class()
    {
        return $this->belongsTo(ClassRoom::class);
    }
}
