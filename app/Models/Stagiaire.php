<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Storage;

class Stagiaire extends Model
{
    use HasFactory;
    protected $fillable = ['cin', 'nom', 'prenom', 'email', 'tel', 'etablissement_id', 'stage_id', 'bureau_id'];

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
    public function absence():HasOne
    {
        return $this->hasOne(Absence::class);
    }
    public function cv()
    {
        return $this->hasOne(CV::class);
    }
    public function cvUrl(): string
    {

        $cvPath = $this->cv->url;

        // Vérifier si le chemin relatif existe
        if (!$cvPath) {
            echo "null";
        }

        // Concaténer le chemin relatif à l'URL de base du disque 'public'
        return Storage::disk('public')->url($cvPath);
    }
}
