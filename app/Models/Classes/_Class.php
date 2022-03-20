<?php

namespace App\Models\classes;
use App\Models\headteacher\Student;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
      ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
