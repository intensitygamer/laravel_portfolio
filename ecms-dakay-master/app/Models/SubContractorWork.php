<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubContractorWork extends Model
{

    protected $table = 'subcontractorworks';

    use SoftDeletes;

    protected $fillable = [
                            'id',
                            'transaction_no',
                            'transaction_date',
                            'transaction_time',
                            'subcontractor',
                            'equipment',
                            'project',
                            'scope_of_work',
                            'contract_amount',
                            'total_previous_paid_amount',
                            'total_current_paid_amount',
                            'total_amount_due_left',
                            'last_payment_amount',
                            'payment_update_at',
                            'status',
                            'created_user_id',
                            'updated_user_id',
                          ];

    public function created_by()
    {
        return $this->belongsTo('App\Models\User', 'created_user_id');
    }

    public function updated_by()
    {
        return $this->belongsTo('App\Models\User', 'updated_user_id');
    }

    public function subcontractor()
    {
        return $this->belongsTo('App\Models\SubContractor', 'subcontractor');
    }

    public function subcontractorwork_payments()
    {
        return $this->hasMany('App\Models\SubContractorWorkPayments','subcontractorwork_id');
    }

    public function equipment()
    {
        return $this->belongsTo('App\Models\Equipment', 'equipment');
    }

}