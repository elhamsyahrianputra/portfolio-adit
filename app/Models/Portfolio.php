<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'profile_id',
        'name',
        'portfolio_image',
        'description',
        'category',
        'client_project',
        'project_date',
        'project_url',
    ];
}
