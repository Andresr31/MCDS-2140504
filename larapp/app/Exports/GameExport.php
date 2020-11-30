<?php

namespace App\Exports;

use App\Game;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

use Maatwebsite\Excel\Concerns\WithColumnWidths;

use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class GameExport implements FromView, WithColumnWidths, WithStyles
{
    public function view(): View
    {
        return view('games.excel', [
            'games' => Game::all()
        ]);
    }

    public function columnWidths(): array
    {
        return [
            'A' => 20,
            // 'B' => 40,
            // 'C' => 20,
            // 'D' => 18,
            // 'E' => 27
                        
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true, 'size' => 16]],

            // // Styling a specific cell by coordinate.
            // 'B2' => ['font' => ['italic' => true]],

            // // Styling an entire column.
            // 'C'  => ['font' => ['size' => 16]],
        ];
    }
}