<?php

namespace App\Livewire\Admin\StatusEvent;

use Livewire\Component;
use App\Models\StatusEvent;
use Livewire\Attributes\On;

class CreateAndUpdate extends Component
{

    public $modal = 'modal', $status_name, $bg_status, $status_id, $divider;

    #[On('status_updated')]
    public function updateStatus_updated($id)
    {
        if ($id) {
            $this->status_id = $id;
            $StatusEvent = StatusEvent::whereId($id)->first();
            $this->status_name = $StatusEvent->status_name;
            $this->bg_status = $StatusEvent->bg_status;
            $this->modal = 'modal modal-open';
            $this->divider = 'Update Status Event';
        }
    }
    public function render()
    {
        return view('livewire.admin.status-event.create-and-update');
    }
    public function rules()
    {
        return [
            'status_name' => ['required'],
            'bg_status' => ['required']
        ];
    }

    public function store()
    {
        $this->validate();
        StatusEvent::updateOrCreate(
            ['id' => $this->status_id],
            [
                'status_name' => $this->status_name,
                'bg_status' => $this->bg_status
            ]
        );
        if ($this->status_id) {
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
            $this->reset('status_name');
            $this->reset('bg_status');
        }
        $this->dispatch('status_created');
    }

    public function openModal()
    {
        $this->modal = 'modal modal-open';
        $this->divider = 'Input Company Category';
    }
    public function closeModal()
    {
        $this->reset('status_name');
        $this->reset('bg_status');
        $this->reset('status_id');
        $this->modal = 'modal';
    }
}
