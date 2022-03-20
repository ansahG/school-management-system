<?php

namespace App\Models\headteacher;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Classes\_Class as ClassRoom; 

class Student extends Model
{
    public function getRouteKeyName()
    {
        return '_firstName';
    }
    use HasFactory;

    public $fillable = [
    '_studentAvatar',
    '_firstName',
    '_lastName',
    '_otherName',
    '_birthDate',
    '_ghanaCard',
    '_gender',
    '_religion',
     'class_id',
    '_moreInfo',
    '_parentName',
    '_parentEmail',
    '_parentPhone',
    '_parentGhanaCard',
    'trash',
    ];

    // put class relationship here
    public function class()
    {
        return $this->belongsTo(ClassRoom::class);
    }
}
