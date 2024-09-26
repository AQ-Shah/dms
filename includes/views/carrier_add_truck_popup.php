<div id="carrier-truck-add-popup" class="popup">
    <form class="carrier-truck-add-popup-form popup-form" action="" method="post">
        <div class="row popup-content-wide">

            <div class="col-12 mb-3">
                <label class="form-label">Truck & Driver Info:</label>
            </div>

            <div class="col-12 panel-content-secondary row">
                <div class="col-12 col-md-6 mb-3">
                    <label for="d_name">Driver Name *</label>
                    <input type="text" class="form-control" id="d_name" name="d_name" value="<?php if (isset($d_name)){echo $d_name;} ?>">
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <label for="d_number">Driver Number *</label>
                    <input type="tel" maxlength="17" class="form-control" id="d_number" name="d_number" value="<?php if (isset($d_number)){echo $d_number;} ?>">
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <label for="truck_type">Truck Type *</label>
                    <select name="truck_type" id="truck_type" class="form-control" required>
                        <option value="">Select truck type</option>
                        <option value="Sprinter Van" <?php if (isset($truck_type) && $truck_type == "Sprinter Van") echo 'selected'; ?>>Sprinter Van</option>
                        <option value="Box Truck" <?php if (isset($truck_type) && $truck_type == "Box Truck") echo 'selected'; ?>>Box Truck</option>
                        <option value="Dry Van" <?php if (isset($truck_type) && $truck_type == "Dry Van") echo 'selected'; ?>>Dry Van</option>
                        <option value="Reefer" <?php if (isset($truck_type) && $truck_type == "Reefer") echo 'selected'; ?>>Reefer</option>
                        <option value="Power Only" <?php if (isset($truck_type) && $truck_type == "Power Only") echo 'selected'; ?>>Power Only</option>
                        <option value="Hot Shot" <?php if (isset($truck_type) && $truck_type == "Hot Shot") echo 'selected'; ?>>Hot Shot</option>
                        <option value="Flat Bed" <?php if (isset($truck_type) && $truck_type == "Flat Bed") echo 'selected'; ?>>Flat Bed</option>
                        <option value="Step Deck" <?php if (isset($truck_type) && $truck_type == "Step Deck") echo 'selected'; ?>>Step Deck</option>
                        <option value="RGN" <?php if (isset($truck_type) && $truck_type == "RGN") echo 'selected'; ?>>RGN</option>
                    </select>
                </div>
            </div>

            <div class="col-12 panel-content-secondary row">
                <div class="col-12 col-md-6 mb-3">
                    <label for="truck_no">Plate Number :</label>
                    <input type="text" class="form-control" id="truck_no" name="truck_no" value="<?php if (isset($truck_no)){echo $truck_no;} ?>">
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <label for="trailer_no">Trailer Number :</label>
                    <input type="text" class="form-control" id="trailer_no" name="trailer_no" value="<?php if (isset($trailer_no)){echo $trailer_no;} ?>">
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <label for="vin_no">VIN Number :</label>
                    <input type="text" class="form-control" id="vin_no" name="vin_no" value="<?php if (isset($vin_no)){echo $vin_no;} ?>">
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <label for="t_length">Truck Length (ft) :</label>
                    <input type="number" class="form-control" id="t_length" name="t_length" value="<?php if (isset($t_length)){echo $t_length;} ?>">
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <label for="t_weight">Weight Limit (lbs) :</label>
                    <input type="number" class="form-control" id="t_weight" name="t_weight" value="<?php if (isset($t_weight)){echo $t_weight;} ?>">
                </div>
            </div>

            <!-- Checkboxes -->
            <div class="col-12 panel-content-secondary row mb-3">
                <div class="col-md-3">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="hazmat" <?php if (isset($hazmat) && $hazmat != 0) echo 'checked'; ?>>
                        HAZMAT
                    </label>
                </div>
                <div class="col-md-3">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="twic" <?php if (isset($twic) && $twic != 0) echo 'checked'; ?>>
                        TWIC
                    </label>
                </div>
                <div class="col-md-3">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="sida" <?php if (isset($sida) && $sida != 0) echo 'checked'; ?>>
                        SIDA
                    </label>
                </div>
                <div class="col-md-3">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="atp" <?php if (isset($atp) && $atp != 0) echo 'checked'; ?>>
                        Alcohol Transport Permit
                    </label>
                </div>
            </div>

            <!-- Hidden Inputs -->
            <input type="hidden" id="trucks-carrier-id" name="trucks-carrier-id" value="">
            <input type="hidden" name="prev_url" value="<?php echo $_SERVER['REQUEST_URI']; ?>">

            <!-- Buttons -->
            <div class="col-12 text-center">
                <button type="submit" name="submit" class="btn btn-primary" onclick="hideAddTruckPopup()">Save</button>
                <button type="button" class="btn btn-secondary" onclick="hideAddTruckPopup()">Cancel</button>
            </div>

        </div>
    </form>
</div>


<script>
//for carrier move change popup

function showAddTruckPopup(carrierId) {
    // Get the current move for the carrier with the given ID
    // You'll need to replace this with your own code to fetch the move from your database


    // Populate the form fields with the current move
    document.getElementById("trucks-carrier-id").value = carrierId;

    var formAction = "carrier_truck_create";

    // set the form action to the constructed URL
    document.querySelector(".carrier-truck-add-popup-form").action = formAction;
    // Show the popup
    var popup = document.getElementById("carrier-truck-add-popup");
    popup.style.display = "flex";
}

function hideAddTruckPopup() {
    var popup = document.getElementById("carrier-truck-add-popup");
    popup.style.display = "none";
}
</script>