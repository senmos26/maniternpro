<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attestation extends Model
{
    use HasFactory;
    protected $fillable = ['stagiaire_id', 'stage_id', 'statut', 'bureau_id', 'service_id', 'date_prise'];

    public function stagiaire()
    {
        return $this->belongsTo(Stagiaire::class);
    }

    public function stage()
    {
        return $this->belongsTo(Stage::class);
    }

    public function bureau()
    {
        return $this->belongsTo(Bureau::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
