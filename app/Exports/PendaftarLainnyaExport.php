<?php

namespace App\Exports;

use App\Models\LainnyaCertification;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PendaftarLainnyaExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return LainnyaCertification::with(['training' => function ($query) {
            $query->select('id', 'name');
        }])
            ->select('id', 'name', 'email', 'phone', 'company', 'company_address', 'training_id', 'created_at')
            ->get()
            ->map(function ($certification) {
                return [
                    'name' => $certification->name,
                    'training_name' => $certification->training->name ?? null,
                    'email' => $certification->email,
                    'phone' => $certification->phone,
                    'company' => $certification->company,
                    'company_address' => $certification->company_address,
                    'tanggal' => $certification->created_at,
                ];
            });
    }

    public function headings(): array
    {
        return ["Nama", "Training","Email", "No Telepon","Perusahaan","Alamat","Tanggal"];
    }
}
