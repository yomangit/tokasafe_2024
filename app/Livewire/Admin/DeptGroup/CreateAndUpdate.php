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
    public $modal = 'modal', $group_id, $department_name_id, $deptGroup_id, $divider;

    #[On('deptGroup_updated')]
    public function updateDeptGroup_updated($id)
    {
        if ($id) {
            $this->deptGroup_id = $id;
            $DeptGroup = DeptGroup::whereId($id)->first();
            $this->group_id = $DeptGroup->group_id;
            $this->department_name_id = $DeptGroup->department_name_id;
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
            'department_name_id' => ['required',]
        ];
    }
    public function store()
    {
        $this->validate();
        DeptGroup::updateOrCreate(
            ['id' => $this->deptGroup_id],
            [
                'group_id' => $this->group_id,
                'department_name_id' => $this->department_name_id,

            ]
        );
        if ($this->deptGroup_id) {
            Session::flash('success', 'Data has been updated!!');
        } else {
            Session::flash('success', 'Data added Successfully!!');
        }

        $this->emptyFilds();
        $this->dispatch('deptGroup_created');
    }
    public function openModal()
    {
        $this->modal = 'modal modal-open';
        $this->divider = 'Input Department Group';
    }
    public function closeModal()
    {
        $this->modal = 'modal';
    }
    public function emptyFilds()
    {
        $this->reset('group_id');
        $this->reset('department_name_id');
    }
}
