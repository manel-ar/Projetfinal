<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LigneBonReception extends Model
{
    use HasFactory;

    protected $table = 'ligne_bon_receptions';

    protected $fillable = [
        'numero_lot',
        'date_peremption',
        'quantite_recue',
        'quantite_restante',
        'prix_unitaire',
        'montant',
        'id_br',
        'id_commerc',
        'id_bcf'
    ];

    public function bonReception()
    {
        return $this->belongsTo(BonReception::class, 'id_br');
    }

    public function nomCommercial()
    {
        return $this->belongsTo(NomCommercial::class, 'id_commerc');
    }

    public function ligneBonCommandeFournisseur()
    {
        return $this->belongsTo(LigneBonCommandeFournisseur::class, 'id_bcf');
    }

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::created(function ($ligneBonCommandeReception) {
    //         $dci = $ligneBonCommandeReception->nomCommercial->dci;
    //         $dci->quantite_en_stock += $ligneBonCommandeReception->quantite_recue;
    //         $dci->montant += $ligneBonCommandeReception->montant;
    //         $dci->save();
    //     });
    // }
    // protected static function boot()
    // {
    //     parent::boot();

    //     static::created(function ($ligneBonReception) {
    //         $dci = $ligneBonReception->nomCommercial->dci;
    //         $dci->quantite_en_stock += $ligneBonReception->quantite_recue;
    //         $dci->Montant += $ligneBonReception->montant;
    //         $dci->save();
    //     });
    // }

    const TVA_RATE = 0.19; // 19% TVA

    protected static function boot()
    {
        parent::boot();

        static::created(function ($ligneBonReception) {
            $dci = $ligneBonReception->nomCommercial->dci;

            // Calculer le montant avec TVA
            $montantHT = $ligneBonReception->quantite_recue * $ligneBonReception->prix_unitaire;
            $montantTTC = $montantHT * (1 + self::TVA_RATE);
            $ligneBonReception->montant = $montantTTC;

            //  Mettre à jour les quantités et montants en stock
            $dci->quantite_en_stock += $ligneBonReception->quantite_recue;
            $dci->Montant += $ligneBonReception->montant;
            $dci->save();

            // Sauvegarder la ligne de bon de réception avec le montant TTC
            $ligneBonReception->save();
         } );

    }}

