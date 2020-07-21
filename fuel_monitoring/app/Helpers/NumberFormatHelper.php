<?php

namespace App\Helpers;

use Carbon\Carbon;

class NumberFormatHelper
{

    function number_format_by_currency($type, $value)
    {
        $formatted = $value;

        switch ($type){
            case 'PHP':
                $formatted = sprintf('%s', number_format($value, 2));
                break;

            default:
                break;
        }

        return $formatted;
    }

}