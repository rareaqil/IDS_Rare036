<?php

namespace App\Exports;

use App\Models\M_pengguna;
use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\WithHeadings;

class customerexport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return M_pengguna::select(
            'id_customer','nama','alamat','kodepos',
            'created_at',
            'updated_at',
        )->get();
    }

    public function headings(): array
    {
        return [
            'id_customer',
            'nama',
            'alamat',
            'kodepos',
            'created_at',
            'updated_at',
        ];
    }
}
