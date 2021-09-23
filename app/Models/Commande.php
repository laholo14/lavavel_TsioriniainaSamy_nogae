<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = [
        'PRODUIT_ID',
        'CLIENT_ID',
        'STATUS_PANNIER',
        'QUANTITER'
    ];



    public function client()
    {
        return $this->hasMany(Client::class);
    }

    public function produit()
    {
        return $this->hasMany(Produit::class);
    }
}

