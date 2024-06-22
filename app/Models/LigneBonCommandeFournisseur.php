<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LigneBonCommandeFournisseur extends Model
{
    use HasFactory;
    protected $table = 'ligne_bon_commande_fournisseurs';
    protected $fillable = [
        'quantite_commandee',
        'quantite_restante',
        'id_bcf',
        'id_dci'
    ];

    public function bonCommandeFournisseur()
    {
        return $this->belongsTo(BonCommandeFournisseur::class, 'id_bcf');
    }

    public function dci()
    {
        return $this->belongsTo(Dci::class, 'id_dci');
    }

    public function lignesBonReception()
    {
        return $this->hasMany(LigneBonReception::class, 'id_bcf');
    }



}
