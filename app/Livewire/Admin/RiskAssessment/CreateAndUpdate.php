<?php

namespace App\Livewire\Admin\RiskAssessment;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\RiskAssessment;

class CreateAndUpdate extends Component
{
    public $modal = 'modal';
    public $risk_assessments_name, $notes, $action_days, $coordinator, $reporting_obligation, $colour, $risk_assessments_id, $divider;
    #[On('risk_assessments_updated')]
    public function updateRisk_consequence_updated($id)
    {
        if ($id) {
            $this->risk_assessments_id = $id;
            $RiskAssessment = RiskAssessment::whereId($id)->first();
            $this->risk_assessments_name = $RiskAssessment->risk_assessments_name;
            $this->notes = $RiskAssessment->notes;
            $this->action_days = $RiskAssessment->action_days;
            $this->coordinator = $RiskAssessment->coordinator;
            $this->reporting_obligation = $RiskAssessment->reporting_obligation;
            $this->colour = $RiskAssessment->colour;
            $this->modal = 'modal modal-open';
            $this->divider = 'Update Risk Assessment';
        }
    }
    public function render()
    {
        return view('livewire.admin.risk-assessment.create-and-update');
    }
    public function rules()
    {
        return [
            'risk_assessments_name' => ['required'],
            'notes' => ['required'],
            'action_days' => ['required'],
            'coordinator' => ['required'],
            'reporting_obligation' => ['required'],
            'colour' => ['required']
        ];
    }
    public function messages()
    {
        return [
            'risk_assessments_name.required' => 'The  Name fild is required.',
            'notes.required' => 'The Notes  fild is required.',
            'action_days.required' => 'The Action Days fild is required.',
            'coordinator.required' => 'The Coordinator  fild is required.',
            'reporting_obligation.required' => 'The Reporting Obligation  fild is required.',
            'colour.required' => 'The Colour fild is required.',
        ];
    }

    public function store()
    {
        $this->validate();
        RiskAssessment::updateOrCreate(
            ['id' => $this->risk_assessments_id],
            [
                'risk_assessments_name' => $this->risk_assessments_name,
                'notes' => $this->notes,
                'action_days' => $this->action_days,
                'coordinator' => $this->coordinator,
                'reporting_obligation' => $this->reporting_obligation,
                'colour' => $this->colour
            ]
        );
        if ($this->risk_assessments_id) {
            $this->dispatch(
                'alert',
                [
                    'text' => "Data has been updated",
                    'duration' => 3000,
                    'destination' => '/contact',
                    'newWindow' => true,
                    'close' => true,
                    'backgroundColor' => "linear-gradient(to right, #00b09b, #96c93d)",
                ]
            );
        } else {

            $this->dispatch(
                'alert',
                [
                    'text' => "Data added Successfully!!",
                    'duration' => 3000,
                    'destination' => '/contact',
                    'newWindow' => true,
                    'close' => true,
                    'backgroundColor' => "linear-gradient(to right, #00b09b, #96c93d)",
                ]
            );
            $this->emptyFilds();
        }
        $this->dispatch('risk_assessment_created');
    }

    public function openModal()
    {
        $this->modal = 'modal modal-open';
        $this->divider = 'Input Risk Assessment';
    }
    public function closeModal()
    {
        $this->modal = 'modal';
      $this->emptyFilds();
    }
    public function emptyFilds(){
        $this->reset('risk_assessments_name');
        $this->reset('notes');
        $this->reset('action_days');
        $this->reset('coordinator');
        $this->reset('reporting_obligation');
        $this->reset('colour');
        $this->reset('risk_assessments_id');
    }
}
