<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'estado',
    ];

    protected $with = ['compras', 'user'];


    public function compras()
    {
        return $this->hasMany(Compra::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
