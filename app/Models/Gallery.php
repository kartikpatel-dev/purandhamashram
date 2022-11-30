<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'file_name',
        'file_path',
        'status',
        'permission',
        'file_size',
    ];

    public function getFileSizeAttribute($value)
    {
        $units = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
        $power = $value > 0 ? floor(log($value, 1024)) : 0;
        return number_format($value / pow(1024, $power), 2, '.', ',') . ' ' . $units[$power];
    }
}
