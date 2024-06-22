<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonlivraisonService extends Model
{
    use HasFactory;

    protected $table = 'bonlivraison_service';

    protected $fillable = ['num_bls', 'date', 'id_pharmacien', 'id_chef', 'id_bcs'];
    public function pharmacien()
    {
        return $this->belongsTo(Pharmacist::class, 'id_pharmacien');
    }

    public function chef()
    {
        return $this->belongsTo(ChiefPharmacist::class, 'id_chef');
    }

    public function bonCommandeService()
    {
        return $this->belongsTo(BonCommandeService::class, 'id_bcs');
    }

    public function lignes()
    {
        return $this->hasMany(LigneBonLivraison::class, 'id_bls');
    }
    public function ordonnance()
    {
        return $this->belongsTo(Ordonnance::class, 'id_ordonnance');
    }
    public function bonCommande()
    {
        return $this->belongsTo(BonCommandeService::class, 'id_bcs', 'id');
    }
    // codification
    public static function generateBonLivraisonNumber()
    {
        $lastBon = self::orderBy('num_sequence', 'desc')->first();
        $nextNumSequence = $lastBon ? $lastBon->num_sequence + 1 : 1;

        return 'BL' . str_pad($nextNumSequence, 3, '0', STR_PAD_LEFT);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $lastBon = self::orderBy('num_sequence', 'desc')->first();
            $model->num_sequence = $lastBon ? $lastBon->num_sequence + 1 : 1;
            $model->num_bls = 'BL' . str_pad($model->num_sequence, 3, '0', STR_PAD_LEFT);
        });
    }

}
