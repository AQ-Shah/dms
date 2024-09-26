<!-- Drivers Info -->
<div class="row panel-content-primary card"></div>

<!-- Truck and Driver Info -->
<div class="row panel-content-primary card">

    <div class="col-12 panel-title mb-3">
        <h2>Truck & Drivers Info</h2>
    </div>

    <div class="row col-12 mb-3">
        <div class="col-12 col-md-6">
            <label for="d_name">Driver Name:</label>
            <input type="text" class="form-control" id="d_name" name="d_name" value="<?php if (isset($d_name)){echo $d_name;} ?>">
        </div>
        <div class="col-12 col-md-6">
            <label for="d_number">Driver Number:</label>
            <input type="tel" pattern="[0-9]{10}" minlength="10" maxlength="10" class="form-control" id="d_number" name="d_number" value="<?php if (isset($d_number)){echo $d_number;} ?>">
        </div>
    </div>

    <div class="row col-12 mb-3">
        <div class="col-12 col-md-6">
            <label for="truck_type">Truck Type: *</label>
            <select name="truck_type" id="truck_type" class="form-control" required>
                <option value="">Select truck type</option>
                <option value="Box Truck" <?php if (isset($truck_type) && $truck_type == "Box Truck") echo 'selected'; ?>>Box Truck</option>
                <option value="Dry Van" <?php if (isset($truck_type) && $truck_type == "Dry Van") echo 'selected'; ?>>Dry Van</option>
                <option value="Reefer" <?php if (isset($truck_type) && $truck_type == "Reefer") echo 'selected'; ?>>Reefer</option>
                <option value="Power Only" <?php if (isset($truck_type) && $truck_type == "Power Only") echo 'selected'; ?>>Power Only</option>
                <option value="Flat Bed" <?php if (isset($truck_type) && $truck_type == "Flat Bed") echo 'selected'; ?>>Flat Bed</option>
                <option value="Hot Shot" <?php if (isset($truck_type) && $truck_type == "Hot Shot") echo 'selected'; ?>>Hot Shot</option>
            </select>
        </div>
        <div class="col-12 col-md-6">
            <label for="truck_no">Truck Number:</label>
            <input type="number" class="form-control" id="truck_no" name="truck_no" value="<?php if (isset($truck_no)){echo $truck_no;} ?>">
        </div>
    </div>

    <div class="row col-12 mb-3">
        <div class="col-12 col-md-6">
            <label for="trailer_no">Trailer Number:</label>
            <input type="number" class="form-control" id="trailer_no" name="trailer_no" value="<?php if (isset($trailer_no)){echo $trailer_no;} ?>">
        </div>
        <div class="col-12 col-md-6">
            <label for="t_length">Truck Length (ft):</label>
            <input type="number" class="form-control" id="t_length" name="t_length" value="<?php if (isset($t_length)){echo $t_length;} ?>">
        </div>
    </div>

    <div class="row col-12 mb-3">
        <div class="col-12 col-md-6">
            <label for="t_weight">Weight Limit (lbs):</label>
            <input type="number" class="form-control" id="t_weight" name="t_weight" value="<?php if (isset($t_weight)){echo $t_weight;} ?>">
        </div>
    </div>

    <div class="row col-12 mb-3">
        <div class="col-12 col-md-3">
            <label class="form-check-label" for="hazmat">
                <input type="checkbox" class="form-check-input" id="hazmat" name="hazmat" <?php if (isset($hazmat) && $hazmat != 0) echo 'checked'; ?>>
                HAZMAT
            </label>
        </div>
        <div class="col-12 col-md-3">
            <label class="form-check-label" for="twic">
                <input type="checkbox" class="form-check-input" id="twic" name="twic" <?php if (isset($twic) && $twic != 0) echo 'checked'; ?>>
                TWIC
            </label>
        </div>
        <div class="col-12 col-md-3">
            <label class="form-check-label" for="sida">
                <input type="checkbox" class="form-check-input" id="sida" name="sida" <?php if (isset($sida) && $sida != 0) echo 'checked'; ?>>
                SIDA
            </label>
        </div>
        <div class="col-12 col-md-3">
            <label class="form-check-label" for="atp">
                <input type="checkbox" class="form-check-input" id="atp" name="atp" <?php if (isset($atp) && $atp != 0) echo 'checked'; ?>>
                Alcohol Transport Permit
            </label>
        </div>
    </div>

    <!-- Save Button -->
    <div class="row col-12 mb-3 text-center">
        <button type="submit" name="submit" class="btn btn-primary" style="width:100%" onclick="validateForm()">Save Truck Info</button>
    </div>

</div>
