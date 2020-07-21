<?php

namespace App\Repositories\SubContractor;

use App\Models\SubContractor;
use Core\Repository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubContractorUpdateRepository implements Repository\SubContractor\SubContractorUpdateRepository
{
    public function update_subcontractor($id, Request $data) : array
    {
        DB::beginTransaction();

        SubContractor::where('id', $id)->update([
            'name' => $data->name,
            'address' => $data->address,
            'contact_1' => $data->contact_1,
            'contact_2' => $data->contact_2,
            'website' => $data->website,
            'created_user_id' => \Auth::user()->id,
        ]);

        DB::commit();

        return SubContractor::find($id)->toArray();
    }
}
