<?php

namespace App\Models;

use App\Services\ImageService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getUrlAttribute(): string
    {
        return config('app.url') . Storage::url(ImageService::PATH_TO_IMAGE . $this->name);
    }
}
