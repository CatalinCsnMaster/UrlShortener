<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use JamesDordoy\LaravelVueDatatable\Traits\LaravelVueDatatableTrait;

class Url extends Model
{
    use HasFactory, LaravelVueDatatableTrait;

    protected $fillable = [
        'id',
        'destination',
        'slug',
    ];

    protected $casts = [
        'created_at' => 'datetime:d/m/Y h:i A'
    ];

    protected $appends = ['shortened_url'];

    public function getShortenedUrlAttribute()
    {
        return \URL::to('/') . '/' . $this->slug;
    }
}
