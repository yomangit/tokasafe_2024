<?php

namespace App\Livewire\Admin\RiskLikelihood;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\RiskLikelihood;

class CreateAndUpdate extends Component
{
    public $modal = 'modal';
    public $risk_likelihoods_name, $notes, $risk_likelihoods_id, $divider;
    #[On('risk_likelihoods_updated')]
    public function updaterRsk_likelihoods_updated($id)
    {
        if ($id) {
            $this->risk_likelihoods_id = $id;
            $RiskLikelihood = RiskLikelihood::whereId($id)->first();
            $this->risk_likelihoods_name = $RiskLikelihood->risk_likelihoods_name;
            $this->notes = $RiskLikelihood->notes;
            $this->modal = 'modal modal-open';
            $this->divider = 'Update Risk Likelihood';
        }
    }
    public function render()
    {
        return view('livewire.admin.risk-likelihood.create-and-update');
    }
    public function rules()
    {
        return [
            'risk_likelihoods_name' => ['required'],
            'notes' => ['required']
        ];
    }
    public function messages()
    {
        return [
            'risk_likelihoods_name.required' => 'The  Name fild is required.',
            'notes.required' => 'The Notes fild is required.',
        ];
    }

    public function store()
    {
        $this->validate();
        RiskLikelihood::updateOrCreate(
            ['id' => $this->risk_likelihoods_id],
            [
                'risk_likelihoods_name' => $this->risk_likelihoods_name,
                'notes' => $this->notes,
            ]
        );
        if ($this->risk_likelihoods_id) {
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
            $this->reset('risk_likelihoods_name');
            $this->reset('notes');
        }
        $this->dispatch('risk_likelihoods_created');
    }

    public function openModal()
    {
        $this->modal = 'modal modal-open';
        $this->divider = 'Input Risk Likelihood';
    }
    public function closeModal()
    {
        $this->modal = 'modal';
        $this->reset('risk_likelihoods_name');
        $this->reset('notes');
        $this->reset('risk_likelihoods_id');
    }
}
