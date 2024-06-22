<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Dci extends Model
{
    protected $table = 'dci';
    protected $fillable = [
        'IDdci', 'dci', 'forme', 'dosage',
        'quantite_en_stock', 'prix_unitaire',
        'Montant', 'date_peremption', 'numero_lot', 'famille_id'
    ];
    public function famille()
    {
        return $this->belongsTo(Famille::class);
    }
    public function nomCommercial()
    {
        return $this->hasMany(NomCommercial::class, 'id_dci');
    }

    public function lignesBCF()
    {
      return $this->belongsTo(LigneBonCommandeFournisseur::class, 'IDdci');
  }


    // public function quantiteLivreEntreDates($startDate, $endDate)
    // {
    //     if ($this->nomCommercial) {
    //         return $this->nomCommercial
    //             ->flatMap->ligneBonLivraisons
    //             ->whereBetween('created_at', [$startDate, $endDate])
    //             ->sum('quantite_livree');
    //     }
    //     return 0;
    // }

    //

    public function quantiteLivreEntreDates($startDate, $endDate)
    {
        if ($this->nomCommercial) {
            return $this->nomCommercial
                ->flatMap->ligneBonLivraisons
                ->whereBetween('created_at', [$startDate, $endDate])
                ->sum('quantite_livree');
        }
        return 0;
    }

    public function quantiteRecueEntreDates($startDate, $endDate)
    {
        if ($this->nomCommercial) {
            return $this->nomCommercial
                ->flatMap->ligneBonReceptions
                ->whereBetween('created_at', [$startDate, $endDate])
                ->sum('quantite_recue');
        }
        return 0;
    }




}
