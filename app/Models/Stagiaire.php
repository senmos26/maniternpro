<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stagiaire extends Model
{
    use HasFactory;
    protected $fillable = ['cin', 'nom', 'prenom', 'email', 'Tel', 'etablissement_id', 'stage_id', 'bureau_id'];

    public function etablissement()
    {
        return $this->belongsTo(Etablissement::class);
    }

    public function stage()
    {
        return $this->belongsTo(Stage::class);
    }

    public function bureau()
    {
        return $this->belongsTo(Bureau::class);
    }
}
