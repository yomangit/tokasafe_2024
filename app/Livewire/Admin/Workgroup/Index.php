<?php

namespace App\Livewire\Admin\Workgroup;

use Livewire\Component;
use App\Models\DeptByBU;
use App\Models\Workgroup;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $search_dept='';
    protected $listeners = [
        'workgroup_created' => 'render',
    ];
    public function render()
    {
    return view('livewire.admin.workgroup.index',[
        'DeptUnderBU' => DeptByBU::with(['BusinesUnit.Company', 'Department'])->searchDept(trim($this->search_dept))->paginate(20),
    ])->extends('base.index', ['header' => 'Workgroup ', 'title' => 'Workgroup'])->section('content');
    }

    public function editWorkgroup($id_bu,$id_jobClass)
    {
        
        $ids = Workgroup::where('dept_by_business_unit_id', $id_bu)->where('job_class_id', $id_jobClass)->first()->id;
       
        $this->dispatch('Workgroup_updated', $ids);
    }
    public function deleteWorkgroup($id_bu,$id_jobClass)
    {
        $id =Workgroup::where('dept_by_business_unit_id', $id_bu)->where('job_class_id', $id_jobClass)->first()->id;
        $deleteFile = Workgroup::whereId($id);
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
