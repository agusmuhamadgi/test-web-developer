<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\VideoRequest;

class Video extends Model
{
    //
    protected $table = 'videos';
    protected $fillable = [
        'title',
        'description',
        'url',
    ];

     public function requests()
    {
        return $this->hasMany(VideoRequest::class);
    }
}
