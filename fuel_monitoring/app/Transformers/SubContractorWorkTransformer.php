<?php

namespace App\Transformers;

use App\Transformers\Transformer;

class SubContractorWorkTransformer extends Transformer
{
    public function transform(array $subcontractor_work)
    {
        $breakdown_payment = [];

        if(isset($subcontractor_work['subcontractorwork_payments']) && $subcontractor_work['subcontractorwork_payments']){
            $breakdown_payment = $subcontractor_work['subcontractorwork_payments'];
        }

        $created_name = sprintf("%s %s", $subcontractor_work['created_by']['first_name'], $subcontractor_work['created_by']['last_name']);
        $updated_name = sprintf("%s %s", $subcontractor_work['updated_by']['first_name'], $subcontractor_work['updated_by']['last_name']);

        return [
            'id' => (int) $subcontractor_work['id'],

            'transaction_no' => $subcontractor_work['transaction_no'],
            'transaction_date' => $subcontractor_work['transaction_date'],

            'equipment' => ($subcontractor_work['equipment'] ? $subcontractor_work['equipment']['equipment_code'] : ''),
            'equipment_id' => $subcontractor_work['equipment']['id'],
            'subcontractor' => ($subcontractor_work['subcontractor'] ? $subcontractor_work['subcontractor']['name'] : ''),
            'subcontractor_id' => $subcontractor_work['subcontractor']['id'],

            'project' => $subcontractor_work['project'],
            'scope_of_work' => $subcontractor_work['scope_of_work'],
            'project_start_date' => $subcontractor_work['project_start_date'],

            'warranty' => $subcontractor_work['warranty'],

             'contract_amount' => $subcontractor_work['contract_amount'],

            'total_previous_paid_amount' => $subcontractor_work['total_previous_paid_amount'],

            'total_current_paid_amount' => $subcontractor_work['total_current_paid_amount'],

            'total_amount_due_left' => $subcontractor_work['total_amount_due_left'],
            
            'payment_update_at' => $subcontractor_work['payment_update_at'],
            
            'last_payment_amount' => $subcontractor_work['last_payment_amount'],
            
            // 'total_amount_due_left' => $subcontractor_work['contract_amount'] - $subcontractor_work['total_current_paid_amount'],

            'created_by' => $created_name,
            'updated_by' => $updated_name,

            'created_at' => $subcontractor_work['created_at'],
            'updated_at' => $subcontractor_work['updated_at'],

            'breakdown_payment' => $breakdown_payment
        ];
    }
}
