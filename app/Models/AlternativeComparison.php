<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlternativeComparison extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function criterias()
    {
        return $this->hasMany(Criteria::class, 'id', 'criteria_id');
    }

    public function firstAlternatives()
    {
        return $this->belongsTo(Alternative::class, 'first_alternative_id', 'id');
    }

    public function secondAlternatives()
    {
        return $this->belongsTo(Alternative::class, 'second_alternative_id', 'id');
    }

    public function valueWeights()
    {
        return $this->belongsTo(ValueWeight::class, 'value_weight_id', 'id');
    }
}
