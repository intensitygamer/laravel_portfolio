<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubContractorWorkPayments extends Model
{

    protected $table = 'subcontractorwork_payments';

    use SoftDeletes;

    protected $fillable = [
                            'id',
                            'subcontractorwork_id',
                            'contract_amount',
                            'date_payment',
                            'previous_paid_amount',
                            'current_paid_amount',
                            'amount_due_left',
                            'created_user_id',
                          ];

    public function created_by()
    {
        return $this->belongsTo('App\Models\User', 'created_user_id');
    }

    public function subcontractorwork()
    {
        return $this->belongsToMany('App\Models\SubContractorWork', 'subcontractorwork_id');
    }

}