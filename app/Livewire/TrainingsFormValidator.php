<?php

namespace App\Livewire;

use Livewire\Component;

class TrainingsFormValidator extends Component
{
    public $training_title;
    public $batch;
    public $otherTrainingInput;
    public $training_type;
    public $training_category;
    public $mod;
    public $training_venue;
    public $internationalTrainingInput;
    public $withinPhilriceInput;
    public $province;
    public $municipalitySelect;
    public $start;
    public $end;
    
    protected $rules = [
        'training_title' => 'required',
        'batch' => 'required',
        'otherTrainingInput' => 'required|string|min:1',
        'training_type' => 'required',
        'training_category' => 'required',
        'mod' => 'required',
        'internationalTrainingInput' => 'required|string|max:1',
        'withinPhilriceInput' => 'required',
        'province' => 'required',
        'municipalitySelect' => 'required',
        'start' => 'required',
        'end' => 'required',
    ];
    
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function render()
    {
        return view('trainings');
    }
}
