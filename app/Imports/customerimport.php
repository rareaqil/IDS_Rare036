<?php

namespace App\Imports;

use App\Models\M_pengguna;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Throwable;

class customerimport implements ToModel, WithHeadingRow, SkipsOnError
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    // public function headingRow(): int
    // {
    //     HeadingRowFormatter::default('none');
    //     return 2;
    // }
    
    public function model(array $row)
    {
        return new M_pengguna([
            'id_customer' => $row['id_customer'],
            'nama' => $row['nama'],
            'alamat' => $row['alamat'],
            'kodepos' => $row['kodepos'],
        ]);
    }

    public function onError(Throwable $error){

    }
    
    public function batchSize(): int
    {
        return 1000;
    }
}
