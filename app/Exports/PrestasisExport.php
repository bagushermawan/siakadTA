<?php

namespace App\Exports;

use App\Models\Prestasi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PrestasisExport implements FromCollection, WithCustomCsvSettings, WithHeadings, WithMapping
{
    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ';'
        ];
    }

    public function headings(): array
    {
        return ["id", "nama", "created_at", "updated_at", "deleted_at"];
    }

    public function map($row): array
    {
        return [
            $row->id,
            $row->nama,
            $row->created_at->format('Y-m-d H:i:s'), // Format 'Y-m-d H:i:s'
            $row->updated_at->format('Y-m-d H:i:s'), // Format 'Y-m-d H:i:s'
            $row->deleted_at, // Assuming deleted_at doesn't need special formatting
        ];
    }

    public function collection()
    {
        return Prestasi::select('id', 'nama', 'created_at', 'updated_at', 'deleted_at')->withTrashed()->get();
    }
}
