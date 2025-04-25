<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'image',
    ];

    public static function boot()
    {
            parent::boot();

            static::creating(function ($model) {
                if ($model->image) {
                    $filename = basename($model->image);
                    $sourcePath = storage_path("app/temp/{$filename}");
                    $destinationPath = public_path("upload/{$filename}");

                    // Move the file
                    if (file_exists($sourcePath)) {
                        rename($sourcePath, $destinationPath);
                        $model->image = "upload/{$filename}"; // Save public path
                    }
                }
            });
    }

}
