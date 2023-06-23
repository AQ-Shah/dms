<?php 
	require_once("../includes/public_require.php"); 
	$current_page = "invoices_section";
	include("../includes/layouts/public_header.php"); 
 ?>

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="page-title-box">

                <?php echo message(); ?>

                <h2>
                    Invoice Management Section
                </h2>

            </div>
        </div>
    </div>

    <div class='row justify-content-center'>

        <div class="col-12 col-md-3 my-2">
            <div class="d-grid gap-3">
                <button type="button" class="primary-button" onclick="location.href='invoices_pending'">New Invoices
                </button>
            </div>
        </div>
        <div class="col-12 col-md-3 my-2">
            <div class="d-grid gap-3">
                <button type="button" class="primary-button" onclick="location.href='invoices_generated'"> Generated
                    Invoices</button>
            </div>
        </div>

    </div>



    <?php include("../includes/views/revenue_dashboard_1.php"); ?>




</div>

<?php 

include("../includes/layouts/public_footer.php"); 
?>