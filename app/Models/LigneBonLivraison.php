<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LigneBonLivraison extends Model
{
    use HasFactory;

    protected $table = 'ligne_bon_livraison';

    protected $fillable = ['id_commerc', 'quantite_demandee', 'quantite_livree', 'quantite_restante', 'prix_unit',
    'Montant', 'id_bls'];
    public function bonLivraisonService()
    {
        return $this->belongsTo(BonLivraisonService::class, 'id_bls');
    }

    public function nomCommercial()
    {
        return $this->belongsTo(NomCommercial::class, 'id_commerc', 'id_commerc');
    }
    public function dci()
    {
        return $this->belongsTo(DCI::class, 'id_dci');
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function ($ligneBonLivraison) {
            $dci = $ligneBonLivraison->nomCommercial->dci;
            $dci->quantite_en_stock -= $ligneBonLivraison->quantite_livree;
            $dci->Montant -= $ligneBonLivraison->Montant;
            $dci->save();
        });
    }

}
