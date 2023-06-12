<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'profile_id',
        'title',
        'start_at',
        'end_at',
        'place',
        'description',
    ];

    public function profile() {
        return $this->belongsTo(Profile::class);
    }
}
