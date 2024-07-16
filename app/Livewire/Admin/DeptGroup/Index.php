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
    public $search_group = '';
    public $search_dept = '';
    protected $listeners = ['company_created' => 'render'];
    public function render()
    {
        return view('livewire.admin.dept-group.index', [
            'Group' => Group::searchGroup(trim($this->search_group))->paginate(10),
            'Department' => Department::get(),
        ])->extends('base.index', ['header' => 'Group Department', 'title' => 'Group Department'])->section('content');
    }
    public function updateData($id)
    {

        $this->dispatch('deptGroup_updated', $id);
    }
    public function delete($id)
    {
        $deleteFile = DeptGroup::whereId($id);
        $deleteFile->delete();
    }

    public function paginationView()
    {
        return 'pagination.masterpaginate';
    }
}
