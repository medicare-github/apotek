<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    use HasFactory;

    public function produks()
    {
        return $this->hasMany(Produk::class);
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function penjualans()
    {
        return $this->hasMany(Penjualan::class);
    }

}
