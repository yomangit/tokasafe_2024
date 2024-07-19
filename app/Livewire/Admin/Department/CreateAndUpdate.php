<?php

namespace App\Livewire\Admin\Department;

use App\Models\Department;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;

class CreateAndUpdate extends Component
{
    #[Validate]
    public $modal = 'modal', $department_name, $department_id, $divider;

    #[On('department_updated')]
    public function updateDepartment_updated($id)
    {
        if ($id) {
            $this->department_id = $id;
            $department = Department::whereId($id)->first();
            $this->department_name = $department->department_name;
            $this->modal = 'modal modal-open';
            $this->divider = 'Update Department';
        }
    }
    public function render()
    {
        return view('livewire.admin.department.create-and-update');
    }
    public function rules()
    {
        return [
            'department_name' => ['required', 'string', 'min:2', 'max:50']
        ];
    }

    public function store()
    {
        $this->validate();
        Department::updateOrCreate(
            ['id' => $this->department_id],
            ['department_name' => $this->department_name]
        );
        if ($this->department_id) {
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
            $this->reset('department_name');
        }
        $this->dispatch('department_created');
    }

    public function openModal()
    {
        $this->modal = 'modal modal-open';
        $this->divider = 'Input Department';
    }
    public function closeModal()
    {
        $this->reset('department_id');
        $this->reset('department_name');
        $this->modal = 'modal';
    }
}
