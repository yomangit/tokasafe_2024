<?php

namespace App\Livewire\Admin\Group;

use App\Models\Group;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;

class CreateAndUpdate extends Component
{
    #[Validate]
    public $modal = 'modal', $group_name, $group_id, $divider;

    #[On('group_updated')]
    public function updateGroup_updated($id)
    {
        if ($id) {
            $this->group_id = $id;
            $Group = Group::whereId($id)->first();
            $this->group_name = $Group->group_name;
            $this->modal = 'modal modal-open';
            $this->divider = 'Update Group';
        }
    }
    public function render()
    {
        return view('livewire.admin.group.create-and-update');
    }
    public function rules()
    {
        return [
            'group_name' => ['required', 'string', 'min:2', 'max:50']
        ];
    }

    public function store()
    {
        $this->validate();
        Group::updateOrCreate(
            ['id' => $this->group_id],
            ['group_name' => $this->group_name]
        );
        $this->reset('group_name');
        $this->dispatch('group_created');
    }

    public function openModal()
    {
        $this->modal = 'modal modal-open';
        $this->divider = 'Input Group';
    }
    public function closeModal()
    {
        $this->modal = 'modal';
    }
}
