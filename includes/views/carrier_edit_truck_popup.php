<div id="carrier-truck-edit-popup" class="popup">
    <form class="carrier-truck-edit-popup-form popup-form" action="" method="post">
        <div class="row popup-content-wide">
            <label>Truck & Driver Info:</label>

            <div class="col-12 panel-content-secondary">
                <div class="col-6"> <label>Driver Name *</label>
                    <input type="text" class="form-control w-100" id="t_d_name_edit" name="t_d_name_edit" value="">
                </div>
                <div class="col-6 mx-2"><label>Driver Number *</label><input type="tel" maxlength="17" class="form-control w-100" name="d_number"
                        value="<?php if (isset($d_number)){echo $d_number;}  ?>">
                </div>
               
            </div>

            <div class="col-12 col-lg-6 panel-content-secondary">
            <div class="col-12 col-lg-6">Truck Type * :</div>
                <div class="col-6">
                    <select name="truck_type_edit" class="form-control w-100" required>
                        <option value="">Select truck type</option>
                        <option value="Sprinter Van"
                            <?php if (isset($truck_type) && $truck_type == "Sprinter Van") echo 'selected'; ?>>Sprinter Van
                        </option>
                        <option value="Box Truck"
                            <?php if (isset($truck_type) && $truck_type == "Box Truck") echo 'selected'; ?>>Box Truck
                        </option>
                        <option value="Dry Van"
                            <?php if (isset($truck_type) && $truck_type == "Dry Van") echo 'selected'; ?>>
                            Dry Van</option>
                        <option value="Reefer"
                            <?php if (isset($truck_type) && $truck_type == "Reefer") echo 'selected'; ?>>
                            Reefer</option>
                        <option value="Power Only"
                            <?php if (isset($truck_type) && $truck_type == "Power Only") echo 'selected'; ?>>Power Only
                        </option>
                        <option value="Hot Shot"
                            <?php if (isset($truck_type) && $truck_type == "Hot Shot") echo 'selected'; ?>>
                            Hot Shot</option>
                        <option value="Flat Bed"
                            <?php if (isset($truck_type) && $truck_type == "Flat Bed") echo 'selected'; ?>>
                            Flat Bed</option>
                        <option value="Step Deck"
                            <?php if (isset($truck_type) && $truck_type == "Step Deck") echo 'selected'; ?>>
                            Step Deck</option>
                        <option value="RGN" <?php if (isset($truck_type) && $truck_type == "RGN") echo 'selected'; ?>>
                            RGN</option>
                    </select>
                </div>
            </div>

            <div class="col-12 col-lg-6 panel-content-secondary">
                <div class="col-12 col-lg-6">Plate Number :</div>
                <div class="col-12 col-lg-6"><input type="text" class="form-control w-100" name="truck_no"
                        value="<?php if (isset($truck_no)){echo $truck_no;} ?>" /></div>
            </div>
            <div class="col-12 col-lg-6 panel-content-secondary">
                <div class="col-12 col-lg-6">Trailer Number : </div>
                <div class="col-12 col-lg-6"><input type="text" class="form-control w-100" name="trailer_no"
                        value="<?php if (isset($trailer_no)){echo $trailer_no;}  ?>"></div>
            </div>
            <div class="col-12 col-lg-6 panel-content-secondary">
                <div class="col-12 col-lg-6">VIN Number : </div>
                <div class="col-12 col-lg-6"><input type="text" class="form-control w-100" name="vin_no"
                        value="<?php if (isset($vin_no)){echo $vin_no;}  ?>"></div>
            </div>
            <div class="col-12 col-lg-6 panel-content-secondary">
                <div class="col-12 col-lg-6">Truck Length (ft) :</div>
                <div class="col-12 col-lg-6"><input type="number" class="form-control w-100" name="t_length"
                        value="<?php if (isset($t_length)){echo $t_length;} ?>" /></div>
            </div>
            <div class="col-12 col-lg-6 panel-content-secondary">
                <div class="col-12 col-lg-6">Weight Limit (lbs) : </div>
                <div class="col-12 col-lg-6"><input type="number" class="form-control w-100" name="t_weight"
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

            <input type="hidden" id="trucks-carrier-id" name="trucks-carrier-id" value="">
            <input type="hidden" name="prev_url" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <button type="submit" name="submit"  onclick="hideEditTruckPopup()">Save</button>
            <button type="button" onclick="hideEditTruckPopup()">Cancel</button>
        </div>
    </form>
</div>

<script>
//for carrier move change popup

function showEditTruckPopup(truckId) {
    // Get the current move for the carrier with the given ID
    // You'll need to replace this with your own code to fetch the move from your database


    // Populate the form fields with the current move
    document.getElementById("trucks-carrier-id").value = truckId;

    var formAction = "carrier_truck_edit";

    var apiRqForTruckbyID = new XMLHttpRequest();
    apiRqForTruckbyID.open("GET", "api_find_truck_by_id.php?id=" + truckId);
    apiRqForTruckbyID.onload = function() {
        // Parse the API response
        var truck_info = JSON.parse(apiRqForTruckbyID.responseText);

        // Ensure truck_info is an array and has at least one element
        if (truck_info.length > 0) {
            // Access the first truck in the array
            var truck = truck_info[0];

            // Populate the form field with the 'd_name' value
            document.getElementById("t_d_name_edit").value = truck.d_name;
        }
    };
    apiRqForTruckbyID.send();


    // set the form action to the constructed URL
    document.querySelector(".carrier-truck-edit-popup-form").action = formAction;
    // Show the popup
    var popup = document.getElementById("carrier-truck-edit-popup");
    popup.style.display = "flex";

    var popupPrevious = document.getElementById("truck-edit-popup");
    popupPrevious.style.display = "none";
}

function hideEditTruckPopup() {
    var popup = document.getElementById("carrier-truck-edit-popup");
    popup.style.display = "none";
}
</script>