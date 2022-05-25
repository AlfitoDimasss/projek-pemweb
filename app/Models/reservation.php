<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function komik()
    {
        return $this->belongsTo(komik::class);
    }

    public function user()
    {
        return $this->belongsTo(user::class);
    }
}
