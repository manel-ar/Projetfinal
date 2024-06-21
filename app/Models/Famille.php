<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Famille extends Model
{
    protected $table = 'famille';
    public function dcis()
    {
        return $this->hasMany(Dci::class);
    }
}
