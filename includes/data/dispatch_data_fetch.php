<?php 
$thisMonthDispatch = no_of_dispatch_this_month();
$lastMonthDispatch = no_of_dispatch_last_month();
$monthlyDispatchDifference =$thisMonthDispatch - $lastMonthDispatch;

$thisWeekDispatch = no_of_dispatch_this_week();
$lastWeekDispatch = no_of_dispatch_last_week();
$weeklyDispatchDifference =$thisWeekDispatch - $lastWeekDispatch;

$todayDispatch = no_of_dispatch_today();
$yesterdayDispatch = no_of_dispatch_yesterday();
$sameDayLastWeekDispatch = no_of_dispatch_sameDayLastWeek();
$oneDayDispatchDifference = $todayDispatch - $yesterdayDispatch;
$sameDayDispatchDifference = $todayDispatch - $sameDayLastWeekDispatch;

$dispatchThisMon = no_of_dispatch_this_mon();
$dispatchThisTue = no_of_dispatch_this_tue();
$dispatchThisWed = no_of_dispatch_this_wed();
$dispatchThisThu = no_of_dispatch_this_thu();
$dispatchThisFri = no_of_dispatch_this_fri();

$dispatchLastMon = no_of_dispatch_last_mon();
$dispatchLastTue = no_of_dispatch_last_tue();
$dispatchLastWed = no_of_dispatch_last_wed();
$dispatchLastThu = no_of_dispatch_last_thu();
$dispatchLastFri = no_of_dispatch_last_fri();
?>