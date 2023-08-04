<div id="carrier-action-popup" class="popup">
    <div class="row popup-content">
        <label> Actions:</label>

        <div class="row popup-form">
            <div class="col-6">
                <button type="button"
                    onclick="window.open('show_carrier?id=' + document.getElementById('carrier-id').value, '_blank')">View</button>
            </div>
            <?php if (check_access("carrier_update")) {?>
            <div class="col-6">
                <button type="button"
                    onclick="window.open('carrier_update?id=' + document.getElementById('carrier-id').value, '_blank')">Edit</button>
            </div>
            <?php } ?>
            <?php if (check_access("carrier_truck_create")) {?>
            <div class="col-6">
                <button type="button" onclick="showAddTruckPopup(document.getElementById('carrier-id').value)">Add
                    Truck</button>
            </div>
            <?php } ?>
            <?php if (check_access("update_carrier_status")) {?>
            <div class="col-6">
                <button type="button" onclick="showStatusPopup(document.getElementById('carrier-id').value)">Change
                    Status</button>
            </div>
            <?php } ?>
            <?php if (check_access("carrier_assign_team")) {?>
            <div class="col-6">
                <button type="button" onclick="showDAssignTeamPopup(document.getElementById('carrier-id').value)">Assign
                    Team</button>
            </div>
            <?php } ?>
            <?php if (check_access("carrier_assign_dispatcher")) {?>
            <div class="col-6">
                <button type="button"
                    onclick="showDAssignDispatcherPopup(document.getElementById('carrier-id').value)">Assign
                    User</button>
            </div>
            <?php } ?>
            <?php if (check_access("dispatch_carrier")) {?>
            <div class="col-12">
                <button type="button"
                    onclick="showDispatchPopup(document.getElementById('carrier-id').value)">Dispatch</button>
            </div>
            <?php } ?>
        </div>

        <input type="hidden" id="carrier-id" name="carrier-id" value="">
        <input type="hidden" name="prev_url" value="<?php echo $_SERVER['REQUEST_URI']; ?>">

        <button type="button" onclick="hideCarriersActionPopup()">Cancel</button>
    </div>

</div>

<script>
//for carrier move change popup

function showCarriersActionPopup(carrierId) {

    // Populate the form fields with the current move
    document.getElementById("carrier-id").value = carrierId;


    // Show the popup
    var popup = document.getElementById("carrier-action-popup");
    popup.style.display = "flex";
}

function hideCarriersActionPopup() {
    var popup = document.getElementById("carrier-action-popup");
    popup.style.display = "none";
}
</script>