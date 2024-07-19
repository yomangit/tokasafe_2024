<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableRiskAssessment extends Model
{
    use HasFactory;
    protected $table = 'table_risk_assessments';
    protected $fillable = [
        'risk_assessment_id',
        'risk_consequence_id',
        'risk_likelihood_id',
    ];

    public function RiskAssessment()
    {
        return $this->belongsTo(RiskAssessment::class);
    }
}
