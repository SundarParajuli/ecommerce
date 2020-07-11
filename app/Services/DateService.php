<?php

namespace App\Services;

class DateService
{


    public function relativeHumanDate($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

    public function formatedDate($value)
    {

        $date = new \DateTime($value);
        return $date->format('j F Y');

    }

    public function shortDate($value)
    {
        $date = new \DateTime($value);
        return $date->format('j M Y');
//        return date_format($value, 'M j Y');
    }

}