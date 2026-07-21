<?php

namespace App\Http\Controllers;

use App\Exports\PendaftarBnspExport;
use App\Exports\PendaftarKemnakerExport;
use App\Exports\PendaftarLainnyaExport;
use App\Exports\PendaftarSoftskillExport;
use App\Exports\PendaftarInhouseExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportExcelController extends Controller
{
   
    public function export_kemnaker()
    {
        return Excel::download(new PendaftarKemnakerExport,'pendaftarKemnaker.xlsx');
    }

    public function export_bnsp()
    {
        return Excel::download(new PendaftarBnspExport,'pendaftarBnsp.xlsx');
    }

    public function export_softskill()
    {
        return Excel::download(new PendaftarSoftskillExport,'pendaftarSoftskill.xlsx');
    }

    public function export_lainnya()
    {
        return Excel::download(new PendaftarLainnyaExport,'pendaftarLainnya.xlsx');
    }
    
    public function export_inhouse()
    {
        return Excel::download(new PendaftarInhouseExport,'pendaftarInhouse.xlsx');
    }
}
