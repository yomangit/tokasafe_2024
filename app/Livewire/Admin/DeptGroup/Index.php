<?php

namespace App\Livewire\Admin\DeptGroup;

use App\Models\Group;
use Livewire\Component;
use App\Models\DeptGroup;
use App\Models\Department;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $search = '';
    protected $listeners = [
        'deptGroup_created' => 'render',
        'group_created' => 'render'
    ];
    public function render()
    {
        return view('livewire.admin.dept-group.index', [
            'Group' => Group::with('Dept')->searchGroup(trim($this->search_group))->searchDept(trim($this->search_dept))->paginate(10),
            'Department' => Department::get(),
        ])->extends('base.index', ['header' => 'Department Group ', 'title' => 'Department Group'])->section('content');
    }
    public function editDeptGroup($idGroup, $idDept)
    {
        $id = DeptGroup::where('group_id', $idGroup)->where('department_id', $idDept)->first()->id;
        $this->dispatch('deptGroup_updated', $id);
    }
    public function deleteDeptGroup($idGroup, $idDept)
    {
        $id = DeptGroup::where('group_id', $idGroup)->where('department_id', $idDept)->first()->id;
        $deleteFile = DeptGroup::whereId($id);
        $this->dispatch(
            'alert',
            [
                'text' => "Deleted Data Successfully!!",
                'duration' => 3000,
                'destination' => '/contact',
                'newWindow' => true,
                'close' => true,
                'backgroundColor' => "linear-gradient(to right, #f97316, #ef4444)",
            ]
        );
        $deleteFile->delete();
    }

    public function paginationView()
    {
        return 'pagination.masterpaginate';
    }
}
