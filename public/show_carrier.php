<?php 
    require_once("../includes/public_require.php"); 
    $current_page = "show_carrier";
    include("../includes/layouts/public_header.php"); 


   if (isset($_GET["id"])){
        if (!($form = find_carrier_form_by_id($_GET["id"]))){
            $_SESSION["message"] = "Carrier not found";
            redirect_to("home.php");
        }
    }
    else {
        $_SESSION["message"] = "Carrier not found";
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
                    Carrier Forum
                </h2>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="row panel-content-primary card">
                <div class="col-12 panel-title mb-3">
                    <h2>Carrier Info</h2>
                </div>
                <div class="col-12 col-sm-6 panel-content-secondary">
                    <div class="col-12 col-sm-6">US DOT : </div>
                    <div class="col-12 col-sm-6 form-value-primary"><?php echo $form['dot']; ?></div>
                </div>
                <div class="col-12 col-sm-6 panel-content-secondary">
                    <div class="col-12 col-sm-6">MC : </div>
                    <div class="col-12 col-sm-6 form-value-primary"><?php echo $form['mc']; ?> </div>
                </div>
                <div class="col-12 col-sm-6 panel-content-secondary">
                    <div class="col-12 col-sm-6">Legal Business Name : </div>
                    <div class="col-12 col-sm-6 form-value-primary"><?php echo $form['b_name']; ?> </div>
                </div>
                <div class="col-12 col-sm-6 panel-content-secondary">
                    <div class="col-12 col-sm-6">Business Address : </div>
                    <div class="col-12 col-sm-6 form-value-primary"><?php echo $form['b_address']; ?> </div>
                </div>
                <div class="col-12 col-sm-6 panel-content-secondary">
                    <div class="col-12 col-sm-6">Business Owner Name : </div>
                    <div class="col-12 col-sm-6 form-value-primary"><?php echo $form['o_name']; ?> </div>
                </div>
                <div class="col-12 col-sm-6 panel-content-secondary">
                    <div class="col-12 col-sm-6">Business Number : </div>
                    <div class="col-12 col-sm-6 form-value-primary"><?php echo $form['b_number']; ?> </div>
                </div>
                <div class="col-12 col-sm-6 panel-content-secondary">
                    <div class="col-12 col-sm-6">E-mail</div>
                    <div class="col-12 col-sm-6 form-value-primary"><?php echo $form['b_email']; ?> </div>
                </div>
                <div class="col-12 col-sm-6 panel-content-secondary">
                    <div class="col-12 col-sm-6">Tax ID :</div>
                    <div class="col-12 col-sm-6 form-value-primary"><?php echo $form['tax_id']; ?> </div>
                </div>

            </div>
            <!-- Truck Info -->
            <div class="row panel-content-primary card">
                <div class="col-12 panel-title mb-3">
                    <h2>Truck Info</h2>
                </div>
                <div class="col-12 col-sm-6 panel-content-secondary">
                    <div class="col-12 col-sm-6">Truck Type : </div>
                    <div class="col-12 col-sm-6">
                        <?php echo $form['truck_type']; ?>
                    </div>
                </div>
                <div class="col-12 col-sm-6 panel-content-secondary">
                    <div class="col-12 col-sm-6">MC validity : *</div>
                    <div class="col-12 col-sm-6">
                        <?php echo $form['mc_validity']; ?>
                    </div>
                </div>
                <div class="col-12 col-sm-6 panel-content-secondary">
                    <div class="col-12 col-sm-6">Driver Name : </div>
                    <div class="col-12 col-sm-6"> <?php echo $form['d_name']; ?></div>
                </div>
                <div class="col-12 col-sm-6 panel-content-secondary">
                    <div class="col-12 col-sm-6">Driver Number : </div>
                    <div class="col-12 col-sm-6"> <?php echo $form['d_number']; ?></div>
                </div>
                <div class="col-12 col-sm-6 panel-content-secondary">
                    <div class="col-12 col-sm-6">Truck Length (ft) :</div>
                    <div class="col-12 col-sm-6"> <?php echo $form['t_length']; ?></div>
                </div>
                <div class="col-12 col-sm-6 panel-content-secondary">
                    <div class="col-12 col-sm-6">Weight Limit (lbs) : </div>
                    <div class="col-12 col-sm-6"> <?php echo $form['t_weight']; ?></div>
                </div>
                <div class="col-lg-12 panel-content-secondary">
                    <div class="col-lg-3">
                        <div class="form-check form-radio-success">
                            <label class="custom-control custom-checkbox">
                                <input type="radio" id="hazmat" name="hazmat" class="form-check-input"
                                    <?php if ($form['hazmat']) echo 'checked'; else echo 'disabled' ?>>
                                <span class="custom-control-label ml-2" for="hazmat">HAZMAT</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-check form-radio-success">
                            <label class="custom-control custom-checkbox">
                                <input type="radio" id="twic" name="twic" class="form-check-input"
                                    <?php if ($form['twic']) echo 'checked'; else echo 'disabled' ?>>
                                <span class="custom-control-label ml-2" for="twic">TWIC</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-check form-radio-success">
                            <label class="custom-control custom-checkbox">
                                <input type="radio" id="sida" name="sida" class="form-check-input"
                                    <?php if ($form['sida']) echo 'checked'; else echo 'disabled' ?>>
                                <span class="custom-control-label ml-2" for="sida">SIDA</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-check form-radio-success">
                            <label class="custom-control custom-checkbox">
                                <input type="radio" id="tic" name="tic" class="form-check-input"
                                    <?php if ($form['tic']) echo 'checked'; else echo 'disabled' ?>>
                                <span class="custom-control-label ml-2" for="tic">Trailer Interchange</span>
                            </label>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Insurance Info -->
            <div class="row panel-content-primary card">
                <div class="col-12 panel-title mb-3">
                    <h2>Insurance Company Info</h2>
                </div>
                <div class="col-12 col-sm-6 panel-content-secondary">
                    <div class="col-12 col-sm-6">Company Name : </div>
                    <div class="col-12 col-sm-6"> <?php echo $form['insurance_name']; ?></div>
                </div>
                <div class="col-12 col-sm-6 panel-content-secondary">
                    <div class="col-12 col-sm-6">Company Number : </div>
                    <div class="col-12 col-sm-6"> <?php echo $form['insurance_number']; ?></div>
                </div>
                <div class="col-12 col-sm-6 panel-content-secondary">
                    <div class="col-12 col-sm-6">Street Address</div>
                    <div class="col-12 col-sm-6"> <?php echo $form['insurance_street']; ?></div>
                </div>
                <div class="col-12 col-sm-6 panel-content-secondary">
                    <div class="col-12 col-sm-6">City State Zip </div>
                    <div class="col-12 col-sm-6"> <?php echo $form['insurance_state']; ?></div>
                </div>
                <div class="col-12 col-sm-6 panel-content-secondary">
                    <div class="col-12 col-sm-6">email: </div>
                    <div class="col-12 col-sm-6"> <?php echo $form['insurance_email']; ?></div>
                </div>
            </div>
            <!-- Factoring Info -->
            <div class="row panel-content-primary card">
                <div class="col-12 panel-title mb-3">
                    <h2>Factoring Company Info</h2>
                </div>
                <div class="col-12 col-sm-6 panel-content-secondary">
                    <div class="col-12 col-sm-6">Company Name : </div>
                    <div class="col-12 col-sm-6"> <?php echo $form['factoring_name']; ?></div>
                </div>
                <div class="col-12 col-sm-6 panel-content-secondary">
                    <div class="col-12 col-sm-6">Company Number : </div>
                    <div class="col-12 col-sm-6"> <?php echo $form['factoring_number']; ?></div>
                </div>
                <div class="col-12 col-sm-6 panel-content-secondary">
                    <div class="col-12 col-sm-6">Street Address</div>
                    <div class="col-12 col-sm-6"> <?php echo $form['factoring_street']; ?></div>
                </div>
                <div class="col-12 col-sm-6 panel-content-secondary">
                    <div class="col-12 col-sm-6">City State Zip </div>
                    <div class="col-12 col-sm-6"> <?php echo $form['factoring_state']; ?></div>
                </div>
                <div class="col-12 col-sm-6 panel-content-secondary">
                    <div class="col-12 col-sm-6">email: </div>
                    <div class="col-12 col-sm-6"> <?php echo $form['factoring_email']; ?></div>
                </div>
            </div>
            <!-- Last line -->
            <div class="row panel-content-primary card">
                <div class="col-3 col-sm-3 col-md-3 text-center mt-2"></div>
                <div class="col-3 col-sm-3 col-md-3 text-center mt-2"></div>

            </div>
        </div>

    </div>
</div>


<?php include("../includes/layouts/public_footer.php"); ?>