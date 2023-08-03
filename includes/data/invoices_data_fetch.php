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


?>