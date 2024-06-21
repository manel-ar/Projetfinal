<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LigneBonCommandeService extends Model
{
    use HasFactory;

    protected $table = 'ligne_bon_commande_service';

    protected $fillable = [
        'id_bcs',
        'id_commerc',
        'quantite_demandee',
        'quantite_restante'
    ];

    public function bonCommandeService()
    {
        return $this->belongsTo(BonCommandeService::class, 'id_bcs');
    }

    public function nomCommercial()
    {
        return $this->belongsTo(NomCommercial::class, 'id_commerc');
    }
}
