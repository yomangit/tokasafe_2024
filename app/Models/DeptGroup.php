<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeptGroup extends Model
{
    use HasFactory;
    protected $table = 'dept_groups';
    protected $fillable = [
        'group_id',
        'department_name_id',
    ];
    public function scopeSearchGroup($query, $term)
    {

        $query->whereHas('Group', function ($q) use ($term) {
            $q->where('group_name', 'like', '%' . $term . '%');
        });
    }
    public function scopeSearchDept($query, $term)
    {

        $query->whereHas('Department', function ($q) use ($term) {
            $q->where('department_name', 'like', '%' . $term . '%');
        });
    }

    public function Group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }
    public function Department()
    {
        return $this->belongsTo(Department::class, 'department_name_id');
    }
}
