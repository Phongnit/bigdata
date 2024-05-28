<?php

namespace App\Exports;

use App\Models\Submit;
use Maatwebsite\Excel\Concerns\FromCollection;

class SubmitExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Submit::all();
    }

    public function headings(): array
    {
        return [
            'Họ tên',
            'Số điện thoại',
            'Email',
            'Lời nhắn',
            'Mã lĩnh vực',
            'Mã Khu vực',
        ];
    }
}
