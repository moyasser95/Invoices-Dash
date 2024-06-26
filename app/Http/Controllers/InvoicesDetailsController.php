<?php

namespace App\Http\Controllers;

use App\Models\Invoices;
use Illuminate\Http\Request;
use App\Models\InvoicesDetails;
use App\Models\InvoiceAttachments;
use Illuminate\Support\Facades\Storage;
use Illuminate\Filesystem\Filesystem;


class InvoicesDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        // return $id;
        // return view('Invoices.details_invoice');
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
    public function show(InvoicesDetails $invoicesDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // return $id;
        $invoices = Invoices::where('id',$id)->first();
        $details  = InvoicesDetails::where('id_Invoice',$id)->get();
        $attachments  = InvoiceAttachments::where('invoice_id',$id)->get();

        return view('Invoices.details_invoice',compact('invoices','details','attachments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InvoicesDetails $invoicesDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $invoices = InvoiceAttachments::findOrFail($request->id_file);
        $invoices->delete();
        Storage::disk('public_uploads')->delete($request->invoice_number.'/'.$request->file_name);

        return back()->with("Ms_details","تم حذف المرفق بنجاح");
    }
    public function getFile($invoice_number,$file_name)

    {
        $contents= Storage::disk('public_uploads')->path($invoice_number . '/' . $file_name);
        return response()->download( $contents);
    }

    public function openFile($invoice_number, $file_name)
    {
    $files = Storage::disk('public_uploads')->path($invoice_number . '/' . $file_name);
    return response()->file($files);
    }
}













