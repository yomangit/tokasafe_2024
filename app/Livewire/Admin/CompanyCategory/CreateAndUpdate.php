<?php

namespace App\Livewire\Admin\CompanyCategory;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\CompanyCategory;
use Livewire\Attributes\Validate;

class CreateAndUpdate extends Component
{
    #[Validate]
    public $modal = 'modal', $name_category_company, $company_category_id, $divider;

    #[On('companyCategory_updated')]
    public function updateCompanyCategory_updated($id)
    {
        if ($id) {
            $this->company_category_id = $id;
            $company_category = CompanyCategory::whereId($id)->first();
            $this->name_category_company = $company_category->name_category_company;
            $this->modal = 'modal modal-open';
            $this->divider = 'Update Company Category';
        }
    }
    public function render()
    {
        return view('livewire.admin.company-category.create-and-update');
    }
    public function rules()
    {
        return [
            'name_category_company' => ['required', 'string', 'min:2', 'max:50']
        ];
    }

    public function store()
    {
        $this->validate();
        CompanyCategory::updateOrCreate(
            ['id' => $this->company_category_id],
            ['name_category_company' => $this->name_category_company]
        );
        $this->reset('name_category_company');
        $this->dispatch('companyCategory_created');
    }

    public function openModal()
    {
        $this->modal = 'modal modal-open';
        $this->divider = 'Input Company Category';
    }
    public function closeModal()
    {
        $this->modal = 'modal';
    }
}
