<div id="truck-dispatch-popup" class="popup">
    <form class="truck-dispatch-popup-form popup-form" action="" method="post">
        <div class="row popup-content-wide">
            <div class="col-12 panel-content-secondary">
                <h2>Dispatch Truck</h2>
            </div>
            <br>
            <div class="col-6">
                <label for="rate">Rate:</label>
                <input type="number" id="rate" name="rate">
            </div>
            <div class="col-6">
                <label for="rate">Loaded Miles:</label>
                <input type="number" id="miles" name="miles">
            </div>
            <div class="col-6">
                <label for="current_location">Dispatching From:</label>
                <input type="text" id="current_location" name="current_location" placeholder="if not from current location">
            </div>
            <div class="col-6">
                <label for="dispatch_location">Dispatching To:</label>
                <input type="text" id="dispatch_location" name="dispatch_location">
            </div>
            <div class="col-6">
                <label for="pickup_datetime">Estimated Pickup Time:</label>
                <input type="datetime-local" id="pickup_datetime" name="pickup_datetime">
            </div>
            <div class="col-6">
                <label for="delivery_datetime">Estimated Delivery Time:</label>
                <input type="datetime-local" id="delivery_datetime" name="delivery_datetime">
            </div>

            <input type="hidden" id="carrier-id" name="carrier-id" value="">
            <input type="hidden" id="truck-id" name="truck-id" value="">
            <input type="hidden" name="prev_url" value="<?php echo $_SERVER['REQUEST_URI']; ?>">

            <div class="col-6">
                <button type="button" class="background:red" onclick="hideTruckDispatchPopup()">Cancel</button>
            </div>

            <div class="col-6">
                <button type="submit" name="submit" onclick="hideTruckDispatchPopup()">Dispatch</button>
            </div>
        </div>
    </form>
</div>

<script>
//for dispatch popup

function showTruckDispatchPopup(carrierId, carrierTruckId) {
    // Populate the form fields with default values
    document.getElementById("carrier-id").value = carrierId;
    document.getElementById("truck-id").value = carrierTruckId;

    var formAction = "dispatch_carrier?id=" + carrierId;

    // set the form action to the constructed URL
    document.querySelector(".truck-dispatch-popup-form").action = formAction;
    // Show the popup
    var popup = document.getElementById("truck-dispatch-popup");
    popup.style.display = "flex";
}

function hideTruckDispatchPopup() {
    var popup = document.getElementById("truck-dispatch-popup");
    popup.style.display = "none";
}


</script>
