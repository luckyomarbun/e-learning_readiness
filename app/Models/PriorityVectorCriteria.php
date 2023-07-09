<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriorityVectorCriteria extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function criterias()
    {
        return $this->belongsTo(Criteria::class);
    }
}
