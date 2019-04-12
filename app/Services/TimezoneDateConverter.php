<?php

namespace App\Services;

class TimezoneDateConverter
{
    public static function getClientDateTime($date = null) {
        $timezoneOffset = intval(\Session::get('timezoneOffset'));
        if ($date instanceof \DateTime) {
            $dateClient = clone $date;
        } else {
            $dateClient = new \DateTime($date);
        }

        if (!empty($timezoneOffset)) {
            if ($timezoneOffset > 0) {
                $dateClient->add(new \DateInterval('PT'.$timezoneOffset.'M'));
            } else {
                $dateClient->sub(new \DateInterval('PT'.abs($timezoneOffset).'M'));
            }
        }

        return $dateClient;
    }

    public static function getServerDateTime($date = null) {
        $timezoneOffset = intval(\Session::get('timezoneOffset'));
        if ($date instanceof \DateTime) {
            $dateServer = clone $date;
        } else {
            $dateServer = new \DateTime($date);
        }

        if (!empty($timezoneOffset)) {
            if ($timezoneOffset > 0) {
                $dateServer->sub(new \DateInterval('PT'.$timezoneOffset.'M'));
            } else {
                $dateServer->add(new \DateInterval('PT'.abs($timezoneOffset).'M'));
            }
        }

        return $dateServer;
    }
}