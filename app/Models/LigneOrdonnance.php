<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LigneOrdonnance extends Model
{
    use HasFactory;

    protected $table = 'ligne_ordonnance';

    protected $fillable = [
        'id_ord',
        'id_commerc',
        'quantite_demandee',
        'posologie',
        'duree',
    ];

    public function ordonnance()
    {
        return $this->belongsTo(Ordonnance::class, 'id_ord');
    }

    public function nomCommercial()
    {
        return $this->belongsTo(NomCommercial::class, 'id_commerc');
    }
    public function dci()
    {
        return $this->belongsTo(Dci::class, 'id_dci');
    }
}
