<?php

namespace App\Livewire\Admin\DeptGroup;

use App\Models\Department;
use App\Models\DeptGroup;
use App\Models\Group;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;

class CreateAndUpdate extends Component
{
    #[Validate]
    public $modal = 'modal', $group_id, $department_id, $deptGroup_id, $divider;

    #[On('deptGroup_updated')]
    public function updateDeptGroup_updated($id)
    {
        if ($id) {
            $this->deptGroup_id = $id;
            $DeptGroup = DeptGroup::whereId($id)->first();
            $this->group_id = $DeptGroup->group_id;
            $this->department_id = $DeptGroup->department_id;
            $this->modal = 'modal modal-open';
            $this->divider = 'Update Department Group';
        }
    }
    public function render()
    {
        return view('livewire.admin.dept-group.create-and-update', [
            'Group' => Group::get(),
            'Department' => Department::get()
        ]);
    }
    public function rules()
    {
        return [
            'group_id' => ['required'],
            'department_id' => ['required',]
        ];
    }
    public function messages()
    {
        return [
            'group_id.required' => 'The Group Name fild is required.',
            'department_id.required' => 'The Department Name fild is required.',
        ];
    }
    public function store()
    {
        $this->validate();
        DeptGroup::updateOrCreate(
            ['id' => $this->deptGroup_id],
            [
                'group_id' => $this->group_id,
                'department_id' => $this->department_id,

            ]
        );
        if ($this->deptGroup_id) {
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
        $this->dispatch('deptGroup_created');

    }
    public function openModal()
    {
        $this->modal = 'modal modal-open';
        $this->divider = 'Input Department Group';
    }
    public function closeModal()
    {
        $this->emptyFilds();
        $this->modal = 'modal';
    }
    public function emptyFilds()
    {
        $this->reset('group_id');
        $this->reset('department_id');
    }
}
