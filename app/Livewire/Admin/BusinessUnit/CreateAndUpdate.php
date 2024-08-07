<?php

namespace App\Livewire\Admin\BusinessUnit;

use App\Models\BusinesUnit;
use App\Models\Company;
use Livewire\Component;
use Livewire\Attributes\On;

class CreateAndUpdate extends Component
{
    public  $modal = 'modal', $name_company_id, $business_unit_id, $divider = '';

    #[On('b_unit_updated')]
    public function updateCompany_updated($id)
    {
        if ($id) {
            $this->business_unit_id = $id;
            $b_unit = BusinesUnit::whereId($id)->first();
            $this->name_company_id = $b_unit->name_company_id;
            $this->modal = 'modal modal-open';
            $this->divider = 'Update Business Unit';
        }
    }
    public function render()
    {
        return view('livewire.admin.business-unit.create-and-update', [
            'Company' => Company::get()
        ]);
    }
    public function rules()
    {
        return [
            'name_company_id' => ['required']
        ];
    }
    public function store()
    {
        $this->validate();
        BusinesUnit::updateOrCreate(
            ['id' => $this->business_unit_id],
            [
                'name_company_id' => $this->name_company_id,

            ]
        );
        if ($this->business_unit_id) {
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
            $this->reset('name_company_id');
        }
        $this->dispatch('b_unit_created');
       
    }
    public function openModal()
    {
        $this->modal = 'modal modal-open';
        $this->divider = 'Input Business Unit';
    }
    public function closeModal()
    {
        $this->reset('name_company_id');
        $this->reset('business_unit_id');
        $this->modal = 'modal';
    }
}
