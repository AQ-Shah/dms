<div class="row card">

    <div class="col-12 panel-title mb-3">
        <h2>Truck & Driver Info</h2>
    </div>

    <div class="col-lg-6 panel-content-secondary">
        <label for="d_name">Driver Name:</label>
        <input type="text" id="d_name" class="form-control" name="d_name" 
               value="<?php if (isset($d_name)){echo $d_name;} ?>">
    </div>

    <div class="col-lg-6 panel-content-secondary">
        <label for="d_number">Driver Number:</label>
        <input type="tel" id="d_number" pattern="[0-9]{10}" minlength="10" maxlength="10" 
               class="form-control" name="d_number" value="<?php if (isset($d_number)){echo $d_number;} ?>">
    </div>

    <div class="col-lg-6 panel-content-secondary">
        <label for="truck_type">Truck Type: *</label>
        <select name="truck_type" id="truck_type" class="form-control" required>
            <option value="">Select truck type</option>
            <option value="Box Truck" <?php if (isset($truck_type) && $truck_type == "Box Truck") echo 'selected'; ?>>
                Box Truck</option>
            <option value="Dry Van" <?php if (isset($truck_type) && $truck_type == "Dry Van") echo 'selected'; ?>>
                Dry Van</option>
            <option value="Reefer" <?php if (isset($truck_type) && $truck_type == "Reefer") echo 'selected'; ?>>
                Reefer</option>
            <option value="Power Only" <?php if (isset($truck_type) && $truck_type == "Power Only") echo 'selected'; ?>>
                Power Only</option>
            <option value="Flat Bed" <?php if (isset($truck_type) && $truck_type == "Flat Bed") echo 'selected'; ?>>
                Flat Bed</option>
            <option value="Hot Shot" <?php if (isset($truck_type) && $truck_type == "Hot Shot") echo 'selected'; ?>>
                Hot Shot</option>
        </select>
    </div>

    <div class="col-lg-6 panel-content-secondary">
        <label for="truck_no">Truck Number:</label>
        <input type="number" id="truck_no" class="form-control" name="truck_no" 
               value="<?php if (isset($truck_no)){echo $truck_no;} ?>">
    </div>

    <div class="col-lg-6 panel-content-secondary">
        <label for="trailer_no">Trailer Number:</label>
        <input type="number" id="trailer_no" class="form-control" name="trailer_no" 
               value="<?php if (isset($trailer_no)){echo $trailer_no;} ?>">
    </div>

    <div class="col-lg-6 panel-content-secondary">
        <label for="t_length">Truck Length (ft):</label>
        <input type="number" id="t_length" class="form-control" name="t_length" 
               value="<?php if (isset($t_length)){echo $t_length;} ?>">
    </div>

    <div class="col-lg-6 panel-content-secondary">
        <label for="t_weight">Weight Limit (lbs):</label>
        <input type="number" id="t_weight" class="form-control" name="t_weight" 
               value="<?php if (isset($t_weight)){echo $t_weight;} ?>">
    </div>

    <!-- Checkboxes with inline display -->
    <div class="col-lg-12 panel-content-secondary">
        <div class="form-check form-check-inline">
            <input type="checkbox" id="hazmat" class="custom-control-input" name="hazmat" 
                   <?php if (isset($hazmat) && $hazmat != 0) echo 'checked'; ?>>
            <label class="custom-control-label" for="hazmat">HAZMAT</label>
        </div>
        <div class="form-check form-check-inline">
            <input type="checkbox" id="twic" class="custom-control-input" name="twic" 
                   <?php if (isset($twic) && $twic != 0) echo 'checked'; ?>>
            <label class="custom-control-label" for="twic">TWIC</label>
        </div>
        <div class="form-check form-check-inline">
            <input type="checkbox" id="sida" class="custom-control-input" name="sida" 
                   <?php if (isset($sida) && $sida != 0) echo 'checked'; ?>>
            <label class="custom-control-label" for="sida">SIDA</label>
        </div>
        <div class="form-check form-check-inline">
            <input type="checkbox" id="atp" class="custom-control-input" name="atp" 
                   <?php if (isset($atp) && $atp != 0) echo 'checked'; ?>>
            <label class="custom-control-label" for="atp">Alcohol Transport Permit</label>
        </div>
    </div>

    <!-- Submit button -->
    <div class="col-12 text-center">
        <button type="submit" name="submit" class="btn btn-primary" onclick="validateForm()">Save Truck Info</button>
    </div>
</div>