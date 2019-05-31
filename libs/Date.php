<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Date
 *
 * @author Victor Mataba <vmataba0@gmail.com>
 */

namespace libs;

class Date {

    public static function getFormattedDate($date, $includeTime = true) {

        $splittedDate = explode(' ', $date);
        $onlyDate = $splittedDate[0];
        $onlyTime = $splittedDate[1];
        $splittedOnlyDate = explode('-', $onlyDate);

        $year = $splittedOnlyDate[0];
        $month = $splittedOnlyDate[1];
        $day = $splittedOnlyDate[2];

        switch ((int) $month) {
            case 1:
                $textMonth = 'Jan';
                break;
            case 2:
                $textMonth = 'Feb';
                break;
            case 3:
                $textMonth = 'Mar';
                break;
            case 4:
                $textMonth = 'April';
                break;
            case 5:
                $textMonth = 'May';
                break;
            case 6:
                $textMonth = 'Jun';
                break;
            case 7:
                $textMonth = 'Jul';
                break;
            case 8:
                $textMonth = 'Aug';
                break;
            case 9:
                $textMonth = 'Sept';
                break;
            case 10:
                $textMonth = 'Oct';
                break;
            case 11:
                $textMonth = 'Nov';
                break;
            case 12:
                $textMonth = 'Dec';
                break;
        }
        return $includeTime ? "{$textMonth}, {$day} {$year} {$onlyTime}" : "{$textMonth}, {$day} {$year}";
    }

}
