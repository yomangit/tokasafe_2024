<?php

use App\Livewire\Admin\BusinessUnit\Index as businnesUnit;
use App\Livewire\Admin\Company\Index as company;
use App\Livewire\Admin\CompanyCategory\Index as categoryCompany;
use App\Livewire\Admin\Department\Index as department;
use App\Livewire\Admin\DeptGroup\Index as deptGroup;
use App\Livewire\Dashboard\Index  as dashoard;
use Illuminate\Support\Facades\Route;



Route::get('admin/parent/companyCategory', categoryCompany::class)->name('categoryCompany');
Route::get('admin/parent/company', company::class)->name('company');
Route::get('admin/parent/businnesUnit', businnesUnit::class)->name('businnesUnit');
Route::get('admin/parent/department', department::class)->name('department');
Route::get('admin/parent/deptGroup', deptGroup::class)->name('deptGroup');
Route::get('/', dashoard::class)->name('dashboard');
