<?php

namespace App\Livewire\Admin\RiskConsequence;

use App\Models\RiskConsequence;
use Livewire\Component;
use Livewire\Attributes\On;

class CreateAndUpdate extends Component
{
    public $modal = 'modal';
    public $risk_consequence_name, $description, $risk_consequence_id, $divider;
    #[On('risk_consequence_updated')]
    public function updateRisk_consequence_updated($id)
    {
        if ($id) {
            $this->risk_consequence_id = $id;
            $RiskConsequence = RiskConsequence::whereId($id)->first();
            $this->risk_consequence_name = $RiskConsequence->risk_consequence_name;
            $this->description = $RiskConsequence->description;
            $this->modal = 'modal modal-open';
            $this->divider = 'Update Risk Consequence';
        }
    }
    public function render()
    {
        return view('livewire.admin.risk-consequence.create-and-update');
    }
    public function rules()
    {
        return [
            'risk_consequence_name' => ['required'],
            'description' => ['required']
        ];
    }
    public function messages()
    {
        return [
            'risk_consequence_name.required' => 'The  Name fild is required.',
            'description.required' => 'The Description Name fild is required.',
        ];
    }

    public function store()
    {
        $this->validate();
        RiskConsequence::updateOrCreate(
            ['id' => $this->risk_consequence_id],
            [
                'risk_consequence_name' => $this->risk_consequence_name,
                'description' => $this->description,
            ]
        );
        if ($this->risk_consequence_id) {
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
            $this->reset('risk_consequence_name');
            $this->reset('description');
        }
        $this->dispatch('risk_consequence_created');
    }

    public function openModal()
    {
        $this->modal = 'modal modal-open';
        $this->divider = 'Input Risk Consequence';
    }
    public function closeModal()
    {
        $this->modal = 'modal';
        $this->reset('risk_consequence_name');
        $this->reset('description');
        $this->reset('risk_consequence_id');
    }
}
