<?php

namespace App\Models\Accountant;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

 public function getRouteKeyName()
 {
    return '_expenseTitle';
 }
    protected $fillable = [
        'user_id',
        '_expenseTitle',
        '_amountSpending',
        '_date',
        '_description',
        '_approved',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
