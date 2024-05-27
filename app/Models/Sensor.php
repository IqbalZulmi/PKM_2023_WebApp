<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    use HasFactory;

    protected $table = 'sensors';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id_titik',
        'turbidity',
        'ph',
        'temperature',
    ] ;

    public function titik(){
        return $this->belongsTo(Titik::class,'id_titik');
    }
}
