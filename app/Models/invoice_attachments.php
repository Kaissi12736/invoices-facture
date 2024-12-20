<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\Invoices;



class Invoice_attachments extends Model
{
    public function invoice()
    {
        return $this->belongsTo(Invoices::class, 'invoice_id', 'id');  
    }
    
}
