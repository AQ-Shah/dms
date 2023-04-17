<?php 
$thisMonthSale = no_of_carrier_this_month();
$lastMonthSale = no_of_carrier_last_month();
$monthlySalesDifference =$thisMonthSale - $lastMonthSale;

$thisWeekSale = no_of_carrier_this_week();
$lastWeekSale = no_of_carrier_last_week();
$weeklySalesDifference =$thisWeekSale - $lastWeekSale;

$todaySale = no_of_carrier_today();
$yesterdaySale = no_of_carrier_yesterday();
$sameDayLastWeekSale = no_of_carrier_sameDayLastWeek();
$oneDaySalesDifference = $todaySale - $yesterdaySale;
$sameDaySalesDifference = $todaySale - $sameDayLastWeekSale;

$salesThisMon = no_of_carrier_this_mon();
$salesThisTue = no_of_carrier_this_tue();
$salesThisWed = no_of_carrier_this_wed();
$salesThisThu = no_of_carrier_this_thu();
$salesThisFri = no_of_carrier_this_fri();

$salesLastMon = no_of_carrier_last_mon();
$salesLastTue = no_of_carrier_last_tue();
$salesLastWed = no_of_carrier_last_wed();
$salesLastThu = no_of_carrier_last_thu();
$salesLastFri = no_of_carrier_last_fri();
?>