<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'name',
        'profile_image',
        'email',
        'birthplace',
        'birthdate',
        'phone',
        'description',
        'detail',
    ];

    protected $dates = ['birthdate'];

    public function educations() {
        return $this->hasMany(Education::class)->orderBy('start_at');
    }

    public function experiences() {
        return $this->hasMany(Experience::class)->orderBy('start_at');
    }

    public function user() {
        return $this->hasOne(User::class);
    }
}
