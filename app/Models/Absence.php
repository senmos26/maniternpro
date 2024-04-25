<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    use HasFactory;
    protected $fillable = ['date_debut', 'date_fin', 'justification', 'stagiaire_id'];

    public function stagiaire()
    {
        return $this->belongsTo(Stagiaire::class);
    }
}
