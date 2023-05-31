<?php 
$thisMonthDispatch = no_of_dispatch_this_month_by_team($user['team_id']);
$lastMonthDispatch = no_of_dispatch_last_month_by_team($user['team_id']);
$monthlyDispatchDifference =$thisMonthDispatch - $lastMonthDispatch;

$thisWeekDispatch = no_of_dispatch_this_week_by_team($user['team_id']);
$lastWeekDispatch = no_of_dispatch_last_week_by_team($user['team_id']);
$weeklyDispatchDifference =$thisWeekDispatch - $lastWeekDispatch;

$todayDispatch = no_of_dispatch_today_by_team($user['team_id']);
$yesterdayDispatch = no_of_dispatch_yesterday_by_team($user['team_id']);
$sameDayLastWeekDispatch = no_of_dispatch_sameDayLastWeek_by_team($user['team_id']);
$oneDayDispatchDifference = $todayDispatch - $yesterdayDispatch;
$sameDayDispatchDifference = $todayDispatch - $sameDayLastWeekDispatch;

$dispatchThisMon = no_of_dispatch_this_mon_by_team($user['team_id']);
$dispatchThisTue = no_of_dispatch_this_tue_by_team($user['team_id']);
$dispatchThisWed = no_of_dispatch_this_wed_by_team($user['team_id']);
$dispatchThisThu = no_of_dispatch_this_thu_by_team($user['team_id']);
$dispatchThisFri = no_of_dispatch_this_fri_by_team($user['team_id']);

$dispatchLastMon = no_of_dispatch_last_mon_by_team($user['team_id']);
$dispatchLastTue = no_of_dispatch_last_tue_by_team($user['team_id']);
$dispatchLastWed = no_of_dispatch_last_wed_by_team($user['team_id']);
$dispatchLastThu = no_of_dispatch_last_thu_by_team($user['team_id']);
$dispatchLastFri = no_of_dispatch_last_fri_by_team($user['team_id']);

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