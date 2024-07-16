<?php

namespace App\Livewire\Admin\Company;

use App\Models\Company;
use App\Models\CompanyCategory;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;

class CreateAndUpdate extends Component
{
    #[Validate]
    public $modal = 'modal', $name_company, $company_category_id, $company_id, $divider;

    #[On('company_updated')]
    public function updateCompany_updated($id)
    {
        if ($id) {
            $this->company_id = $id;
            $company = Company::whereId($id)->first();
            $this->name_company = $company->name_company;
            $this->company_category_id = $company->company_category_id;
            $this->modal = 'modal modal-open';
            $this->divider = 'Update Company';
        }
    }
    public function render()
    {
        return view('livewire.admin.company.create-and-update', [
            'CompanyCategory' => CompanyCategory::get()
        ]);
    }
    public function rules()
    {
        return [
            'name_company' => ['required', 'string', 'min:3', 'max:50'],
            'company_category_id' => ['required',]
        ];
    }
    public function store()
    {
        $this->validate();
        Company::updateOrCreate(
            ['id' => $this->company_id],
            [
                'name_company' => $this->name_company,
                'company_category_id' => $this->company_category_id,

            ]
        );
        $this->reset('name_company');
        $this->reset('company_category_id');
        $this->dispatch('company_created');
    }
    public function openModal()
    {
        $this->modal = 'modal modal-open';
        $this->divider = 'Input Company';
    }
    public function closeModal()
    {
        $this->modal = 'modal';
    }
}
