<?php

namespace App\Generators;

use Core\Domain\Contract\GeneratorContract;
use Carbon\Carbon;

class TransactionCode implements GeneratorContract
{
    protected $prefix_use_lube = 'LMU';
    protected $prefix_stock_lube = 'LMS';

    protected $prefix_use_fuel = 'FMU';
    protected $prefix_stock_fuel = 'FMS';

    protected $prefix_subcontractor_work = 'SCW';

    public function generate($type)
    {
        $timestamp = Carbon::now();
        $ext = $timestamp->format('YmdHis');

        switch ($type){

            case 'use_lube':
                $transaction = sprintf('%s%s',
                    $this->prefix_use_lube,
                    $ext
                );

                break;
            case 'stock_lube':

                $transaction = sprintf('%s%s',
                    $this->prefix_stock_lube,
                    $ext
                );

                break;

            case 'use_fuel':
                $transaction = sprintf('%s%s',
                    $this->prefix_use_fuel,
                    $ext
                );

                break;
            case 'stock_fuel':

                $transaction = sprintf('%s%s',
                    $this->prefix_stock_fuel,
                    $ext
                );

                break;

            case 'subcontractor_work':

                $transaction = sprintf('%s%s',
                    $this->prefix_subcontractor_work,
                    $ext
                );

                break;

        }

        return $transaction;
    }

    public function prefix($prefix)
    {
        $this->prefix = $prefix;
    }
}