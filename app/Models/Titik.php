<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Titik extends Model
{
    use HasFactory;

    protected $table = 'titiks';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nama',
    ] ;

    public function sensor(){
        return $this->hasMany(Sensor::class,'id_titik');
    }
}
