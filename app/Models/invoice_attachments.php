<?php

namespace App\Models;
use App\Models\Invoices;

use Illuminate\Database\Eloquent\Model;

class invoice_attachments extends Model
{
    public function invoice()
    {
        return $this->belongsTo(Invoices::class, 'invoice_id');
    }
}
