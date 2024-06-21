<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'doctors';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function bonCommandeServices(){
        return $this->hasMany(BonCommandeService::class, 'id_doc');


    }
}
