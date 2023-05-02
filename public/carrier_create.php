<?php 
    require_once("../includes/public_require.php"); 
    $current_page = "carrier_create";
    include("../includes/layouts/public_header.php"); 


    if (isset($_POST['submit'])) {

      include("../includes/api/carrier_create_query.php"); 
      
    } else {
      //this is not a post request
    }
?>

<div class="container">

    <div class="row">
        <div class="col-12">
            <div class="page-title-box">

                <?php echo message(); ?>
                <?php echo form_errors($errors); ?>

                <h2>
                    New Carrier Forum
                </h2>

            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <!--Form-->
            <form class="" role="form" action="carrier_create" method="post" id="carrier-form">
                <?php include("../includes/views/carrier_form.php"); ?>
            </form>

        </div>
    </div>
</div>

<script>
function validateForm() {
    var form = document.getElementById("carrier-form");
    if (!form.checkValidity()) {
        form.classList.add('was-validated');

    }
}
</script>

<?php include("../includes/layouts/public_footer.php"); ?>