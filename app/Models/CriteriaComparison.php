<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CriteriaComparison extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function valueWeights()
    {
        return $this->hasMany(ValueWeight::class, 'id', 'value_weight_id');
    }

    public function firstCriterias()
    {
        return $this->hasMany(Criteria::class, 'id', 'first_criteria_id');
    }

    public function secondCriterias()
    {
        return $this->hasMany(Criteria::class, 'id', 'second_criteria_id');
    }
}
