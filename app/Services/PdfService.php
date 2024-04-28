<?php

namespace App\Services;

use Beganovich\Snappdf\Snappdf;

class PdfService {

    public $pdf;

    function fromHtml($html){
        $snappdf = new Snappdf;
        $snappdf->setHtml($html);
        $this->pdf = $snappdf->generate();
        return $this;
    }

    function content(){
        return response($this->pdf);
    }

    function stream(){
        return response()->stream(function(){
            echo $this->pdf;
        }, 200, [
            'Content-Type' => 'application/pdf',
        ]);
    }

    function download($name){
        return response($this->pdf, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => "attachment; filename='{$name}'"
        ]);
    }



}
