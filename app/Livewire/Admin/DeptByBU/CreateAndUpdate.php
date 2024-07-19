<?php

namespace App\Livewire\Admin\DeptByBU;

use Livewire\Component;
use App\Models\DeptByBU;
use App\Models\Department;
use App\Models\BusinesUnit;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;

class CreateAndUpdate extends Component
{
    #[Validate]
    public $modal = 'modal', $busines_unit_id, $department_id, $deptByBU_id, $divider;

    #[On('deptByBU_updated')]
    public function updateDeptByBU_updated($id)
    {
        if ($id) {
            $this->deptByBU_id = $id;
            $DeptByBU = DeptByBU::whereId($id)->first();
            $this->busines_unit_id = $DeptByBU->busines_unit_id;
            $this->department_id = $DeptByBU->department_id;
            $this->modal = 'modal modal-open';
            $this->divider = 'Update Department by Business Unit';
        }
    }
    public function render()
    {
        return view('livewire.admin.dept-by-b-u.create-and-update',[
            'BusinesUnit' => BusinesUnit::with('Company')->get(),
            'Department' => Department::get()
        ]);
    }
    public function rules()
    {
        return [
            'busines_unit_id' => ['required'],
            'department_id' => ['required',]
        ];
    }
    public function messages()
    {
        return [
            'busines_unit_id.required' => 'The Group Name fild is required.',
            'department_id.required' => 'The Department Name fild is required.',
        ];
    }
    public function store()
    {
        $this->validate();
        DeptByBU::updateOrCreate(
            ['id' => $this->deptByBU_id],
            [
                'busines_unit_id' => $this->busines_unit_id,
                'department_id' => $this->department_id,

            ]
        );
        if ($this->deptByBU_id) {
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
            $this->reset('department_id');
        }
        $this->dispatch('deptByBU_created');

    }
    public function openModal()
    {
        $this->modal = 'modal modal-open';
        $this->divider = 'Input Department Group';
    }
    public function closeModal()
    {
        $this->modal = 'modal';
        $this->reset('deptByBU_id');
        $this->emptyFilds();
    }
    public function emptyFilds()
    {
        $this->reset('busines_unit_id');
        $this->reset('department_id');
    }
}
