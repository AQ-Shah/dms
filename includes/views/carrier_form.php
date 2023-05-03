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
            <div class="col-12 col-sm-6">Service Date : *</div>
            <div class="col-12 col-sm-6">
                <input type="date" id="mc_validity" name="mc_validity"
                    value="<?php if (isset($mc_validity)){echo $mc_validity;} ?>"><br>
            </div>
        </div>
        <div class="col-6 col-sm-4 panel-content-secondary">
            <div class="col-12 col-sm-6">Legal Business Name : *</div>
            <div class="col-12 col-sm-6"><input type="text" class="form-control w-100" name="b_name"
                    value="<?php if (isset($b_name)){echo $b_name;}  ?>" required></div>
        </div>
        <div class="col-6 col-sm-4 panel-content-secondary">
            <div class="col-12 col-sm-6">DBA : </div>
            <div class="col-12 col-sm-6"><input type="text" class="form-control w-100" name="dba"
                    value="<?php if (isset($dba)){echo $dba;}  ?>"></div>
        </div>
        <div class="col-6 col-sm-4 panel-content-secondary">
            <div class="col-12 col-sm-6">Business Owner Name : </div>
            <div class="col-12 col-sm-6"><input type="text" class="form-control w-100" name="o_name"
                    value="<?php if (isset($o_name)){echo $o_name;}  ?>"></div>
        </div>
        <div class="col-6 col-sm-4 panel-content-secondary">
            <div class="col-12 col-sm-6">Business Address : *</div>
            <div class="col-12 col-sm-6"><input type="text" class="form-control w-100" name="b_address"
                    value="<?php if (isset($b_address)){echo $b_address;}  ?>" required>
            </div>
        </div>
        <div class="col-6 col-sm-4 panel-content-secondary">
            <div class="col-12 col-sm-6">Business Number : *</div>
            <div class="col-12 col-sm-6"><input type="tel" pattern="[0-9]{10}" minlength="10" maxlength="10"
                    class=" form-control w-100" name="b_number" value="<?php if (isset($b_number)){echo $b_number;}  ?>"
                    required></div>
        </div>
        <div class="col-6 col-sm-4 panel-content-secondary">
            <div class="col-12 col-sm-6">email: </div>
            <div class="col-12 col-sm-6"><input type="email" class="form-control w-100" name="b_email"
                    value="<?php if (isset($b_email)){echo $b_email;}  ?>"></div>
        </div>
        <div class="col-6 col-sm-4 panel-content-secondary">
            <div class="col-12 col-sm-6">Tax ID /EIN : </div>
            <div class="col-12 col-sm-6"><input type="text" class="form-control w-100" name="tax_id"
                    value="<?php if (isset($tax_id)){echo $tax_id;}  ?>"></div>
        </div>
        <div class="col-6 col-sm-4 panel-content-secondary">
            <div class="col-12 col-sm-6">Company Type : </div>
            <div class="col-12 col-sm-6">
                <select name="b_type" class="form-control w-100">
                    <option value="Individual/sole proprietor or single-member LLC"
                        <?php if (isset($b_type) && $b_type == "Individual/sole proprietor or single-member LLC") echo 'selected'; ?>>
                        Individual/sole proprietor or
                        single-member LLC</option>
                    <option value="C Corporation"
                        <?php if (isset($b_type) && $b_type == "C Corporation") echo 'selected'; ?>>C Corporation
                    </option>
                    <option value="S Corporation"
                        <?php if (isset($b_type) && $b_type == "S Corporation") echo 'selected'; ?>>S Corporation
                    </option>
                    <option value="Partnership"
                        <?php if (isset($b_type) && $b_type == "Partnership") echo 'selected'; ?>>Partnership</option>
                    <option value="Trust/estate single-member LLC"
                        <?php if (isset($b_type) && $b_type == "Trust/estate single-member LLC") echo 'selected'; ?>>
                        Trust/estate single-member LLC</option>
                    <option value="Limited liability company"
                        <?php if (isset($b_type) && $b_type == "Limited liability company") echo 'selected'; ?>>
                        Limited liability company</option>
                    <option value="Others" <?php if (isset($b_type) && $b_type == "Others") echo 'selected'; ?>>
                        Others</option>
                </select>
            </div>
        </div>
    </div>
    <!-- Drivers Info -->
    <div class="row panel-content-primary card">
        <div class="col-12 panel-title mb-3">
            <h2>Drivers Info</h2>
        </div>

        <div class="col-6 col-sm-4 panel-content-secondary">
            <div class="col-12 col-sm-6">Driver Name : </div>
            <div class="col-12 col-sm-6"><input type="text" class="form-control w-100" name="d_name"
                    value="<?php if (isset($d_name)){echo $d_name;}  ?>"></div>
        </div>
        <div class="col-6 col-sm-4 panel-content-secondary">
            <div class="col-12 col-sm-6">Driver Number : </div>
            <div class="col-12 col-sm-6"><input type="tel" pattern="[0-9]{10}" minlength="10" maxlength="10"
                    class="form-control w-100" name="d_number" value="<?php if (isset($d_number)){echo $d_number;}  ?>">
            </div>
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
                    <option value="Box Truck"
                        <?php if (isset($truck_type) && $truck_type == "Box Truck") echo 'selected'; ?>>Box Truck
                    </option>
                    <option value="Dry Van"
                        <?php if (isset($truck_type) && $truck_type == "Dry Van") echo 'selected'; ?>>Dry Van</option>
                    <option value="Reefer" <?php if (isset($truck_type) && $truck_type == "Reefer") echo 'selected'; ?>>
                        Reefer</option>
                    <option value="Power Only"
                        <?php if (isset($truck_type) && $truck_type == "Power Only") echo 'selected'; ?>>Power Only
                    </option>
                    <option value="Flat Bed"
                        <?php if (isset($truck_type) && $truck_type == "Flat Bed") echo 'selected'; ?>>Flat Bed</option>
                    <option value="Hot Shot"
                        <?php if (isset($truck_type) && $truck_type == "Hot Shot") echo 'selected'; ?>>Hot Shot</option>
                </select>
            </div>
        </div>
        <div class="col-6 col-sm-4 panel-content-secondary">
            <div class="col-12 col-sm-6">Truck Number :</div>
            <div class="col-12 col-sm-6"><input type="number" class="form-control w-100" name="truck_no"
                    value="<?php if (isset($truck_no)){echo $truck_no;} ?>" /></div>
        </div>
        <div class="col-6 col-sm-4 panel-content-secondary">
            <div class="col-12 col-sm-6">Trailer Number : </div>
            <div class="col-12 col-sm-6"><input type="number" class="form-control w-100" name="trailer_no"
                    value="<?php if (isset($trailer_no)){echo $trailer_no;}  ?>"></div>
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
                        <input type="checkbox" class="custom-control-input" name="hazmat"
                            <?php if (isset($hazmat) && $hazmat != 0) echo 'checked'; ?>>
                        <span class="custom-control-label ml-2" for="hazmat">HAZMAT</span>
                    </label>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-check form-check-inline">
                    <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="twic"
                            <?php if (isset($twic) && $twic != 0) echo 'checked'; ?>>
                        <span class="custom-control-label ml-2" for="twic">TWIC</span>
                    </label>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-check form-check-inline">
                    <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="sida"
                            <?php if (isset($sida) && $sida != 0) echo 'checked'; ?>>
                        <span class="custom-control-label ml-2" for="sida">SIDA</span>
                    </label>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-check form-check-inline">
                    <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="atp"
                            <?php if (isset($atp) && $atp != 0) echo 'checked'; ?>>
                        <span class="custom-control-label ml-2" for="atp">Alcohol Transport Permit </span>
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
            <div class="col-12 col-sm-6"><input type="text" class="form-control w-100" name="insurance_street"
                    value="<?php if (isset($insurance_street)){echo $insurance_street;} ?>" /></div>
        </div>
        <div class="col-6 col-sm-4 panel-content-secondary">
            <div class="col-12 col-sm-6">City State Zip </div>
            <div class="col-12 col-sm-6"><input type="text" class="form-control w-100" name="insurance_state"
                    value="<?php if (isset($insurance_state)){echo $insurance_state;} ?>" /></div>
        </div>
        <div class="col-6 col-sm-4 panel-content-secondary">
            <div class="col-12 col-sm-6">email: </div>
            <div class="col-12 col-sm-6"><input type="email" class="form-control w-100" name="insurance_email"
                    value="<?php if (isset($insurance_email)){echo $insurance_email;}  ?>"></div>
        </div>
        <div class="col-6 col-sm-4 panel-content-secondary">
            <!-- alignment -->
        </div>
        <div class="text-center">
            <h5>COMMERCIAL GENERAL LIABILITY</h5>
        </div>
        <div class="col-6 col-sm-4 panel-content-secondary">
            <div class="col-12 col-sm-6">Policy Number : </div>
            <div class="col-12 col-sm-6"><input type="text" class="form-control w-100" name="cgl_no"
                    value="<?php if (isset($cgl_no)){echo $cgl_no;}  ?>"></div>
        </div>
        <div class="col-6 col-sm-4 panel-content-secondary">
            <div class="col-12 col-sm-6">Limit : </div>
            <div class="col-12 col-sm-6"><input type="number" class="form-control w-100" name="cgl_limit"
                    value="<?php if (isset($cgl_limit)){echo $cgl_limit;}  ?>"></div>
        </div>
        <div class="col-6 col-sm-4 panel-content-secondary">
            <div class="col-12 col-sm-6">Policy Expiration : </div>
            <div class="col-12 col-sm-6"><input type="date" class="form-control w-100" name="cgl_expiration"
                    value="<?php if (isset($cgl_expiration)){echo $cgl_expiration;}  ?>"></div>
        </div>
        <div class="text-center">
            <h5>AUTOMOBILE LIABILITY</h5>
        </div>
        <div class="col-6 col-sm-4 panel-content-secondary">
            <div class="col-12 col-sm-6">Policy Number : </div>
            <div class="col-12 col-sm-6"><input type="text" class="form-control w-100" name="aml_no"
                    value="<?php if (isset($aml_no)){echo $aml_no;}  ?>"></div>
        </div>
        <div class="col-6 col-sm-4 panel-content-secondary">
            <div class="col-12 col-sm-6">Limit : </div>
            <div class="col-12 col-sm-6"><input type="number" class="form-control w-100" name="aml_limit"
                    value="<?php if (isset($aml_limit)){echo $aml_limit;}  ?>"></div>
        </div>
        <div class="col-6 col-sm-4 panel-content-secondary">
            <div class="col-12 col-sm-6">Policy Expiration : </div>
            <div class="col-12 col-sm-6"><input type="date" class="form-control w-100" name="aml_expiration"
                    value="<?php if (isset($aml_expiration)){echo $aml_expiration;}  ?>"></div>
        </div>
        <div class="text-center">
            <h5>MOTOR TRUCK CARGO</h5>
        </div>
        <div class="col-6 col-sm-4 panel-content-secondary">
            <div class="col-12 col-sm-6">Policy Number : </div>
            <div class="col-12 col-sm-6"><input type="text" class="form-control w-100" name="mtc_no"
                    value="<?php if (isset($mtc_no)){echo $mtc_no;}  ?>"></div>
        </div>
        <div class="col-6 col-sm-4 panel-content-secondary">
            <div class="col-12 col-sm-6">Limit : </div>
            <div class="col-12 col-sm-6"><input type="number" class="form-control w-100" name="mtc_limit"
                    value="<?php if (isset($mtc_limit)){echo $mtc_limit;}  ?>"></div>
        </div>
        <div class="col-6 col-sm-4 panel-content-secondary">
            <div class="col-12 col-sm-6">Policy Expiration : </div>
            <div class="col-12 col-sm-6"><input type="date" class="form-control w-100" name="mtc_expiration"
                    value="<?php if (isset($mtc_expiration)){echo $mtc_expiration;}  ?>"></div>
        </div>
        <div class="text-center">
            <h5>TRAILER INTERCHANGE</h5>
        </div>
        <div class="col-6 col-sm-4 panel-content-secondary">
            <div class="col-12 col-sm-6">Policy Number : </div>
            <div class="col-12 col-sm-6"><input type="text" class="form-control w-100" name="tic_no"
                    value="<?php if (isset($tic_no)){echo $tic_no;}  ?>"></div>
        </div>
        <div class="col-6 col-sm-4 panel-content-secondary">
            <div class="col-12 col-sm-6">Limit : </div>
            <div class="col-12 col-sm-6"><input type="number" class="form-control w-100" name="tic_limit"
                    value="<?php if (isset($tic_limit)){echo $tic_limit;}  ?>"></div>
        </div>
        <div class="col-6 col-sm-4 panel-content-secondary">
            <div class="col-12 col-sm-6">Policy Expiration : </div>
            <div class="col-12 col-sm-6"><input type="date" class="form-control w-100" name="tic_expiration"
                    value="<?php if (isset($tic_expiration)){echo $tic_expiration;}  ?>"></div>
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
            <div class="col-12 col-sm-6"><input type="text" class="form-control w-100" name="factoring_street"
                    value="<?php if (isset($factoring_street)){echo $factoring_street;} ?>" /></div>
        </div>
        <div class="col-6 col-sm-4 panel-content-secondary">
            <div class="col-12 col-sm-6">City State Zip </div>
            <div class="col-12 col-sm-6"><input type="text" class="form-control w-100" name="factoring_state"
                    value="<?php if (isset($factoring_state)){echo $factoring_state;} ?>" /></div>
        </div>
        <div class="col-6 col-sm-4 panel-content-secondary">
            <div class="col-12 col-sm-6">email: </div>
            <div class="col-12 col-sm-6"><input type="email" class="form-control w-100" name="factoring_email"
                    value="<?php if (isset($factoring_email)){echo $factoring_email;}  ?>"></div>
        </div>
    </div>
    <!-- Last line -->
    <div class="row panel-content-primary card">
        <div class="col-3 col-sm-3 col-md-3 text-center mt-2">Percentage:</div>
        <div class="col-3 col-sm-3 col-md-3 text-center mt-2"><input type="float" style="width:100%" name="percentage"
                min="0" max="100" value="<?php if (isset($percentage)){echo $percentage;}else {echo 5;} ?>"" required/></div>
            
                                <div class=" col-6 col-sm-6 col-md-6 text-center mt-2"><button type="submit"
                name="submit" class="btn btn-primary" style="width:100%" onclick="validateForm()">Save
                Carrier</button>
        </div>
    </div>