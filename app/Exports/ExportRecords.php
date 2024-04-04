<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\TrainingsForm;

class ExportRecords implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $searchInput;
    protected $yearSelect;
    protected $start_MonthSelect;
    protected $end_MonthSelect;

    public function __construct($searchInput, $yearSelect, $start_MonthSelect, $end_MonthSelect)
    {
        $this->searchInput = $searchInput;
        $this->yearSelect = $yearSelect;
        $this->start_MonthSelect = $start_MonthSelect;
        $this->end_MonthSelect = $end_MonthSelect;
    }

    public function headings(): array
    {
        return [
            // headers in excel
            "TITLE OF EVENT",
            "OFFICES AND DIVISIONS",
            "DATE",
            "VENUE",
        ];
    }

    public function map($records): array
    {
        $date = $records->start_date . " - " . $records->end_date;

        return [
            $records->title,
            $records->division,
            $date,
            $records->venue,
            // $records->division,
        ];
    }

    public function collection()
    {
        return TrainingsForm::exportFilteredRecords($this->searchInput, $this->yearSelect, $this->start_MonthSelect, $this->end_MonthSelect);
    }
}
