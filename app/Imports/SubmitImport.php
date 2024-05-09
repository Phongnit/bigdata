<?php

namespace App\Imports;

use App\Models\Submit;
use Exception;
use Maatwebsite\Excel\Concerns\ToModel;

class SubmitImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Submit([
            'name'     => $row[0],
            'phone'     => $row[1],
            'email'    => $row[2],
            'description' => $row[3],
            'fld_id' => empty($row[4]) ? 0 : $row[4],
            'cty_id' => empty($row[5]) ? 0 : $row[5],
        ]);
    }
}
