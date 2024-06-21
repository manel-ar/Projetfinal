<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonCommandeFournisseur extends Model
{
    use HasFactory;

    protected $table = 'bon_commande_fournisseurs';

    protected $primaryKey = 'id';

    protected $fillable = [
        'num_bcf',
         'nom_fournisseur',
         'date',
         'nom_service_contractant',
         'email_fournisseur',
         'id_chef_pharmacien',
         'id_pharmacien'
     ];

     public function pharmacien()
     {
         return $this->belongsTo(Pharmacist::class, 'id');
     }

     public function chefPharmacien()
     {
         return $this->belongsTo(ChiefPharmacist::class, 'id');
     }

     public function lignesBCF()
     {
         return $this->hasMany(LigneBonCommandeFournisseur::class, 'id_bcf');
     }


}

