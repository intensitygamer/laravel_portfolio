<?php

return [

    'characters' => '2346789abcdefghjmnpqrtuxyzABCDEFGHJMNPQRTUXYZ',

    'default'   => [
        'length'    => 5,
        'width'     => 120,
        'height'    => 36,
        'quality'   => 90,
    ],

    'flat'   => [
        'length'    => 6,
        'width'     => 160,
        'height'    => 46,
        'quality'   => 90,
        'lines'     => 6,
        'bgImage'   => false,
        'bgColor'   => '#ecf2f4',
        'fontColors'=> ['#2c3e50', '#c0392b', '#16a085', '#c0392b', '#8e44ad', '#303f9f', '#f57c00', '#795548'],
        'contrast'  => -5,
    ],

    'mini'   => [
        'length'    => 3,
        'width'     => 60,
        'height'    => 32,
    ],

    'inverse'   => [
        'length'    => 5,
        'width'     => 120,
        'height'    => 36,
        'quality'   => 90,
        'sensitive' => true,
        'angle'     => 12,
        'sharpen'   => 10,
        'blur'      => 2,
        'invert'    => true,
        'contrast'  => -5,
    ],

    'login'   => [
        'length'    => 4,
        'characters'=> '0123456789',
        'width'     => 100,
        'height'    => 34,
        'quality'   => 90,
        'bgImage' => false,
        'fontColors' => ['#000'],
        'lines' => 0
    ],

    'validation'   => [
        'length'    => 4,
        'characters'=> '0123456789',
        'width'     => 140,
        'height'    => 40,
        'quality'   => 90,
        'bgImage' => false,
        'fontColors' => ['#000'],
        'lines' => 0
    ],

];
