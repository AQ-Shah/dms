<div id="carrier-truck-status-popup" class="popup">
    <div class="popup-content">
        <h2>Change Status</h2>
        <form class="carrier-truck-status-popup-form popup-form" action="" method="post">
            <label for="carrier_truck_status">Change Truck Status:</label>
            <select id="carrier_truck_status" name="carrier_truck_status">
                <option value="1">Available</option>
                <option value="3">Temporary Unavailable</option>
                <?php if (check_access("removing_truck")) { ?>
                <option value="4">Not working anymore</option>
                <?php } ?>
            </select><br>
            <input type="hidden" id="truck-id-for-truck-status" name="truck-id-for-truck-status" value="">
            <input type="hidden" name="prev_url" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <label for="reason">Reason:</label>
            <input type="text" id="reason" name="reason" placeholder="If changing to unavailable.."><br><br>
            <button type="submit" name="submit" onclick="hideTruckStatusPopup()">Save</button>
            <button type="button" onclick="hideTruckStatusPopup()">Cancel</button>
        </form>
    </div>
</div>

<script>
//for carrier status change popup

function showTruckStatusPopup(truckId,currentStatus ) {
    // Get the current status for the carrier with the given ID
    // You'll need to replace this with your own code to fetch the status from your database
   

    // Populate the form fields with the current status
    document.getElementById("truck-id-for-truck-status").value = truckId;
    document.getElementById("carrier_truck_status").value = currentStatus;

    var formAction = "update_carrier_truck_status.php";

    // set the form action to the constructed URL
    document.querySelector(".carrier-truck-status-popup-form").action = formAction;
    // Show the popup
    var popup = document.getElementById("carrier-truck-status-popup");
    popup.style.display = "flex";
}

function hideTruckStatusPopup() {
    var popup = document.getElementById("carrier-truck-status-popup");
    popup.style.display = "none";
}
</script>