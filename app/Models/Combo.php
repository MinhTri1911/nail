<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Combo extends Model
{
    protected $fillable = [
        'id',
        'title',
        'description',
        'status',
        'price',
        'sale',
    ];

    public function title($option = false)
    {
        if (!$option) {
            return str_limit($this->attributes['title'], config('settings.length_title_default'));
        }

        return $this->attributes['title'];
    }

    public function comboEvent()
    {
        return $this->hasMany(ComboEvent::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'target');
    }
}
