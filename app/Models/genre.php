<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class genre extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function komiks()
    {
        return $this->hasMany(komik::class);
    }
}
