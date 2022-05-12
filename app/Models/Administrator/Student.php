<?php

namespace App\Models\Administrator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Classes\_Class as ClassRoom; 
use App\Models\ReportCard;
use App\Models\Accountant\SchoolFee;
class Student extends Model
{
    public function getRouteKeyName()
    {
        return '_firstName';
    }
    use HasFactory;

    protected $fillable = [
    '_studentAvatar',
    '_firstName',
    '_lastName',
    '_otherName',
    '_birthDate',
    '_ghanaCard',
    '_gender',
    '_religion',
     '__class_id',
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

    public function report()
    {
        return $this->hasMany(ReportCard::class);
    }

        public function schoolFees()
    {
        return $this->hasOne(SchoolFee::class);
    }

}
