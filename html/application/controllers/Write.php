<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Write extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //$this->load->library('Pdf_cls');
    }

    public function index()
    {

    }

    private function openFile($filename)
    {
        $file_path = './exports/'.$filename;
        header('Content-type: application/pdf');
        header('Content-Disposition: inline; filename="' . $filename . '"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges: bytes');
        @readfile($file_path);
    }

    public function test()
    {
        $filename = '123';

        $mpdf = new \Mpdf\Mpdf(array(
            '',
            array(100,25),
            6,
            'garuda',
            0,
            0,
            1,
            0,
            0,
            0,
            'P'
        ));

        $mpdf->WriteHTML('Test');
        $mpdf->Output('./exports/'.$filename,'F');

        $this->openFile($filename);
    }
}
