<?php

namespace App\Exports;

use App\Models\InhouseRegistrant;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PendaftarInhouseExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return InhouseRegistrant::with(['training' => function ($query) {
            $query->select('id', 'name'); 
        }])
        ->select('id', 'name', 'email', 'phone', 'company', 'company_address', 'training_id','created_at') 
        ->get()
        ->map(function ($registrant) {
            return [
                'name' => $registrant->name,
                'training_name' => $registrant->training->name ?? null, 
                'email' => $registrant->email,
                'phone' => $registrant->phone,
                'company' => $registrant->company,
                'company_address' => $registrant->company_address,
                'tanggal'=>$registrant->created_at,
            ];
        });
    }

    public function headings(): array
    {
        return ["Nama", "Training","Email", "No Telepon","Perusahaan","Alamat","Tanggal"];
    }
}
