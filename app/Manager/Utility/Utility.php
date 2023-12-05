<?php
namespace App\Manager\Utility;

use Carbon\Carbon;
use Exception;
use Illuminate\Support\Str;

class Utility{
    /**
     * @throws Exception
     */
    public static function prepare_name(string|null $name = 'no-name-image'):string
    {
       return Str::slug($name. '-'. str_replace(' ', '-', Carbon::now()->toDayDateTimeString()).'-'.random_int(1000,9999));
    }
}
