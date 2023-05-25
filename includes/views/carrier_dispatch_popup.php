<div id="dispatch-popup" class="popup">
    <div class="popup-content">
        <h2>Dispatch Carrier</h2>
        <form class="dispatch-popup-form popup-form" action="" method="post">
            <label for="location">Dispatching From:</label>
            <input type="text" id="current_location" name="current_location"
                placeholder="if not from current location"><br>
            <label for="location">Dispatching To:</label>
            <input type="text" id="dispatch_location" name="dispatch_location"><br>
            <label for="datetime">Estimated Pickup Time:</label>
            <input type="datetime-local" id="pickup_datetime" name="pickup_datetime"><br>
            <label for="datetime">Estimated Delivery Time:</label>
            <input type="datetime-local" id="delivery_datetime" name="delivery_datetime"><br>
            <label for="rate">Rate:</label>
            <input type="number" id="rate" name="rate"><br><br>
            <input type="hidden" id="carrier-id" name="carrier_id" value="">
            <input type="hidden" name="prev_url" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <button type="submit" name="submit" onclick="hideDispatchPopup()">Dispatch</button>
            <button type="button" onclick="hideDispatchPopup()">Cancel</button>
        </form>
    </div>
</div>

<script>
//for dispatch popup

function showDispatchPopup(carrierId) {
    // Populate the form fields with default values
    document.getElementById("carrier-id").value = carrierId;

    var formAction = "dispatch_carrier?id=" + carrierId;

    // set the form action to the constructed URL
    document.querySelector(".dispatch-popup-form").action = formAction;
    // Show the popup
    var popup = document.getElementById("dispatch-popup");
    popup.style.display = "flex";
}

function hideDispatchPopup() {
    var popup = document.getElementById("dispatch-popup");
    popup.style.display = "none";
}
</script>