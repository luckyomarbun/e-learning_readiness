<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriorityVectorAlternative extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function alternatives()
    {
        return $this->belongsTo(Alternative::class);
    }

    public function criterias()
    {
        return $this->belongsTo(Criteria::class);
    }
}
