<?php

namespace App\Models;
use App\Models\Sections;
use App\Models\invoices_details;
use App\Models\invoice_attachments;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Database\Eloquent\Model;



class Invoices extends Model
{
    protected $guarded = [];

    public function details(): HasMany
    {
        return $this->hasMany(invoices_details::class, 'id_Invoice', 'id');
    }

    public function attachments(): HasMany
    {
        return $this->hasMany(Invoice_attachments::class, 'invoice_id', 'id');
    }
    public function section() {
        return $this->belongsTo(Sections::class, 'section_id');  // تأكد من أن المفتاح الأجنبي section_id موجود
    }
    

}