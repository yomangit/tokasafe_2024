<?php

namespace App\Livewire\Admin\SubConDept;

use App\Models\Company;
use Livewire\Component;
use App\Models\Department;
use App\Models\SubConDept;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;

class CreateAndUpdate extends Component
{
    #[Validate]
    public $modal = 'modal', $company_id, $department_id, $subConDept_id, $divider;

    #[On('subConDept_updated')]
    public function updateSubConDept_updated($id)
    {
        if ($id) {
            $this->subConDept_id = $id;
            $SubConDept = SubConDept::whereId($id)->first();
            $this->company_id = $SubConDept->company_id;
            $this->department_id = $SubConDept->department_id;
            $this->modal = 'modal modal-open';
            $this->divider = 'Update Sub-Contractor Department';
        }
    }
    public function render()
    {
        return view('livewire.admin.sub-con-dept.create-and-update',[
            'Company' => Company::get(),
            'Department' => Department::get()
        ]);
    }
    public function rules()
    {
        return [
            'company_id' => ['required'],
            'department_id' => ['required',]
        ];
    }
    public function messages()
    {
        return [
            'company_id.required' => 'The Company Name fild is required.',
            'department_id.required' => 'The Department Name fild is required.',
        ];
    }
    public function store()
    {
        $this->validate();
        SubConDept::updateOrCreate(
            ['id' => $this->subConDept_id],
            [
                'company_id' => $this->company_id,
                'department_id' => $this->department_id,

            ]
        );
        if ($this->subConDept_id) {
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
            $this->reset('subConDept_id');
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
        $this->dispatch('deptGroup_created');

    }
    public function openModal()
    {
        $this->modal = 'modal modal-open';
        $this->divider = 'Input Sub-Contractor Department';
    }
    public function closeModal()
    {
         $this->emptyFilds();
        $this->modal = 'modal';
    }
    public function emptyFilds()
    {
        $this->reset('subConDept_id');
        $this->reset('company_id');
        $this->reset('department_id');
    }
}
