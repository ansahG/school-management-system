<?php

namespace App\Models\headTeacher\Events;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public function getRouteKeyName()
    {
        return '_eventName';
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        '_eventName',
        '_ticketPricing',
        '_eventDate',
        '_eventDescription',
        'user_id',
      ];
}
