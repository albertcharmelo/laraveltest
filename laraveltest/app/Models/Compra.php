<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'factura_id',
        'producto_id',
    ];

    protected $with = ['producto'];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
