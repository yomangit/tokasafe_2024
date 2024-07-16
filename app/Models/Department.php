<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $table = 'departments';
    protected $guarded = ['id'];
    public function scopeSearchDepartment($query, $term)
    {

        $query->where('department_name', 'LIKE', '%' . $term . '%');
    }
    public function Group()
    {
        return $this->belongsToMany(Group::class, 'dept_groups');
    }
}
