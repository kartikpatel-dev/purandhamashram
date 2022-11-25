<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AshramVisitor extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'checkin_date',
        'checkin_time',
        'checkout_date',
        'checkin_time',
        'number_of_person',
    ];

    /**
     * Get the user ashram visited.
     */
    public function visitedUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
