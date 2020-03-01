<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaboratoryReport extends Model
{
    protected $fillable = ['reports_title', 
                          'group_name',
                          'sample_num',
                          'bar_code',
                          'patient_category',
                          'patient_name',
                          'patient_gender',
                          'patient_age',
                          'sample_type',
                          'department',
                          'ward',
                          'bed_No',
                          'medical_record_num',
                          'medical_card_num',
                          'apply_time',
                          'collect_time',
                          'send_inspect_doctor',
                          'clinical_diagnosis',
                          'remark',
                          'received_time',
                          'report_time',
                          'received_doctor',
                          'inspect_doctor',
                          'review_doctor',
                          'report_doctor',
                          'is_lock'
                          ];

  public function getTableColumns() {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }
}
