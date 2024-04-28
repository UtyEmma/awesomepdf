<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\PdfService;
use Illuminate\Http\Request;

class PdfController extends Controller {


    function fromHtml(Request $request){
        $request->validate([
            'html' => 'required|string'
        ]);

        $pdf = (new PdfService)->fromHtml($request->input('html'));
        return $pdf->content();
    }

}
