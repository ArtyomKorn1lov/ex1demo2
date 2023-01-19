<?php
function DateIsBetween($start_date, $end_date, $todays_date)
{
    $start_timestamp = strtotime($start_date);
    $end_timestamp = strtotime($end_date);
    $today_timestamp = strtotime($todays_date);
    return (($today_timestamp >= $start_timestamp) && ($today_timestamp <= $end_timestamp));
}
