<?php

namespace App\Repositories\Operator;

use App\Models\Operator;
use Core\Repository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OperatorUpdateRepository implements Repository\Operator\OperatorUpdateRepository
{
    public function update_operator($id, Request $data) : array
    {
        DB::beginTransaction();

        Operator::where('id', $id)->update([
            'name' => $data->name,
            'alias' => $data->alias,
            'license_no' => $data->license_no,
            'driver_code' => $data->driver_code,

            'operator_date' => new Carbon($data->operator_date),
            'address' => $data->address,
            'phone_no' => $data->phone_no,
            'created_user_id' => \Auth::user()->id,
        ]);

        DB::commit();

        return Operator::find($id)->toArray();
    }
}
