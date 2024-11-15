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

$salesThisMonByTeam = no_of_carrier_this_mon_by_team($user['team_id']);
$salesThisTueByTeam = no_of_carrier_this_tue_by_team($user['team_id']);
$salesThisWedByTeam = no_of_carrier_this_wed_by_team($user['team_id']);
$salesThisThuByTeam = no_of_carrier_this_thu_by_team($user['team_id']);
$salesThisFriByTeam = no_of_carrier_this_fri_by_team($user['team_id']);


$salesLastMonByTeam = no_of_carrier_last_mon_by_team($user['team_id']);
$salesLastTueByTeam = no_of_carrier_last_tue_by_team($user['team_id']);
$salesLastWedByTeam = no_of_carrier_last_wed_by_team($user['team_id']);
$salesLastThuByTeam = no_of_carrier_last_thu_by_team($user['team_id']);
$salesLastFriByTeam = no_of_carrier_last_fri_by_team($user['team_id']);
?>