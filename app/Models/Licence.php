<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Licence extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'first_name',
        'last_name',
        'adress',
        'phone_number',
        'birthday_date',
        'licence_category_1',
        'licence_category_2',
        'licence_category_3',
        'licence_season_1',
        'licence_season_2',
        'licence_season_3',
        'licence_number_1',
        'licence_number_2',
        'licence_number_3',
        'club_name',
        'country',
        'created_by',
        'picture_url'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'birthday_date' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

}
