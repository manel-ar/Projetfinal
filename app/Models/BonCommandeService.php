<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonCommandeService extends Model
{
    protected $table = 'bon_commande_service';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id_phar',
        'id_doc',
        'service_id',
        'num_bc',
        'date',
        'etat',
    ];

    public function pharmacien()
    {
        return $this->belongsTo(Pharmacist::class, 'id_phar');
    }

    public function medecin()
    {
        return $this->belongsTo(Doctor::class, 'id_doc');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
    public function bonLivraisons()
    {
        return $this->hasMany(BonLivraisonService::class, 'id_bcs');
    }


    public function lignes()
    {
        return $this->hasMany(LigneBonCommandeService::class, 'id_bcs');
    }

    public function ordonnances()
    {
        return $this->hasMany(Ordonnance::class, 'id_bcs');
    }
    // codification
    public static function generateBonCommandeNumber()
    {
        $lastBon = self::orderBy('num_sequence', 'desc')->first();
        $nextNumSequence = $lastBon ? $lastBon->num_sequence + 1 : 1;

        return 'BC' . str_pad($nextNumSequence, 3, '0', STR_PAD_LEFT);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $lastBon = self::orderBy('num_sequence', 'desc')->first();
            $model->num_sequence = $lastBon ? $lastBon->num_sequence + 1 : 1;
            $model->num_bc = 'BC' . str_pad($model->num_sequence, 3, '0', STR_PAD_LEFT);
        });
    }
}
