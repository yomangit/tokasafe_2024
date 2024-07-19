<?php

namespace App\Livewire\Admin\JobClass;

use Livewire\Component;
use App\Models\JobClass;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;

class CreateAndUpdate extends Component
{
    #[Validate]
    public $modal = 'modal', $job_class_name, $jobclass_id, $divider;

    #[On('jobClass_updated')]
    public function updateJobClass_updated($id)
    {
        if ($id) {
            $this->jobclass_id = $id;
            $JobClass = JobClass::whereId($id)->first();
            $this->job_class_name = $JobClass->job_class_name;
            $this->modal = 'modal modal-open';
            $this->divider = 'Update Job Class';
        }
    }
    public function render()
    {
        return view('livewire.admin.job-class.create-and-update');
    }
    public function rules()
    {
        return [
            'job_class_name' => ['required', 'string', 'min:2', 'max:50']
        ];
    }

    public function store()
    {
        $this->validate();
        JobClass::updateOrCreate(
            ['id' => $this->jobclass_id],
            ['job_class_name' => $this->job_class_name]
        );
        if ($this->jobclass_id) {
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
            $this->reset('job_class_name');
        }
        $this->dispatch('jobClass_created');
      
    }

    public function openModal()
    {
        $this->modal = 'modal modal-open';
        $this->divider = 'Input Job Class';
    }
    public function closeModal()
    {
        $this->modal = 'modal';
        $this->reset('job_class_name');
        $this->reset('jobclass_id');
    }
}
