<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class komik extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function genre()
    {
        return $this->belongsTo(genre::class);
    }

    public function reservations()
    {
        return $this->hasMany(reservation::class);
    }
}
