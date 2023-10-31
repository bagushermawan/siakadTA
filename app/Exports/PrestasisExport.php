<?php

namespace App\Exports;

use App\Models\Prestasi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PrestasisExport implements FromCollection, WithHeadings
{

    public function headings(): array
    {
        return ["id", "nama", "created_at", "updated_at", "deleted_at"];
    }



    public function collection()
    {
        $data = Prestasi::select('id', 'nama', 'created_at', 'updated_at', 'deleted_at')->withTrashed()->get();

        $formattedData = $data->map(function ($item) {
            return [
                $item->id,
                $item->nama,
                $item->created_at->format('Y-m-d H:i:s'),
                $item->updated_at->format('Y-m-d H:i:s'),
                $item->deleted_at,
            ];
        });

        return $formattedData;
    }
}
