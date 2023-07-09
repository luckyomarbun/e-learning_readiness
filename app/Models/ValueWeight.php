<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ValueWeight extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function criteriaComparisons()
    {
        return $this->hasMany(CriteriaComparison::class, 'value_weight_id', 'id');
    }
}
