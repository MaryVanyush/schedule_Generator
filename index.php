<?php

function scheduleGenerator(int $month, int $year) : void
{
    $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
    $month = (string)$month;
    $year = (string)$year;
    $date = new DateTime("$year-$month-1");

    echo "Month: " . $date->format('F') .  PHP_EOL;

    echo "Work Schedule: " .  PHP_EOL;
    $workDay = 1;
    for ($day = 1; $day <= $daysInMonth; $day++) {
        $date->setDate($year, $month, $day);
        $dayOfWeek = $date->format('w');
        if ($dayOfWeek === '0' || $dayOfWeek === '6') {
            $currDate = $date->format('Y-m-d');
              echo "\033[31m$currDate\033[0m" . " day off" .  PHP_EOL;
            ($workDay === $day) ? $workDay++ : false;
        } else {
            $currDate = $date->format('Y-m-d');
            if ($workDay === $day){
                echo "\033[32m$currDate\033[0m" . " work day" . PHP_EOL;

                $workDay = $workDay + 3;
            } else {
                echo $currDate .  PHP_EOL;
            }
        }
    }
};

scheduleGenerator(9, 2024);