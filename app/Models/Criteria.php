<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }

    public function firstCriteriaComparisons()
    {
        return $this->hasMany(CriteriaComparison::class, 'id');
    }

    public function secondCriteriaComparisons()
    {
        return $this->hasMany(CriteriaComparison::class, 'id');
    }

    public function priorityVectorCriterias()
    {
        return $this->belongsTo(PriorityVectorCriteria::class);
    }

    public function alternativeComparison()
    {
        return $this->belongsTo(AlternativeComparison::class, 'id');
    }
}
