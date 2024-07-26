<?php

namespace Thanhnt84\Duan1\Commons;

class Helper
{
    public static function debug($data)
    {
        echo '<pre>';

        print_r($data);

        die;
    }
}
