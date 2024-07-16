<?php

namespace App\Livewire\Admin\Department;

use App\Models\Department;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $search = '';

    protected $listeners = ['department_created' => 'render'];
    public function render()
    {
        return view('livewire.admin.department.index', [
            'Department' => Department::searchDepartment(trim($this->search))->paginate(20)
        ])->extends('base.index', ['header' => 'Department', 'title' => 'Department'])->section('content');
    }
    public function updateData($id)
    {

        $this->dispatch('department_updated', $id);
    }
    public function delete($id)
    {
        $deleteFile = Department::whereId($id);
        $deleteFile->delete();
    }

    public function paginationView()
    {
        return 'pagination.masterpaginate';
    }
}
