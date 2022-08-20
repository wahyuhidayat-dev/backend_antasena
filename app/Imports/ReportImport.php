<?php

namespace App\Imports;

use App\Models\Report;
use Maatwebsite\Excel\Concerns\ToModel;

class ReportImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Report([
            //
            'asset_id' => $row[0],
            'periode' => $row[1],
            'revenue_usd' => $row[2],
            'rate_idr' => $row[3],
            'revenue_idr' => $row[4],
            'label_revenue' => $row[5],
            'get_ugc' => $row[6],
            'marketing' => $row[7],
            'share_revenue' => $row[8],
            'tax' => $row[9],
            'final_revenue' => $row[10],
            'share' => $row[11],
            'ads' => $row[12],
        ]);
    }
}
