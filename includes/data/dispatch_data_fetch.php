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

$total_rate_this_month = find_dispatch_rate_total_this_month();
$total_rate_last_month = find_dispatch_rate_total_last_month();
$monthlyRateDifference = $total_rate_this_month - $total_rate_last_month;

$total_rate_this_week = find_dispatch_rate_total_this_week();
$total_rate_last_week = find_dispatch_rate_total_last_week();
$weeklyRateDifference = $total_rate_this_week - $total_rate_last_week;

$total_rate_today = find_dispatch_rate_total_today();
$total_rate_yesterday = find_dispatch_rate_total_yesterday();
$dailyRateDifference = $total_rate_today - $total_rate_yesterday;

$total_commission_this_month = find_dispatch_commission_total_this_month();
$total_commission_last_month = find_dispatch_commission_total_last_month();
$monthly_commission_difference = $total_commission_this_month - $total_commission_last_month;

$total_commission_this_week = find_dispatch_commission_total_this_week();
$total_commission_last_week = find_dispatch_commission_total_last_week();
$weekly_commission_difference = $total_commission_this_week - $total_commission_last_week;

$total_commission_today = find_dispatch_commission_total_today();
$total_commission_yesterday = find_dispatch_commission_total_yesterday();
$daily_commission_difference = $total_commission_today - $total_commission_yesterday;

?>