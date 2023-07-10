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
?></label>

<div class="container">

    <div class="row">
        <div class="col-12">
            <div class="page-title-box">

                <label><?php echo message(); ?></label>
                <label><?php echo form_errors($errors); ?></label>

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
                        <div><label><?php echo $form['dot']; ?></label></div>
                    </div>
                    <div class="col-4">
                        <div>MC : </div>
                        <div><label><?php echo $form['mc']; ?></label> </div>
                    </div>
                    <div class="col-4">
                        <div>Service Date:</div>
                        <div>
                            <label><?php echo $form['mc_validity']; ?></label>
                        </div>
                    </div>
                </div>
                <div class="col-12 panel-content-bordered">
                    <div class="col-4">Legal Business Name : </div>
                    <div class="col-8"><?php echo $form['b_name']; ?></div>
                </div>
                <div class="col-12 panel-content-bordered">
                    <div class="col-4">Business Address : </div>
                    <div class="col-8"><?php echo $form['b_address']; ?></div>
                </div>
                <div class="col-12 panel-content-bordered">
                    <div class="col-4">
                        <div> Owner Name : </div>
                        <div><label><?php echo $form['o_name']; ?></label> </div>
                    </div>
                    <div class="col-4">
                        <div>Business Number : </div>
                        <div><label><?php echo $form['b_number']; ?></label> </div>
                    </div>
                    <div class="col-4">
                        <div>E-mail</div>
                        <div><label><?php echo $form['b_email']; ?></label> </div>
                    </div>
                </div>
                <div class="col-12 panel-content-bordered">
                    <div class="col-6">
                        <div>Tax ID/ EIN :</div>
                        <div><label><?php echo $form['tax_id']; ?></label> </div>
                    </div>
                    <div class="col-6">
                        <div>Company Type :</div>
                        <div><label><?php echo $form['b_type']; ?></label> </div>
                    </div>
                </div>

            </div>



            <!-- Factoring Info -->
            <div class="row panel-content-primary card">
                <div class="col-12 panel-title text-center">
                    <h4>Factoring Company Info</h4>
                </div>
                <div class="col-12 panel-content-bordered">
                    <div class="col-6">Company Name : </div>
                    <div class="col-6"> <label><?php echo $form['factoring_name']; ?></label></div>
                </div>
                <div class="col-12 panel-content-bordered">

                    <div class="col-6">
                        <div class="col-6">Company Number : </div>
                        <div class="col-6"> <label><?php echo $form['factoring_number']; ?></label></div>
                    </div>
                    <div class="col-6">
                        <div class="col-6">Company email : </div>
                        <div class="col-6"> <label><?php echo $form['factoring_email']; ?></label></div>
                    </div>
                </div>
                <div class="col-12 panel-content-bordered">
                    <div class="col-6">
                        <div>Street Address</div>
                        <div> <label><?php echo $form['factoring_street']; ?></label></div>
                    </div>
                    <div class="col-6">
                        <div>City State Zip </div>
                        <div> <label><?php echo $form['factoring_state']; ?></label></div>
                    </div>

                </div>
            </div>

            <!-- Insurance Info -->
            <div class="row panel-content-primary card">
                <div class="col-12 panel-title text-center">
                    <h4>Insurance Company Info</h4>
                </div>
                <div class="col-12 panel-content-bordered">
                    <div class="col-6">Company Name : </div>
                    <div class="col-6"> <label><?php echo $form['insurance_name']; ?></label></div>
                </div>
                <div class="col-12 panel-content-bordered">
                    <div class="col-6">
                        <div class="col-6">Company Number : </div>
                        <div class="col-6"> <label><?php echo $form['insurance_number']; ?></label></div>
                    </div>
                    <div class="col-6">
                        <div class="col-6">Company email : </div>
                        <div class="col-6"> <label><?php echo $form['insurance_email']; ?></label></div>
                    </div>
                </div>
                <div class="col-12 panel-content-bordered">
                    <div class="col-6">
                        <div>Street Address</div>
                        <div> <label><?php echo $form['insurance_street']; ?></label></div>
                    </div>
                    <div class="col-6">
                        <div>City State Zip </div>
                        <div> <label><?php echo $form['insurance_state']; ?></label></div>
                    </div>
                </div>

                <?php if ($form['cgl_no']) { ?></label>
                <div class="text-center">
                    <h6>COMMERCIAL GENERAL LIABILITY</h6>
                </div>
                <div class="col-12 panel-content-bordered">
                    <div class="col-4">
                        <div>Policy Number : </div>
                        <div><label><?php echo $form['cgl_no']; ?></label></div>
                    </div>
                    <div class="col-4">
                        <div>Limit : </div>
                        <div><?php if($form['cgl_no']) echo $form['cgl_limit']; ?></label></div>
                    </div>
                    <div class="col-4">
                        <div>Policy Expiration : </div>
                        <div><?php if($form['cgl_no']) echo $form['cgl_expiration']; ?></label></div>
                    </div>
                </div>
                <?php } ?></label>
                <?php if ($form['aml_no']) { ?></label>
                <div class="text-center">
                    <h6>AUTOMOBILE LIABILITY</h6>
                </div>
                <div class="col-12 panel-content-bordered">
                    <div class="col-4">
                        <div>Policy Number : </div>
                        <div><label><?php echo $form['aml_no']; ?></label></div>
                    </div>
                    <div class="col-4">
                        <div>Limit : </div>
                        <div><label><?php echo $form['aml_limit']; ?></label></div>
                    </div>
                    <div class="col-4">
                        <div>Policy Expiration : </div>
                        <div><label><?php echo $form['aml_expiration']; ?></label></div>
                    </div>
                </div>
                <?php } ?></label>
                <?php if ($form['mtc_no']) { ?></label>
                <div class="text-center">
                    <h6>MOTOR TRUCK CARGO</h6>
                </div>
                <div class="col-12 panel-content-bordered">
                    <div class="col-4">
                        <div>Policy Number : </div>
                        <div><label><?php echo $form['mtc_no']; ?></label></div>
                    </div>
                    <div class="col-4">
                        <div>Limit : </div>
                        <div><label><?php echo $form['mtc_limit']; ?></label></div>
                    </div>
                    <div class="col-4">
                        <div>Policy Expiration : </div>
                        <div><label><?php echo $form['mtc_expiration']; ?></label></div>
                    </div>
                </div>
                <?php } ?></label>
                <?php if ($form['tic_no']) { ?></label>
                <div class="text-center">
                    <h6>TRAILER INTERCHANGE</h6>
                </div>
                <div class="col-12 panel-content-bordered">
                    <div class="col-4">
                        <div>Policy Number : </div>
                        <div><label><?php echo $form['tic_no']; ?></label></div>
                    </div>
                    <div class="col-4">
                        <div>Limit : </div>
                        <div><label><?php echo $form['tic_limit']; ?></label></div>
                    </div>
                    <div class="col-4">
                        <div>Policy Expiration : </div>
                        <div><label><?php echo $form['tic_expiration']; ?></label></div>
                    </div>
                </div>
                <?php } ?></label>

            </div>

            <!-- 
            <div class="row panel-content-primary card">
                <div class="col-12 panel-title text-center">
                    <h4>Drivers Info</h4>
                </div>
                <div class="col-12 panel-content-bordered">
                    <div class="col-6">
                        <div>Driver Name : </div>
                        <div> <label><?php echo $form['d_name']; ?></label></div>
                    </div>
                    <div class="col-6">
                        <div>Driver Number : </div>
                        <div> <label><?php echo $form['d_number']; ?></label></div>
                    </div>
                </div>
            </div>

           
            <div class="row panel-content-primary card">
                <div class="col-12 panel-title text-center">
                    <h4>Truck Info</h4>
                </div>
                <div class="col-12 panel-content-bordered">
                    <div class="col-6">Truck Type : </div>
                    <div class="col-6">
                        <label><?php echo $form['truck_type']; ?></label>
                    </div>
                </div>

                <div class="col-6 panel-content-bordered">
                    <div class="col-6">Truck Length (ft) :</div>
                    <div class="col-6"> <label><?php echo $form['t_length']; ?></label></div>
                </div>
                <div class="col-6 panel-content-bordered">
                    <div class="col-6">Weight Limit (lbs) : </div>
                    <div class="col-6"> <label><?php echo $form['t_weight']; ?></label></div>
                </div>
                <div class="col-6 panel-content-bordered">
                    <div class="col-6">Truck Number : </div>
                    <div class="col-6"> <label><?php echo $form['truck_no']; ?></label></div>
                </div>
                <div class="col-6 panel-content-bordered">
                    <div class="col-6">Trailer Number : </div>
                    <div class="col-6"> <label><?php echo $form['trailer_no']; ?></label></div>
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
                        '?></label>
                    <?php if ($form['twic']) echo'
                    <div class="col-3">
                        <div class="form-check form-radio-success">
                            <label class="custom-control custom-checkbox">
                                <input type="radio" id="twic" name="twic" class="form-check-input" checked>
                                <span class="custom-control-label ml-2" for="twic">TWIC</span>
                    </label>
                        </div>
                    </div>
                        '?></label>
                    <?php if ($form['sida']) echo'
                    <div class="col-3">
                        <div class="form-check form-radio-success">
                            <label class="custom-control custom-checkbox">
                                <input type="radio" id="sida" name="sida" class="form-check-input" checked>
                                <span class="custom-control-label ml-2" for="sida">SIDA</span>
                    </label>
                        </div>
                    </div>
                        '?></label>
                    <?php if ($form['atp']) echo'
                    <div class="col-3">
                        <div class="form-check form-radio-success">
                            <label class="custom-control custom-checkbox">
                                <input type="radio" id="atp" name="atp" class="form-check-input" checked>
                                <span class="custom-control-label ml-2" for="atp">Alcohol Transport Permit </span>
                    </label>
                        </div>
                    </div>
                        '?></label>

                </div>
            </div> -->

            <?php if (check_access("commission_view")){ ?></label>
            <!-- Commission Info -->
            <div class="row panel-content-primary card no-print ">

                <div class="col-6 text-end">Percentage : </div>
                <div class="col-6 text-start"> <label><?php echo $form['percentage']; ?></label></div>

            </div>
            <?php } ?></label>

        </div>

    </div>
</div>


<?php include("../includes/layouts/public_footer.php"); ?></label>