<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CV extends Model
{
    use HasFactory;
    protected $fillable = ['url', 'stagiaire_id'];

    public function stagiaire():BelongsTo
    {
        return $this->belongsTo(Stagiaire::class);
    }

}
