<?php 
$thisMonthSaleByTeam = no_of_carrier_this_month_by_team($user['team_id']);
$lastMonthSaleByTeam = no_of_carrier_last_month_by_team($user['team_id']);
$monthlySalesDifferenceByTeam =$thisMonthSaleByTeam - $lastMonthSaleByTeam;

$thisWeekSaleByTeam = no_of_carrier_this_week_by_team($user['team_id']);
$lastWeekSaleByTeam = no_of_carrier_last_week_by_team($user['team_id']);
$weeklySalesDifferenceByTeam =$thisWeekSaleByTeam - $lastWeekSaleByTeam;

$todaySaleByTeam = no_of_carrier_today_by_team($user['team_id']);
$yesterdaySaleByTeam = no_of_carrier_yesterday_by_team($user['team_id']);
$sameDayLastWeekSaleByTeam = no_of_carrier_sameDayLastWeek_by_team($user['team_id']);
$oneDaySalesDifferenceByTeam = $todaySaleByTeam - $yesterdaySaleByTeam;
$sameDaySalesDifferenceByTeam = $todaySaleByTeam - $sameDayLastWeekSaleByTeam;

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