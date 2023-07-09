<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    use HasFactory;

    public function alternative()
    {
        return $this->belongsTo(Alternative::class, 'alternative_id', 'id');
    }
}
