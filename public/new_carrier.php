<?php 
    require_once("../includes/public_require.php"); 
    $current_page = "new_carrier";
    include("../includes/layouts/public_header.php"); 


    if (isset($_POST['submit'])) {

      include("../includes/crud/new_carrier_query.php"); 
      
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

            <form class="" role="form" action="new_carrier" method="post" id="carrier-form">

                <div class="row panel-content-primary card">
                    <div class="col-12 panel-title mb-3">
                        <h2>Carrier Info</h2>
                    </div>
                    <div class="col-6 col-sm-4 panel-content-secondary">
                        <div class="col-12 col-sm-6">US DOT : *</div>
                        <div class="col-12 col-sm-6"><input type="number" class="form-control w-100" name="dot"
                                value="<?php if (isset($dot)){echo $dot;} ?>" required /></div>
                    </div>
                    <div class="col-6 col-sm-4 panel-content-secondary">
                        <div class="col-12 col-sm-6">MC : *</div>
                        <div class="col-12 col-sm-6"><input type="number" class="form-control w-100" name="mc"
                                value="<?php if (isset($mc)){echo $mc;} ?>" required /></div>
                    </div>
                    <div class="col-6 col-sm-4 panel-content-secondary">
                        <div class="col-12 col-sm-6">Legal Business Name : *</div>
                        <div class="col-12 col-sm-6"><input type="text" class="form-control w-100" name="b_name"
                                value="<?php if (isset($b_name)){echo $b_name;}  ?>" required></div>
                    </div>
                    <div class="col-6 col-sm-4 panel-content-secondary">
                        <div class="col-12 col-sm-6">Business Address : *</div>
                        <div class="col-12 col-sm-6"><input type="text" class="form-control w-100" name="b_address"
                                value="<?php if (isset($b_address)){echo $b_address;}  ?>" required>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 panel-content-secondary">
                        <div class="col-12 col-sm-6">Business Owner Name : </div>
                        <div class="col-12 col-sm-6"><input type="text" class="form-control w-100" name="o_name"
                                value="<?php if (isset($o_name)){echo $o_name;}  ?>"></div>
                    </div>
                    <div class="col-6 col-sm-4 panel-content-secondary">
                        <div class="col-12 col-sm-6">Business Number : *</div>
                        <div class="col-12 col-sm-6"><input type="tel" pattern="[0-9]{10}" minlength="10" maxlength="10"
                                class=" form-control w-100" name="b_number"
                                value="<?php if (isset($b_number)){echo $b_number;}  ?>" required></div>
                    </div>
                    <div class="col-6 col-sm-4 panel-content-secondary">
                        <div class="col-12 col-sm-6">email: </div>
                        <div class="col-12 col-sm-6"><input type="email" class="form-control w-100" name="b_email"
                                value="<?php if (isset($b_email)){echo $b_email;}  ?>"></div>
                    </div>
                    <div class="col-6 col-sm-4 panel-content-secondary">
                        <div class="col-12 col-sm-6">Tax ID : </div>
                        <div class="col-12 col-sm-6"><input type="text" class="form-control w-100" name="tax_id"
                                value="<?php if (isset($tax_id)){echo $tax_id;}  ?>"></div>
                    </div>
                </div>
                <!-- Truck Info -->
                <div class="row panel-content-primary card">
                    <div class="col-12 panel-title mb-3">
                        <h2>Truck Info</h2>
                    </div>
                    <div class="col-6 col-sm-4 panel-content-secondary">
                        <div class="col-12 col-sm-6">Truck Type : *</div>
                        <div class="col-12 col-sm-6">
                            <select name="truck_type" class="form-control w-100" required>
                                <option value="">Select truck type</option>
                                <option value="Box Truck">Box truck</option>
                                <option value="Dry Van">Dry Van</option>
                                <option value="Refer">Refer</option>
                                <option value="Power Only">Power Only</option>
                                <option value="Flat Bed">Flat Bed</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 panel-content-secondary">
                        <div class="col-12 col-sm-6">MC validity : *</div>
                        <div class="col-12 col-sm-6">
                            <select name="mc_validity" class="form-control w-100" required>
                                <option value="">Select the validity</option>
                                <option value="3">less than 3 months</option>
                                <option value="6">less than 6 months</option>
                                <option value="12">more than 6 months</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 panel-content-secondary">
                        <div class="col-12 col-sm-6">Driver Name : </div>
                        <div class="col-12 col-sm-6"><input type="text" class="form-control w-100" name="d_name"
                                value="<?php if (isset($d_name)){echo $d_name;}  ?>"></div>
                    </div>
                    <div class="col-6 col-sm-4 panel-content-secondary">
                        <div class="col-12 col-sm-6">Driver Number : </div>
                        <div class="col-12 col-sm-6"><input type="tel" pattern="[0-9]{10}" minlength="10" maxlength="10"
                                class="form-control w-100" name="d_number"
                                value="<?php if (isset($d_number)){echo $d_number;}  ?>"></div>
                    </div>
                    <div class="col-6 col-sm-4 panel-content-secondary">
                        <div class="col-12 col-sm-6">Truck Length (ft) :</div>
                        <div class="col-12 col-sm-6"><input type="number" class="form-control w-100" name="t_length"
                                value="<?php if (isset($t_length)){echo $t_length;} ?>" /></div>
                    </div>
                    <div class="col-6 col-sm-4 panel-content-secondary">
                        <div class="col-12 col-sm-6">Weight Limit (lbs) : </div>
                        <div class="col-12 col-sm-6"><input type="number" class="form-control w-100" name="t_weight"
                                value="<?php if (isset($t_weight)){echo $t_weight;}  ?>"></div>
                    </div>
                    <div class="col-lg-12 panel-content-secondary">
                        <div class="col-lg-3">
                            <div class="form-check form-check-inline">
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="hazmat">
                                    <span class="custom-control-label ml-2" for="hazmat">HAZMAT</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-check form-check-inline">
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="twic">
                                    <span class="custom-control-label ml-2" for="twic">TWIC</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-check form-check-inline">
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="sida">
                                    <span class="custom-control-label ml-2" for="sida">SIDA</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-check form-check-inline">
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="tic">
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
                    <div class="col-6 col-sm-4 panel-content-secondary">
                        <div class="col-12 col-sm-6">Company Name : </div>
                        <div class="col-12 col-sm-6"><input type="text" class="form-control w-100" name="insurance_name"
                                value="<?php if (isset($insurance_name)){echo $insurance_name;}  ?>"></div>
                    </div>
                    <div class="col-6 col-sm-4 panel-content-secondary">
                        <div class="col-12 col-sm-6">Company Number : </div>
                        <div class="col-12 col-sm-6"><input type="tel" pattern="[0-9]{10}" minlength="10" maxlength="10"
                                class="form-control w-100" name="insurance_number"
                                value="<?php if (isset($insurance_number)){echo $insurance_number;}  ?>"></div>
                    </div>
                    <div class="col-6 col-sm-4 panel-content-secondary">
                        <div class="col-12 col-sm-6">Street Address</div>
                        <div class="col-12 col-sm-6"><input type="text" class="form-control w-100"
                                name="insurance_street"
                                value="<?php if (isset($insurance_street)){echo $insurance_street;} ?>" /></div>
                    </div>
                    <div class="col-6 col-sm-4 panel-content-secondary">
                        <div class="col-12 col-sm-6">City State Zip </div>
                        <div class="col-12 col-sm-6"><input type="text" class="form-control w-100"
                                name="insurance_state"
                                value="<?php if (isset($insurance_state)){echo $insurance_state;} ?>" /></div>
                    </div>
                    <div class="col-6 col-sm-4 panel-content-secondary">
                        <div class="col-12 col-sm-6">email: </div>
                        <div class="col-12 col-sm-6"><input type="email" class="form-control w-100"
                                name="insurance_email"
                                value="<?php if (isset($insurance_email)){echo $insurance_email;}  ?>"></div>
                    </div>
                </div>
                <!-- Factoring Info -->
                <div class="row panel-content-primary card">
                    <div class="col-12 panel-title mb-3">
                        <h2>Factoring Company Info</h2>
                    </div>
                    <div class="col-6 col-sm-4 panel-content-secondary">
                        <div class="col-12 col-sm-6">Company Name : </div>
                        <div class="col-12 col-sm-6"><input type="text" class="form-control w-100" name="factoring_name"
                                value="<?php if (isset($factoring_name)){echo $factoring_name;}  ?>"></div>
                    </div>
                    <div class="col-6 col-sm-4 panel-content-secondary">
                        <div class="col-12 col-sm-6">Company Number : </div>
                        <div class="col-12 col-sm-6"><input type="tel" pattern="[0-9]{10}" minlength="10" maxlength="10"
                                class="form-control w-100" name="factoring_number"
                                value="<?php if (isset($factoring_number)){echo $factoring_number;}  ?>"></div>
                    </div>
                    <div class="col-6 col-sm-4 panel-content-secondary">
                        <div class="col-12 col-sm-6">Street Address</div>
                        <div class="col-12 col-sm-6"><input type="text" class="form-control w-100"
                                name="factoring_street"
                                value="<?php if (isset($factoring_street)){echo $factoring_street;} ?>" /></div>
                    </div>
                    <div class="col-6 col-sm-4 panel-content-secondary">
                        <div class="col-12 col-sm-6">City State Zip </div>
                        <div class="col-12 col-sm-6"><input type="text" class="form-control w-100"
                                name="factoring_state"
                                value="<?php if (isset($factoring_state)){echo $factoring_state;} ?>" /></div>
                    </div>
                    <div class="col-6 col-sm-4 panel-content-secondary">
                        <div class="col-12 col-sm-6">email: </div>
                        <div class="col-12 col-sm-6"><input type="email" class="form-control w-100"
                                name="factoring_email"
                                value="<?php if (isset($factoring_email)){echo $factoring_email;}  ?>"></div>
                    </div>
                </div>
                <!-- Last line -->
                <div class="row panel-content-primary card">
                    <div class="col-3 col-sm-3 col-md-3 text-center mt-2">Percentage:</div>
                    <div class="col-3 col-sm-3 col-md-3 text-center mt-2"><input type="float" style="width:100%"
                            name="percentage" min="0" max="100"
                            value="<?php if (isset($percentage)){echo $percentage;}else {echo 5;} ?>"" required/></div>
            
                                <div class=" col-6 col-sm-6 col-md-6 text-center mt-2"><button type="submit"
                            name="submit" class="btn btn-primary" style="width:100%" onclick="validateForm()">Save
                            Carrier</button>
                    </div>
                </div>

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