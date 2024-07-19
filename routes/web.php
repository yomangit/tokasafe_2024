<?php

use App\Livewire\Admin\BusinessUnit\Index as businnesUnit;
use App\Livewire\Admin\Company\Index as company;
use App\Livewire\Admin\CompanyCategory\Index as categoryCompany;
use App\Livewire\Admin\Department\Index as department;
use App\Livewire\Admin\DeptByBU\Index as DeptByBU;
use App\Livewire\Admin\DeptGroup\Index as deptGroup;
use App\Livewire\Admin\JobClass\Index as JobClass;
use App\Livewire\Admin\RiskAssessment\Index as RiskAssessment;
use App\Livewire\Admin\RiskConsequence\Index as RiskConsequence;
use App\Livewire\Admin\RiskLikelihood\Index as RiskLikelihood;
use App\Livewire\Admin\StatusEvent\Index as StatusEvent;
use App\Livewire\Admin\SubConDept\Index as subContDept;
use App\Livewire\Admin\TableRiskAssessment\Index as TableRiskAssessment;
use App\Livewire\Admin\Workgroup\Index as workgroup;
use App\Livewire\Dashboard\Index  as dashoard;
use Illuminate\Support\Facades\Route;



Route::get('admin/parent/companyCategory', categoryCompany::class)->name('categoryCompany');
Route::get('admin/parent/company', company::class)->name('company');
Route::get('admin/parent/businnesUnit', businnesUnit::class)->name('businnesUnit');
Route::get('admin/parent/department', department::class)->name('department');
Route::get('admin/parent/deptGroup', deptGroup::class)->name('deptGroup');
Route::get('admin/parent/subContDept', subContDept::class)->name('subContDept');
Route::get('admin/parent/DeptByBU', DeptByBU::class)->name('DeptByBU');
Route::get('admin/parent/JobClass', JobClass::class)->name('JobClass');
Route::get('admin/parent/workgroup', workgroup::class)->name('workgroup');
Route::get('admin/parent/statusEvent', StatusEvent::class)->name('statusEvent');
Route::get('admin/parent/riskConsequence', RiskConsequence::class)->name('riskConsequence');
Route::get('admin/parent/riskAssessment', RiskAssessment::class)->name('riskAssessment');
Route::get('admin/parent/riskLikelihood', RiskLikelihood::class)->name('riskLikelihood');
Route::get('admin/parent/tableRiskAssessment', TableRiskAssessment::class)->name('tableRiskAssessment');
Route::get('/', dashoard::class)->name('dashboard');
