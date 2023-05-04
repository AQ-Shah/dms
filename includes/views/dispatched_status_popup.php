<div id="dispatched-status-popup" class="popup">
    <div class="popup-content">
        <h2>Change Status</h2>
        <form class="dispatched-status-popup-form popup-form" action="" method="post">
            <label for="dispatched-status">Dispatched Status:</label>
            <select id="dispatched-status" name="dispatched-status">
                <option value="Dispatched">Dispatched</option>
                <option value="Cancelled">Cancelled</option>
            </select><br>
            <input type="hidden" id="carrier-id" name="carrier-id" value="">
            <input type="hidden" id="dispatch-id" name="dispatch-id" value="">
            <input type="hidden" name="prev_url" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <button type="submit" name="submit" onclick="hideDispatchedStatusPopup()">Save</button>
            <button type="button" onclick="hideDispatchedStatusPopup()">Cancel</button>
        </form>
    </div>
</div>

<script>
//for carrier status change popup

function showDispatchedStatusPopup(dispatchedId, carrierId) {
    // Get the current status for the carrier with the given ID
    // You'll need to replace this with your own code to fetch the status from your database
    var currentStatus = "Dispatched";

    // Populate the form fields with the current status
    document.getElementById("carrier-id").value = carrierId;
    document.getElementById("dispatch-id").value = dispatchedId;
    document.getElementById("dispatched-status").value = currentStatus;

    var formAction = "update_dispatched_status.php";

    // set the form action to the constructed URL
    document.querySelector(".dispatched-status-popup-form").action = formAction;
    // Show the popup
    var popup = document.getElementById("dispatched-status-popup");
    popup.style.display = "flex";
}

function hideDispatchedStatusPopup() {
    var popup = document.getElementById("dispatched-status-popup");
    popup.style.display = "none";
}
</script>