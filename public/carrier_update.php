<?php 
    require_once("../includes/public_require.php"); 
    $current_page = "carrier_update";
    include("../includes/layouts/public_header.php"); 


    if (isset($_POST['submit'])) {

      include("../includes/api/carrier_update_query.php"); 
      
    } 
    if (isset($_GET["id"])){
        if (!($form = find_carrier_form_by_id($_GET["id"]))){
            $_SESSION["message"] = "Something went wrong";
            redirect_to("home.php");
        } else {
             include("../includes/api/find_carrier_form.php"); 
        }
    }
    else {
        $_SESSION["message"] = "Something went wrong";
        redirect_to("home.php");
    }
?>

<div class="container">

    <div class="row">
        <div class="col-12">
            <div class="page-title-box">

                <?php echo message(); ?>
                <?php echo form_errors($errors); ?>

                <h2>
                    Carrier Update Forum
                </h2>

            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <!--Form-->
            <form class="" role="form" action="carrier_update?carrierID=<?php echo $form['id']; ?>" method="post"
                id="carrier-form">
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