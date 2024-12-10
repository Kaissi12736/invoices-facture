<?php

namespace App\Models;
use App\Models\Sections;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class products extends Model

{
    // protected $fillable = [
    //     'Product_name',
    //     'section_id',
    //     'description',

    // ];
    // public function section(): BelongsTo
    // {
       
    //     return $this->belongsTo(Sections::class, 'section_id', 'id');
        
    // }
}
