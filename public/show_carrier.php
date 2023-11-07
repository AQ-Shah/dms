<?php 
    require_once("../includes/public_require.php"); 
    $current_page = "show_carrier";
    include("../includes/layouts/public_header.php"); 


   if (isset($_GET["id"])){

        if (($carrier = find_carrier_form_by_id($_GET["id"]))){
            $truck_counter = 0;
            $truck_record_set = find_trucks_by_carrier_id($carrier['id']);
           
        } else {
            $_SESSION["message"] = "Carrier not found";
            redirect_to("home.php");
        }

    }
    else {
        $_SESSION["message"] = "something went wrong";
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
                        <div><label><?php echo $carrier['dot']; ?></label></div>
                    </div>
                    <div class="col-4">
                        <div>MC : </div>
                        <div><label><?php echo $carrier['mc']; ?></label> </div>
                    </div>
                    <div class="col-4">
                        <div>Service Date:</div>
                        <div>
                            <label><?php echo $carrier['mc_validity']; ?></label>
                        </div>
                    </div>
                </div>
                <div class="col-12 panel-content-bordered">
                    <div class="col-4">Legal Business Name : </div>
                    <div class="col-8"><?php echo $carrier['b_name']; ?></div>
                </div>
                <div class="col-12 panel-content-bordered">
                    <div class="col-4">Business Address : </div>
                    <div class="col-8"><?php echo $carrier['b_address']; ?></div>
                </div>
                <div class="col-12 panel-content-bordered">
                    <div class="col-4">
                        <div> Owner Name : </div>
                        <div><label><?php echo $carrier['o_name']; ?></label> </div>
                    </div>
                    <div class="col-4">
                        <div>Business Number : </div>
                        <div><label><?php echo $carrier['b_number']; ?></label> </div>
                    </div>
                    <div class="col-4">
                        <div>E-mail</div>
                        <div><label><?php echo $carrier['b_email']; ?></label> </div>
                    </div>
                </div>
                <div class="col-12 panel-content-bordered">
                    <div class="col-6">
                        <div>Tax ID/ EIN :</div>
                        <div><label><?php echo $carrier['tax_id']; ?></label> </div>
                    </div>
                    <div class="col-6">
                        <div>Company Type :</div>
                        <div><label><?php echo $carrier['b_type']; ?></label> </div>
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
                    <div class="col-6"> <label><?php echo $carrier['factoring_name']; ?></label></div>
                </div>
                <div class="col-12 panel-content-bordered">

                    <div class="col-6">
                        <div class="col-6">Company Number : </div>
                        <div class="col-6"> <label><?php echo $carrier['factoring_number']; ?></label></div>
                    </div>
                    <div class="col-6">
                        <div class="col-6">Company email : </div>
                        <div class="col-6"> <label><?php echo $carrier['factoring_email']; ?></label></div>
                    </div>
                </div>
                <div class="col-12 panel-content-bordered">
                    <div class="col-6">
                        <div>Street Address</div>
                        <div> <label><?php echo $carrier['factoring_street']; ?></label></div>
                    </div>
                    <div class="col-6">
                        <div>City State Zip </div>
                        <div> <label><?php echo $carrier['factoring_state']; ?></label></div>
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
                    <div class="col-6"> <label><?php echo $carrier['insurance_name']; ?></label></div>
                </div>
                <div class="col-12 panel-content-bordered">
                    <div class="col-6">
                        <div class="col-6">Company Number : </div>
                        <div class="col-6"> <label><?php echo $carrier['insurance_number']; ?></label></div>
                    </div>
                    <div class="col-6">
                        <div class="col-6">Company email : </div>
                        <div class="col-6"> <label><?php echo $carrier['insurance_email']; ?></label></div>
                    </div>
                </div>
                <div class="col-12 panel-content-bordered">
                    <div class="col-6">
                        <div>Street Address</div>
                        <div> <label><?php echo $carrier['insurance_street']; ?></label></div>
                    </div>
                    <div class="col-6">
                        <div>City State Zip </div>
                        <div> <label><?php echo $carrier['insurance_state']; ?></label></div>
                    </div>
                </div>

                <?php if ($carrier['cgl_no']) { ?></label>
                <div class="text-center">
                    <h6>COMMERCIAL GENERAL LIABILITY</h6>
                </div>
                <div class="col-12 panel-content-bordered">
                    <div class="col-4">
                        <div>Policy Number : </div>
                        <div><label><?php echo $carrier['cgl_no']; ?></label></div>
                    </div>
                    <div class="col-4">
                        <div>Limit : </div>
                        <div><?php if($carrier['cgl_no']) echo $carrier['cgl_limit']; ?></label></div>
                    </div>
                    <div class="col-4">
                        <div>Policy Expiration : </div>
                        <div><?php if($carrier['cgl_no']) echo $carrier['cgl_expiration']; ?></label></div>
                    </div>
                </div>
                <?php } ?></label>
                <?php if ($carrier['aml_no']) { ?></label>
                <div class="text-center">
                    <h6>AUTOMOBILE LIABILITY</h6>
                </div>
                <div class="col-12 panel-content-bordered">
                    <div class="col-4">
                        <div>Policy Number : </div>
                        <div><label><?php echo $carrier['aml_no']; ?></label></div>
                    </div>
                    <div class="col-4">
                        <div>Limit : </div>
                        <div><label><?php echo $carrier['aml_limit']; ?></label></div>
                    </div>
                    <div class="col-4">
                        <div>Policy Expiration : </div>
                        <div><label><?php echo $carrier['aml_expiration']; ?></label></div>
                    </div>
                </div>
                <?php } ?></label>
                <?php if ($carrier['mtc_no']) { ?></label>
                <div class="text-center">
                    <h6>MOTOR TRUCK CARGO</h6>
                </div>
                <div class="col-12 panel-content-bordered">
                    <div class="col-4">
                        <div>Policy Number : </div>
                        <div><label><?php echo $carrier['mtc_no']; ?></label></div>
                    </div>
                    <div class="col-4">
                        <div>Limit : </div>
                        <div><label><?php echo $carrier['mtc_limit']; ?></label></div>
                    </div>
                    <div class="col-4">
                        <div>Policy Expiration : </div>
                        <div><label><?php echo $carrier['mtc_expiration']; ?></label></div>
                    </div>
                </div>
                <?php } ?></label>
                <?php if ($carrier['tic_no']) { ?></label>
                <div class="text-center">
                    <h6>TRAILER INTERCHANGE</h6>
                </div>
                <div class="col-12 panel-content-bordered">
                    <div class="col-4">
                        <div>Policy Number : </div>
                        <div><label><?php echo $carrier['tic_no']; ?></label></div>
                    </div>
                    <div class="col-4">
                        <div>Limit : </div>
                        <div><label><?php echo $carrier['tic_limit']; ?></label></div>
                    </div>
                    <div class="col-4">
                        <div>Policy Expiration : </div>
                        <div><label><?php echo $carrier['tic_expiration']; ?></label></div>
                    </div>
                </div>
                <?php } ?></label>

            </div>

            <?php while ($truck = mysqli_fetch_assoc($truck_record_set)) { $truck_counter++ ;?>
            <div class="row panel-content-primary card">
                <div class="col-12 panel-title text-center">
                    <h4>Drivers & Truck : <?php echo $truck_counter;?></h4>
                </div>
                <div class="col-12 panel-content-bordered">
                    <div class="col-6">
                        <div>Driver Name : </div>
                        <div> <label><?php echo htmlentities($truck['d_name']); ?></label></div>
                    </div>
                    <div class="col-6">
                        <div>Driver Number : </div>
                        <div> <label><?php echo $truck['d_number']; ?></label></div>
                    </div>
                </div>
                <div class="col-12 panel-content-bordered">
                    <div class="col-6">Truck Type : </div>
                    <div class="col-6">
                        <label><?php echo $truck['truck_type']; ?></label>
                    </div>
                </div>

                <div class="col-6 panel-content-bordered">
                    <div class="col-6">Truck Length (ft) :</div>
                    <div class="col-6"> <label><?php echo $truck['t_length']; ?></label></div>
                </div>
                <div class="col-6 panel-content-bordered">
                    <div class="col-6">Weight Limit (lbs) : </div>
                    <div class="col-6"> <label><?php echo $truck['t_weight']; ?></label></div>
                </div>
                <div class="col-6 panel-content-bordered">
                    <div class="col-6">Truck Number : </div>
                    <div class="col-6"> <label><?php echo $truck['truck_no']; ?></label></div>
                </div>
                <div class="col-6 panel-content-bordered">
                    <div class="col-6">Trailer Number : </div>
                    <div class="col-6"> <label><?php echo $truck['trailer_no']; ?></label></div>
                </div>
                <div class="col-12 panel-content-bordered">
                    <?php if ($truck['hazmat']) echo'
                    <div class="col-3">
                        <div class="form-check form-radio-success">
                            <label class="custom-control custom-checkbox">
                                <input type="radio" id="hazmat" name="hazmat" class="form-check-input" checked>
                                <span class="custom-control-label ml-2" for="hazmat">HAZMAT</span>
                            </label>
                        </div>
                    </div>
                        '?></label>
                    <?php if ($truck['twic']) echo'
                    <div class="col-3">
                        <div class="form-check form-radio-success">
                            <label class="custom-control custom-checkbox">
                                <input type="radio" id="twic" name="twic" class="form-check-input" checked>
                                <span class="custom-control-label ml-2" for="twic">TWIC</span>
                    </label>
                        </div>
                    </div>
                        '?></label>
                    <?php if ($truck['sida']) echo'
                    <div class="col-3">
                        <div class="form-check form-radio-success">
                            <label class="custom-control custom-checkbox">
                                <input type="radio" id="sida" name="sida" class="form-check-input" checked>
                                <span class="custom-control-label ml-2" for="sida">SIDA</span>
                    </label>
                        </div>
                    </div>
                        '?></label>
                    <?php if ($truck['atp']) echo'
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
            </div>
            <?php } ?>

            <?php if (check_access("commission_view")){ ?></label>
            <!-- Commission Info -->
            <div class="row panel-content-primary card no-print ">

                <div class="col-3 text-end">Percentage (per load): </div>
                <div class="col-3 text-start"> <label><?php echo $carrier['percentage']; ?></label></div>
                <div class="col-3 text-end">Weekly Fixed : </div>
                <div class="col-3 text-start"> <label><?php echo '$'.$carrier['weekly_fixed']; ?></label></div>

            </div>
            <?php } ?></label>

        </div>

    </div>
</div>


<?php include("../includes/layouts/public_footer.php"); ?></label>