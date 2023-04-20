<div id="status-popup" class="popup">
    <div class="popup-content">
        <h2>Change Status</h2>
        <form class="status-popup-form popup-form" action="" method="post">
            <label for="carrier-status">Status:</label>
            <select id="carrier-status" name="carrier-status">
                <option value="available">Available</option>
                <option value="unavailable">Unavailable</option>
            </select><br>
            <input type="hidden" id="carrier-id" name="carrier_id" value="">
            <input type="hidden" name="prev_url" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <label for="reason">Reason:</label>
            <input type="text" id="reason" name="reason" placeholder="If changing to unavailable.."><br><br>
            <button type="submit" name="submit" onclick="hideStatusPopup()">Save</button>
            <button type="button" onclick="hideStatusPopup()">Cancel</button>
        </form>
    </div>
</div>

<script>
//for carrier status change popup

function showStatusPopup(carrierId) {
    // Get the current status for the carrier with the given ID
    // You'll need to replace this with your own code to fetch the status from your database
    var currentStatus = "available"; // replace this with your query result

    // Populate the form fields with the current status
    document.getElementById("carrier-id").value = carrierId;
    document.getElementById("carrier-status").value = currentStatus;

    var formAction = "update_carrier_status.php?id=" + carrierId;

    // set the form action to the constructed URL
    document.querySelector(".status-popup-form").action = formAction;
    // Show the popup
    var popup = document.getElementById("status-popup");
    popup.style.display = "flex";
}

function hideStatusPopup() {
    var popup = document.getElementById("status-popup");
    popup.style.display = "none";
}
</script>