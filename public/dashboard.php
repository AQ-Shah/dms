<?php 
	require_once("../includes/public_require.php"); 
	$current_page = "home";
	include("../includes/layouts/public_header.php"); 
?>

<?php
	$record_per_page = 5;
	$page = (isset ($_GET['page'])) ? (int)$_GET['page'] : 1 ;
	$total_pages = total_news_pages($record_per_page);
	$record_set = pagination_for_news($record_per_page,$page); ?>

<div id="main_panel">
    
    <div class="row">
    <div class="col-lg-1 col-xs-6"></div>
    <div class="col-lg-2 col-xs-6">
            <div class="colored-box" style="margin-top:5px;text-align: center;color:white; background-color: #b34857">
                <h3>2</h3>
                <p>Qotation Generated</p>
            </div>
    </div>
    <div class="col-lg-2 col-xs-6">
            <div class="colored-box" style="margin-top:5px;text-align: center;color:white; background-color: #151f89">
                <h3>14</h3>
                <p>PO Received</p>
            </div>
    </div>
    <div class="col-lg-2 col-xs-6">
            <div class="colored-box" style="margin-top:5px;text-align: center;color:white; background-color: #58467e">
                <h3>0</h3>
                <p>Work Completed</p>
            </div>
         </div>
   <div class="col-lg-2 col-xs-6"> 
            <div class="colored-box" style="margin-top:5px;text-align: center;color:white; background-color: #3c8dbc">
                <h3>0</h3>
                <p>Bill Generated</p>
            </div>
    </div>
    <div class="col-lg-2 col-xs-6">
            <div class="colored-box" style="margin-top:5px;text-align: center;color:white; background-color: #0d6631">
                <h3>12</h3>
                <p>Payment Received</p>
            </div>
    </div>
    <div class="col-lg-1 col-xs-6"></div>
</div>
    
</div>


<?php include("../includes/layouts/footer.php"); ?>
