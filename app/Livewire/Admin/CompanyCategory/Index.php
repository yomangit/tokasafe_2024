<?php

namespace App\Livewire\Admin\CompanyCategory;

use App\Models\CompanyCategory;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $search = '';

    protected $listeners = ['companyCategory_created' => 'render'];


    public function render()
    {
        return view('livewire.admin.company-category.index', [
            'companyCategory' => CompanyCategory::searchFor(trim($this->search))->paginate(25)
        ])->extends('base.index', ['header' => 'Company Category', 'title' => 'Company Category'])->section('content');
    }

    public function updateData($id)
    {

        $this->dispatch('companyCategory_updated', $id);
    }
    public function delete($id)
    {
        $deleteFile = CompanyCategory::whereId($id);
        $deleteFile->delete();
    }

    public function paginationView()
    {
        return 'pagination.masterpaginate';
    }
}
