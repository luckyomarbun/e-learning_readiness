<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternative extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function priorityVectorAlternatives()
    {
        return $this->belongsTo(PriorityVectorAlternative::class, 'id');
    }

    public function ranks()
    {
        return $this->belongsTo(Rank::class, 'id');
    }

    public function alternativeComparisons()
    {
        return $this->belongsTo(AlternativeComparison::class, 'id');
    }
}
