<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class humidity extends Model
{
    use HasFactory;

    protected $table = 'humidity';
    protected $primaryKey = 'id';
    protected $fillable = [
        'humidity',
    ];
}
