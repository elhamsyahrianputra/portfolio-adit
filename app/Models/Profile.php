<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'name',
        'email',
        'birthplace',
        'birthdate',
        'phone',
        'descriptin',
    ];

    public function educations() {
        return $this->hasMany(Education::class);
    }

    public function experiences() {
        return $this->hasMany(Experience::class);
    }
}
