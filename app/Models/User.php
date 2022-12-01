<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Carbon;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'mobile_number',
        'dial_code',
        'gender',
        'birth_date',
        'address',
        'city',
        'country',
        'occupation',
        'guru',
        'reference_person',
        'avatar',
        'status',
        'profile_update',
        'visitor_status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * This fuction is used to role relationship with user.
     *
     */
    public function role()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    /**
     * This fuction is used to module relationship with user.
     */
    public function modules()
    {
        return $this->belongsToMany(Module::class)->withTimestamps();
    }

    /**
     * Get the last vistior status (Check In) associated with the user.
     */
    public function visitorCheckIn()
    {
        return $this->hasOne(AshramVisitor::class)->latest();
    }

    /**
     * Get the ashram visit latest record associated with the user.
     */
    public function ashramVisit()
    {
        return $this->hasOne(AshramVisitor::class)
            ->where('checkout_date', '<', Carbon::now()->format('Y-m-d'))
            ->latest();
    }

    /**
     * Get the ashram visit all records associated with the user.
     */
    public function ashramVisits()
    {
        return $this->hasMany(AshramVisitor::class);
    }

    /**
     * Get the access all tokens associated with the user.
     */
    public function accessTokens()
    {
        return $this->hasMany(OauthAccessToken::class);
    }
}
