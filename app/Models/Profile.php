<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    public function profileImage()
    {
        $imagePath = ($this->image) ? $this->image : 'profile/No_image_available.png';

        return '/storage/' . $imagePath;


    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
