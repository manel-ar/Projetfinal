<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordonnance extends Model
{
    use HasFactory;

    protected $table = 'ordonnance';

    protected $fillable = [
        'num_sequence',
        'id_bcs',
        'nom_patient',
        'prenom_patient',
        'age',
        'date',
        'id_doc',
        'num_ordo', 'etat',

    ];

    public function lignes()
    {
        return $this->hasMany(LigneOrdonnance::class, 'id_ord');
    }

    public function bonCommandeService()
    {
        return $this->belongsTo(BonCommandeService::class, 'id_bcs');
    }

    public function medecin()
    {
        return $this->belongsTo(Doctor::class, 'id_doc');
    }
    public function service()
    {
        return $this->belongsTo(Service::class, 'id_service');
    }


    // codification
    public static function generateOrdonnanceNumber()
    {
        $lastOrdo = self::orderBy('num_sequence', 'desc')->first();
        $nextNumSequence = $lastOrdo ? $lastOrdo->num_sequence + 1 : 1;

        return 'ORD' . str_pad($nextNumSequence, 3, '0', STR_PAD_LEFT);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $lastOrdo = self::orderBy('num_sequence', 'desc')->first();
            $model->num_sequence = $lastOrdo ? $lastOrdo->num_sequence + 1 : 1;
            $model->num_ordo = 'ORD' . str_pad($model->num_sequence, 3, '0', STR_PAD_LEFT);
        });
    }
}
