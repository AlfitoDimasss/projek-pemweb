<?php

namespace App\Models;

use App\Models\genre;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
