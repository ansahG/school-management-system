<?php

namespace App\Models\classes;
use App\Models\Administrator\Student;
use App\Models\Accountant\SchoolFee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ReportCard;
class _Class extends Model
{
    use HasFactory;
     public function getRouteKeyName()
    {
        return 'class';
    }


      protected $fillable = [
        'class',
        'AKA',
        '_trashed'
      ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }

     public function report()
    {
        return $this->hasMany(ReportCard::class);
    }

    public function schoolFees()
    {
        return $this->hasManyThrough(SchoolFee::class , Student::class);
    }
}
