<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workgroup extends Model
{
    use HasFactory;
    protected $table = 'workgroups';
    protected $fillable = [
        'dept_by_business_unit_id',
        'job_class_id',
    ];
}
