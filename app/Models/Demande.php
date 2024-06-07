<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Demande extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'objet',
        'description',
        'lieux',
        'type',
        'date',
        'user_id',
        'etat',
    ];

    public function userId(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
