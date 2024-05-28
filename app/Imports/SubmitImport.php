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
            'name'     => empty($row[0]) ? 'null' : $row[0],
            'phone'     => empty($row[1]) ? 'null' : $row[1],
            'email'    => empty($row[2]) ? 'null' : $row[2],
            'description' => empty($row[3]) ? 'null' : $row[3],
            'fld_id' => empty($row[4]) ? 1 : $row[4],
            'cty_id' => empty($row[5]) ? 1 : $row[5],
        ]);
    }
}
