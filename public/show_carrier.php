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

            <!-- Carriers Info -->
            <div class="row panel-content-primary card">
                <div class="col-12 panel-title text-center">
                    <h4>Carrier Info</h4>
                </div>
                <div class="col-12 panel-content-bordered">
                    <div class="col-4">
                        <div>US DOT : </div>
                        <div><?php echo $form['dot']; ?></div>
                    </div>
                    <div class="col-4">
                        <div>MC : </div>
                        <div><?php echo $form['mc']; ?> </div>
                    </div>
                    <div class="col-4">
                        <div>Service Date:</div>
                        <div>
                            <?php echo $form['mc_validity']; ?>
                        </div>
                    </div>
                </div>
                <div class="col-12 panel-content-bordered">
                    <div class="col-4">Legal Business Name : </div>
                    <div class="col-8"><?php echo $form['b_name']; ?> </div>
                </div>
                <div class="col-12 panel-content-bordered">
                    <div class="col-4">Business Address : </div>
                    <div class="col-8"><?php echo $form['b_address']; ?> </div>
                </div>
                <div class="col-12 panel-content-bordered">
                    <div class="col-4">
                        <div> Owner Name : </div>
                        <div><?php echo $form['o_name']; ?> </div>
                    </div>
                    <div class="col-4">
                        <div>Business Number : </div>
                        <div><?php echo $form['b_number']; ?> </div>
                    </div>
                    <div class="col-4">
                        <div>E-mail</div>
                        <div><?php echo $form['b_email']; ?> </div>
                    </div>
                </div>
                <div class="col-12 panel-content-bordered">
                    <div class="col-6">
                        <div>Tax ID/ EIN :</div>
                        <div><?php echo $form['tax_id']; ?> </div>
                    </div>
                    <div class="col-6">
                        <div>Company Type :</div>
                        <div><?php echo $form['b_type']; ?> </div>
                    </div>
                </div>

            </div>

            <!-- Drivers Info -->
            <div class="row panel-content-primary card">
                <div class="col-12 panel-title text-center">
                    <h4>Drivers Info</h4>
                </div>
                <div class="col-12 panel-content-bordered">
                    <div class="col-6">
                        <div>Driver Name : </div>
                        <div> <?php echo $form['d_name']; ?></div>
                    </div>
                    <div class="col-6">
                        <div>Driver Number : </div>
                        <div> <?php echo $form['d_number']; ?></div>
                    </div>
                </div>
            </div>

            <!-- Truck Info -->
            <div class="row panel-content-primary card">
                <div class="col-12 panel-title text-center">
                    <h4>Truck Info</h4>
                </div>
                <div class="col-12 panel-content-bordered">
                    <div class="col-6">Truck Type : </div>
                    <div class="col-6">
                        <?php echo $form['truck_type']; ?>
                    </div>
                </div>

                <div class="col-6 panel-content-bordered">
                    <div class="col-6">Truck Length (ft) :</div>
                    <div class="col-6"> <?php echo $form['t_length']; ?></div>
                </div>
                <div class="col-6 panel-content-bordered">
                    <div class="col-6">Weight Limit (lbs) : </div>
                    <div class="col-6"> <?php echo $form['t_weight']; ?></div>
                </div>
                <div class="col-6 panel-content-bordered">
                    <div class="col-6">Truck Number : </div>
                    <div class="col-6"> <?php echo $form['truck_no']; ?></div>
                </div>
                <div class="col-6 panel-content-bordered">
                    <div class="col-6">Trailer Number : </div>
                    <div class="col-6"> <?php echo $form['trailer_no']; ?></div>
                </div>
                <div class="col-12 panel-content-bordered">
                    <?php if ($form['hazmat']) echo'
                    <div class="col-3">
                        <div class="form-check form-radio-success">
                            <label class="custom-control custom-checkbox">
                                <input type="radio" id="hazmat" name="hazmat" class="form-check-input" checked>
                                <span class="custom-control-label ml-2" for="hazmat">HAZMAT</span>
                            </label>
                        </div>
                    </div>
                        '?>
                    <?php if ($form['twic']) echo'
                    <div class="col-3">
                        <div class="form-check form-radio-success">
                            <label class="custom-control custom-checkbox">
                                <input type="radio" id="twic" name="twic" class="form-check-input" checked>
                                <span class="custom-control-label ml-2" for="twic">TWIC</span>
                    </label>
                        </div>
                    </div>
                        '?>
                    <?php if ($form['sida']) echo'
                    <div class="col-3">
                        <div class="form-check form-radio-success">
                            <label class="custom-control custom-checkbox">
                                <input type="radio" id="sida" name="sida" class="form-check-input" checked>
                                <span class="custom-control-label ml-2" for="sida">SIDA</span>
                    </label>
                        </div>
                    </div>
                        '?>
                    <?php if ($form['atp']) echo'
                    <div class="col-3">
                        <div class="form-check form-radio-success">
                            <label class="custom-control custom-checkbox">
                                <input type="radio" id="atp" name="atp" class="form-check-input" checked>
                                <span class="custom-control-label ml-2" for="atp">Alcohol Transport Permit </span>
                    </label>
                        </div>
                    </div>
                        '?>

                </div>
            </div>

            <!-- Factoring Info -->
            <div class="row panel-content-primary card">
                <div class="col-12 panel-title text-center">
                    <h4>Factoring Company Info</h4>
                </div>
                <div class="col-6 panel-content-bordered">
                    <div class="col-6">Company Name : </div>
                    <div class="col-6"> <?php echo $form['factoring_name']; ?></div>
                </div>
                <div class="col-6 panel-content-bordered">
                    <div class="col-6">Company Number : </div>
                    <div class="col-6"> <?php echo $form['factoring_number']; ?></div>
                </div>
                <div class="col-12 panel-content-bordered">
                    <div class="col-4">
                        <div>Street Address</div>
                        <div> <?php echo $form['factoring_street']; ?></div>
                    </div>
                    <div class="col-4">
                        <div>City State Zip </div>
                        <div> <?php echo $form['factoring_state']; ?></div>
                    </div>
                    <div class="col-4">
                        <div>email: </div>
                        <div> <?php echo $form['factoring_email']; ?></div>
                    </div>
                </div>
            </div>

            <!-- Insurance Info -->
            <div class="row panel-content-primary card">
                <div class="col-12 panel-title text-center">
                    <h4>Insurance Company Info</h4>
                </div>
                <div class="col-6 panel-content-bordered">
                    <div class="col-6">Company Name : </div>
                    <div class="col-6"> <?php echo $form['insurance_name']; ?></div>
                </div>
                <div class="col-6 panel-content-bordered">
                    <div class="col-6">Company Number : </div>
                    <div class="col-6"> <?php echo $form['insurance_number']; ?></div>
                </div>
                <div class="col-12 panel-content-bordered">
                    <div class="col-4">
                        <div>Street Address</div>
                        <div> <?php echo $form['insurance_street']; ?></div>
                    </div>
                    <div class="col-4">
                        <div>City State Zip </div>
                        <div> <?php echo $form['insurance_state']; ?></div>
                    </div>
                    <div class="col-4">
                        <div>email: </div>
                        <div> <?php echo $form['insurance_email']; ?></div>
                    </div>
                </div>

                <div class="text-center">
                    <h6>COMMERCIAL GENERAL LIABILITY</h6>
                </div>
                <div class="col-12 panel-content-bordered">
                    <div class="col-4">
                        <div>Policy Number : </div>
                        <div><?php echo $form['cgl_no']; ?></div>
                    </div>
                    <div class="col-4">
                        <div>Limit : </div>
                        <div><?php if($form['cgl_no']) echo $form['cgl_limit']; ?></div>
                    </div>
                    <div class="col-4">
                        <div>Policy Expiration : </div>
                        <div><?php if($form['cgl_no']) echo $form['cgl_expiration']; ?></div>
                    </div>
                </div>

                <div class="text-center">
                    <h6>AUTOMOBILE LIABILITY</h6>
                </div>
                <div class="col-12 panel-content-bordered">
                    <div class="col-4">
                        <div>Policy Number : </div>
                        <div><?php echo $form['aml_no']; ?></div>
                    </div>
                    <div class="col-4">
                        <div>Limit : </div>
                        <div><?php if($form['aml_no']) echo $form['aml_limit']; ?></div>
                    </div>
                    <div class="col-4">
                        <div>Policy Expiration : </div>
                        <div><?php if($form['aml_no']) echo $form['aml_expiration']; ?></div>
                    </div>
                </div>

                <div class="text-center">
                    <h6>MOTOR TRUCK CARGO</h6>
                </div>
                <div class="col-12 panel-content-bordered">
                    <div class="col-4">
                        <div>Policy Number : </div>
                        <div><?php echo $form['mtc_no']; ?></div>
                    </div>
                    <div class="col-4">
                        <div>Limit : </div>
                        <div><?php if($form['mtc_no']) echo $form['mtc_limit']; ?></div>
                    </div>
                    <div class="col-4">
                        <div>Policy Expiration : </div>
                        <div><?php if($form['mtc_no']) echo $form['mtc_expiration']; ?></div>
                    </div>
                </div>

                <div class="text-center">
                    <h6>TRAILER INTERCHANGE</h6>
                </div>
                <div class="col-12 panel-content-bordered">
                    <div class="col-4">
                        <div>Policy Number : </div>
                        <div><?php echo $form['tic_no']; ?></div>
                    </div>
                    <div class="col-4">
                        <div>Limit : </div>
                        <div><?php if($form['tic_no']) echo $form['tic_limit']; ?></div>
                    </div>
                    <div class="col-4">
                        <div>Policy Expiration : </div>
                        <div><?php if($form['tic_no']) echo $form['tic_expiration']; ?></div>
                    </div>
                </div>


            </div>

            <?php if (check_access("commission_view")){ ?>
            <!-- Commission Info -->
            <div class="row panel-content-primary card no-print ">

                <div class="col-6 text-end">Percentage : </div>
                <div class="col-6 text-start"> <?php echo $form['percentage']; ?></div>

            </div>
            <?php } ?>

        </div>

    </div>
</div>


<?php include("../includes/layouts/public_footer.php"); ?>