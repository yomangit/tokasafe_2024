<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyCategory extends Model
{
    use HasFactory;
    protected $table = 'company_categories';
    protected $guarded = ['id'];
    public function scopeSearchFor($query, $term)
    {

        $query->where('name_category_company', 'LIKE', '%' . $term . '%');
    }
}
