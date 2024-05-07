<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize; // Import ShouldAutoSize
use App\Models\TrainingsForm;
use App\Models\Station;

use Carbon\Carbon;

class ExportRecords implements FromCollection, WithMapping, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $searchInput;
    protected $yearSelect;
    protected $start_MonthSelect;
    protected $end_MonthSelect;
    protected $trainingTitle;
    protected $provinceSelect;
    protected $formType;
    protected $station;

    public function __construct($searchInput, $yearSelect, $start_MonthSelect, $end_MonthSelect, $trainingTitle, $provinceSelect, $formType, $station)
    {
        $this->searchInput = $searchInput;
        $this->yearSelect = $yearSelect;
        $this->start_MonthSelect = $start_MonthSelect;
        $this->end_MonthSelect = $end_MonthSelect;
        $this->trainingTitle = $trainingTitle;
        $this->provinceSelect = $provinceSelect;
        $this->formType = $formType;
        $this->station = $station;
    }

    public function headings(): array
    {
        return [
            // headers in excel
            "TRAINING TITLE",
            "DATE",
            "CONDUCTING DIVISION",
            "TYPE OF TRAINING",
            "TRAINING CATEGORY",
            "MODE OF DELIVERY",
            "VENUE",
            "ADDRESS",
            "NAME OF IMPLEMENTING PARTNER/S OR CO-ORGANIZER/S",
            "SOURCE OF FUND",
            "AVERAGE GIK",
            "EVALUATION RATING",
            "TOTAL PARTICIPANTS",
            "WOMEN",
            "MEN",
            "INDIGENOUS PEOPLE",
            "PEOPLE WITH DISABILITIES",
            "FARMERS AND SEED GROWERS",
            "EXT. WORKERS & INTERMEDIARIES",
            "SCIENTIFIC COMMUNITY",
            "OTHER SECTORS"
        ];
    }

    public function map($records): array
    {
        $date = date("F-d-Y", strtotime($records->start_date)) . " - " . date("F-d-Y", strtotime($records->end_date));
        
        $stationName = '';
        if($records->station_id != 0) {
            $station = Station::find($records->station_id);
            $stationName = $station ? $station->station : '';
        }

        $address = $records->type == 'International' ? $records->international_address : ($records->training_venue == 'Outside PhilRice Station' ? $records->citymunDesc . ', ' . $records->provDesc : '(' . $stationName . ') ' . $records->citymunDesc . ', ' . $records->provDesc);

        $average_gik = $records->average_gik ?? 'N/A';

        $num_of_participants = (int) $records->num_of_participants ?? 0;
        $num_of_female = (int) $records->num_of_female ?? 0;
        $num_of_male = (int) $records->num_of_male ?? 0;
        $num_of_indigenous = (int) $records->num_of_indigenous ?? 0;
        $num_of_pwd = (int) $records->num_of_pwd ?? 0;
        $num_of_farmers = (int) $records->num_of_farmers ?? 0;
        $num_of_extworkers = (int) $records->num_of_extworkers ?? 0;
        $num_of_scientific = (int) $records->num_of_scientific ?? 0;
        $num_of_other = (int) $records->num_of_other ?? 0;

        return [
            $records->title,
            $date,
            $records->division,
            $records->type,
            $records->category,
            $records->mod,
            $records->training_venue,
            $address,
            $records->sponsor,
            $records->fund,
            $average_gik,
            $records->evaluation,

            $num_of_participants,
            $num_of_female,
            $num_of_male,
            $num_of_indigenous,
            $num_of_pwd,
            $num_of_farmers,
            $num_of_extworkers,
            $num_of_scientific,
            $num_of_other,
        ];
    }

    public function collection()
    {
        return TrainingsForm::exportFilteredRecords($this->searchInput, $this->yearSelect, $this->start_MonthSelect, $this->end_MonthSelect, $this->trainingTitle, $this->provinceSelect, $this->formType, $this->station);
    }
}
