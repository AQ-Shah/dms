<div id="dispatch-popup" class="popup">
    <div class="dispatch-popup-content">
        <h2>Dispatch Carrier</h2>
        <form class="dispatch-popup-form" action="" method="post">
            <label for="location">Location:</label>
            <input type="text" id="location" name="location"><br>
            <label for="date">Estimated Date:</label>
            <input type="date" id="date" name="date"><br>
            <label for="time">Estimated Time:</label>
            <input type="time" id="time" name="time"><br>
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
    document.getElementById("location").value = "";
    document.getElementById("date").value = "";
    document.getElementById("time").value = "";
    document.getElementById("rate").value = "";

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