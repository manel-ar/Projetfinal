<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonReception extends Model
{
    use HasFactory;
    protected $table = 'bon_receptions';
    protected $primaryKey = 'id';

    protected $fillable = [
        'num_livraison',
        'date_reception',
        'date_livraison',
        'id_bcf',
        'id_chef_pharmacien',
        'id_pharmacien'
    ];
    public function bonCommandeFournisseur()
    {
        return $this->belongsTo(BonCommandeFournisseur::class, 'id_bcf');
    }

    public function lignesBR()
    {
        return $this->hasMany(LigneBonReception::class, 'id_br');
    }
    public function pharmacist()
    {
        return $this->belongsTo(Pharmacist::class, 'id_pharmacien');
    }

    public function chiefPharmacist()
    {
        return $this->belongsTo(ChiefPharmacist::class, 'id_chef_pharmacien');
    }

    public static function generateBonCommandeNumber()
    {
        $lastBon = self::orderBy('num_sequence', 'desc')->first();
        $nextNumSequence = $lastBon ? $lastBon->num_sequence + 1 : 1;

        return 'BR' . str_pad($nextNumSequence, 3, '0', STR_PAD_LEFT);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $lastBon = self::orderBy('num_sequence', 'desc')->first();
            $model->num_sequence = $lastBon ? $lastBon->num_sequence + 1 : 1;
            $model->id_br = 'BR' . str_pad($model->num_sequence, 3, '0', STR_PAD_LEFT);
        });
}


}
