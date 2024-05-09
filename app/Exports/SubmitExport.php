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
}
