<?php 

$thisMonthPaidInvoices = paid_invoices_amount_this_month();
$thisMonthUnpaidInvoices = unpaid_invoices_amount_this_month();
$lastMonthPaidInvoices = paid_invoices_amount_last_month();
$lastMonthUnpaidInvoices = unpaid_invoices_amount_last_month();

$thisMonthInvoices = $thisMonthPaidInvoices + $thisMonthUnpaidInvoices;
$lastMonthInvoices = $lastMonthPaidInvoices + $lastMonthUnpaidInvoices; 
$monthlyInvoicesDifference =$thisMonthInvoices - $lastMonthInvoices;

$totalInvoicesAmountWeek0 = total_invoices_amount_week_0();
$totalInvoicesAmountWeek1 = total_invoices_amount_week_1();
$totalInvoicesAmountWeek2 = total_invoices_amount_week_2();
$totalInvoicesAmountWeek3 = total_invoices_amount_week_3();
$totalInvoicesAmountWeek4 = total_invoices_amount_week_4();
$totalInvoicesAmountWeek5 = total_invoices_amount_week_5();
$totalInvoicesAmountWeek6 = total_invoices_amount_week_6();
$totalInvoicesAmountWeek7 = total_invoices_amount_week_7();
$totalInvoicesAmountWeek8 = total_invoices_amount_week_8();
$totalInvoicesAmountWeek9 = total_invoices_amount_week_9();

$totalUnpaidInvoicesAmountWeek0 = total_unpaid_invoices_amount_week_0();
$totalUnpaidInvoicesAmountWeek1 = total_unpaid_invoices_amount_week_1();
$totalUnpaidInvoicesAmountWeek2 = total_unpaid_invoices_amount_week_2();
$totalUnpaidInvoicesAmountWeek3 = total_unpaid_invoices_amount_week_3();
$totalUnpaidInvoicesAmountWeek4 = total_unpaid_invoices_amount_week_4();
$totalUnpaidInvoicesAmountWeek5 = total_unpaid_invoices_amount_week_5();
$totalUnpaidInvoicesAmountWeek6 = total_unpaid_invoices_amount_week_6();
$totalUnpaidInvoicesAmountWeek7 = total_unpaid_invoices_amount_week_7();
$totalUnpaidInvoicesAmountWeek8 = total_unpaid_invoices_amount_week_8();
$totalUnpaidInvoicesAmountWeek9 = total_unpaid_invoices_amount_week_9();

$totalPaidInvoicesAmountWeek0 = $totalInvoicesAmountWeek0 - $totalUnpaidInvoicesAmountWeek0;
$totalPaidInvoicesAmountWeek1 = $totalInvoicesAmountWeek1 - $totalUnpaidInvoicesAmountWeek1;
$totalPaidInvoicesAmountWeek2 = $totalInvoicesAmountWeek2 - $totalUnpaidInvoicesAmountWeek2;
$totalPaidInvoicesAmountWeek3 = $totalInvoicesAmountWeek3 - $totalUnpaidInvoicesAmountWeek3;
$totalPaidInvoicesAmountWeek4 = $totalInvoicesAmountWeek4 - $totalUnpaidInvoicesAmountWeek4;
$totalPaidInvoicesAmountWeek5 = $totalInvoicesAmountWeek5 - $totalUnpaidInvoicesAmountWeek5;
$totalPaidInvoicesAmountWeek6 = $totalInvoicesAmountWeek6 - $totalUnpaidInvoicesAmountWeek6;
$totalPaidInvoicesAmountWeek7 = $totalInvoicesAmountWeek7 - $totalUnpaidInvoicesAmountWeek7;
$totalPaidInvoicesAmountWeek8 = $totalInvoicesAmountWeek8 - $totalUnpaidInvoicesAmountWeek8;
$totalPaidInvoicesAmountWeek9 = $totalInvoicesAmountWeek9 - $totalUnpaidInvoicesAmountWeek9;


?>