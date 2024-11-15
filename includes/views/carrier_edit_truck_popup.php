<div id="carrier-truck-edit-popup" class="popup">
    <form class="carrier-truck-edit-popup-form popup-form" action="" method="post">
        <div class="row popup-content-wide">
            <label>Truck & Driver Info:</label>

            <div class="col-12 panel-content-secondary">
                <div class="col-6"> <label>Driver Name *</label>
                    <input type="text" class="form-control w-100" id="d_name" name="d_name" value="">
                </div>
                <div class="col-6 mx-2"><label>Driver Number *</label><input type="tel" maxlength="17"
                        class="form-control w-100" id="d_number" name="d_number" value="">
                </div>

            </div>

            <div class="col-12 col-lg-6 panel-content-secondary">
                <div class="col-12 col-lg-6">Truck Type * :</div>
                <div class="col-6">
                    <select name="truck_type" class="form-control w-100"  id="truck_type" required>
                        <option value="">Select truck type</option>
                        <option value="Sprinter Van">Sprinter Van
                        </option>
                        <option value="Box Truck">Box Truck
                        </option>
                        <option value="Dry Van">
                            Dry Van</option>
                        <option value="Reefer">
                            Reefer</option>
                        <option value="Power Only">Power Only
                        </option>
                        <option value="Hot Shot">
                            Hot Shot</option>
                        <option value="Flat Bed">
                            Flat Bed</option>
                        <option value="Step Deck">
                            Step Deck</option>
                        <option value="RGN">
                            RGN</option>
                    </select>
                </div>
            </div>

            <div class="col-12 col-lg-6 panel-content-secondary">
                <div class="col-12 col-lg-6">Plate Number :</div>
                <div class="col-12 col-lg-6"><input type="text" class="form-control w-100" name="truck_no"  id="truck_no"value="" />
                </div>
            </div>
            <div class="col-12 col-lg-6 panel-content-secondary">
                <div class="col-12 col-lg-6">Trailer Number : </div>
                <div class="col-12 col-lg-6"><input type="text" class="form-control w-100" name="trailer_no" id="trailer_no" value="">
                </div>
            </div>
            <div class="col-12 col-lg-6 panel-content-secondary">
                <div class="col-12 col-lg-6">VIN Number : </div>
                <div class="col-12 col-lg-6"><input type="text" class="form-control w-100" name="vin_no" id="vin_no"value=""></div>
            </div>
            <div class="col-12 col-lg-6 panel-content-secondary">
                <div class="col-12 col-lg-6">Truck Length (ft) :</div>
                <div class="col-12 col-lg-6"><input type="number" class="form-control w-100" name="t_length" id="t_length" value="" />
                </div>
            </div>
            <div class="col-12 col-lg-6 panel-content-secondary">
                <div class="col-12 col-lg-6">Weight Limit (lbs) : </div>
                <div class="col-12 col-lg-6"><input type="number" class="form-control w-100" name="t_weight" id="t_weight"value="">
                </div>
            </div>

            <div class="col-lg-12 panel-content-secondary">
                <div class="col-lg-3">
                    <div class="form-check form-check-inline">
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="hazmat" id="hazmat">
                            <span class="custom-control-label ml-2" for="hazmat">HAZMAT</span>
                        </label>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-check form-check-inline">
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="twic" id="twic">
                            <span class="custom-control-label ml-2" for="twic">TWIC</span>
                        </label>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-check form-check-inline">
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="sida" id="sida">
                            <span class="custom-control-label ml-2" for="sida">SIDA</span>
                        </label>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-check form-check-inline">
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="atp" id="atp">
                            <span class="custom-control-label ml-2" for="atp">Alcohol Transport Permit </span>
                        </label>
                    </div>
                </div>
            </div>

            <input type="hidden" id="carrier-id-for-truck-to-be-edited" name="carrier-id-for-truck-to-be-edited"
                value="">
            <input type="hidden" name="prev_url" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <button type="submit" name="submit" onclick="hideEditTruckPopup()">Save</button>
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
    document.getElementById("carrier-id-for-truck-to-be-edited").value = truckId;

    var formAction = "carrier_truck_edit";

    var apiRqForTruckbyID = new XMLHttpRequest();
    apiRqForTruckbyID.open("GET", "api_find_truck_by_id.php?id=" + truckId);
    apiRqForTruckbyID.onload = function () {
        // Parse the API response
        var truck_info = JSON.parse(apiRqForTruckbyID.responseText);

        // Ensure truck_info is an array and has at least one element
        if (truck_info.length > 0) {
            // Access the first truck in the array
            var truck = truck_info[0];
            
            // Populate the form fields with values
            document.getElementById("d_name").value = truck.d_name;
            document.getElementById("d_number").value = truck.d_number;
            document.getElementById("truck_type").value = truck.truck_type;
            document.getElementById("truck_no").value = truck.truck_no;
            document.getElementById("trailer_no").value = truck.trailer_no;
            document.getElementById("t_length").value = truck.t_length; // Add for truck length
            document.getElementById("t_weight").value = truck.t_weight;
            document.getElementById("vin_no").value = truck.vin_no; // Add for VIN number
            document.getElementById("note").value = truck.note;

            // Check checkboxes based on the truck info
            document.getElementById("hazmat").checked = truck.hazmat == "1";
            document.getElementById("twic").checked = truck.twic == "1";
            document.getElementById("sida").checked = truck.sida == "1";
            document.getElementById("atp").checked = truck.atp == "1";
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