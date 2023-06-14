<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacation extends Model
{
    use HasFactory;
    public function cities()
    {
        return $this->hasOne(city::class);
    }
    public function providedBy()
    {
        return $this->belongsTo(User::class);
    }

    public function bookedBy()
    {
        return $this->belongsTo(User::class);
    }
}
