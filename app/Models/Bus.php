<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use RealRashid\SweetAlert\Facades\Alert;


class Bus extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function seats()
    {
        return $this->hasMany(Seat::class);
    }
}
