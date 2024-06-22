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
         'id_pharmacien',
         'is_validated', // Ajoutez cette ligne

     ];

     public function pharmacist()
     {
         return $this->belongsTo(Pharmacist::class, 'id_pharmacien');
     }

     public function chiefPharmacist()
     {
         return $this->belongsTo(ChiefPharmacist::class, 'id_chef_pharmacien');
     }

     public function lignesBCF()
     {
         return $this->hasMany(LigneBonCommandeFournisseur::class, 'id_bcf');
     }

     public function bonReceptions()
     {
         return $this->hasMany(BonReception::class, 'id_bcf');
     }

     public static function generateBonCommandeNumber()
     {
         $lastBon = self::orderBy('num_sequence', 'desc')->first();
         $nextNumSequence = $lastBon ? $lastBon->num_sequence + 1 : 1;

         return 'BF' . str_pad($nextNumSequence, 4, '0', STR_PAD_LEFT);
     }

     protected static function boot()
     {
         parent::boot();

         static::creating(function ($model) {
             $lastBon = self::orderBy('num_sequence', 'desc')->first();
             $model->num_sequence = $lastBon ? $lastBon->num_sequence + 1 : 1;
             $model->num_bcf = 'BF' . str_pad($model->num_sequence, 4, '0', STR_PAD_LEFT);
         });
 }


}

