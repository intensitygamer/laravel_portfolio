<?php

namespace Core\Usecase\Lubricant;

use App\Models\TypeOfOil;

use Core\Repository\Lubricant\LubricantRepository;
use Core\Exception;

use Illuminate\Http\Request;

class LubricantUpdate
{
    protected $repository;

    public function __construct(LubricantRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle($id, Request $request)
    {
        $lubricant = $this->repository->get_lubricant_by_id($id);

        if($lubricant['out'])
            $this->check_lubricant_stock($lubricant['out'], $request['out'], $lubricant['type_of_oil_id'], $request['type_of_oil_id']);
        else
            $this->check_lubricant_use($lubricant['in'], $request['in'], $lubricant['type_of_oil_id'], $request['type_of_oil_id']);

        return $this->repository->update_lubricant($id, $request);
    }

    public function check_lubricant_stock($out, $current_out, $type_id, $current_type_id)
    {
        $oil = (new TypeOfOil)->where('id',$type_id)->first();


        if($type_id == $current_type_id){
            $available = $this->repository->available_lubricant($out, true, $type_id);
        } else {
            $available = $this->repository->available_lubricant(0, false, $current_type_id);
        }

        if($available < $current_out)
            throw new Exception\ReportsException(['Lubricant '.$oil->name.' stock not enough, Current Stock is '.$available]);
    }

    public function check_lubricant_use($in, $current_in, $type_id, $current_type_id)
    {
        if($type_id == $current_type_id)
        {
            $oil = (new TypeOfOil)->where('id',$current_type_id)->first();
            $code = $this->repository->get_monitoring_code($oil->id);

            $stock_total = $this->repository->updated_stocked_lubricant($in, $current_in, $code['stock_code']);
            $lubricant_total = ($this->repository->used_lubricant($code['use_code']))->value;
            $deducted = bcsub($lubricant_total, $stock_total);

            if($stock_total < $lubricant_total){
                $range = $deducted + $current_in;
                throw new Exception\ReportsException([$oil->name.' stock should be greater than '.$range.'. Total lubricant use '.$oil->name.' is '.$lubricant_total]);
            }

        }
    }
}
