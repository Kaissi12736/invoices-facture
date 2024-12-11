<?php

namespace App\Http\Controllers;

use App\Models\Invoices;
use Illuminate\Http\Request;
use App\Models\Invoices_details;
use App\Models\invoice_attachments;
use Illuminate\Support\Facades\Storage;
use File;

class InvoiceDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        

        $invoices = Invoices::where('id',$id)->first();
        
        $details  = Invoices_details::where('id_Invoice',$id)->get();
        $attachments  = Invoice_attachments::where('invoice_id',$id)->get();

        return view('invoices.details_invoice',compact('invoices','details','attachments'));
     
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $invoices = invoice_attachments::findOrFail($request->id_file);
        $invoices->delete();
        Storage::disk('public_uploads')->delete($request->invoice_number.'/'.$request->file_name);
        session()->flash('delete', 'تم حذف المرفق بنجاح');
        return back();
    }
    public function get_file($invoice_number,$file_name)

    {
        
        $path = $invoice_number . '/' . $file_name;

        // Generate the full path
        $contents = Storage::disk('public_uploads')->path($path);
        return response()->download($contents);

    }


    public function open_file($invoice_number,$file_name)

    {
        $path = $invoice_number . '/' . $file_name;

        // Generate the full path
        $fullPath = Storage::disk('public_uploads')->path($path);

        return response()->file($fullPath);
    }
}
