<div id="move-popup" class="popup">
    <div class="move-popup-content">
        <h2>Changing Location</h2>
        <form class="move-popup-form" action="" method="post">
            <label for="location">New Location:</label>
            <input type="text" id="location" name="location" placeholder="If changing to new location.."><br><br>
            <input type="hidden" id="carrier-id" name="carrier_id" value="">
            <input type="hidden" name="prev_url" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <button type="submit" name="submit" onclick="hideMovePopup()">Save</button>
            <button type="button" onclick="hideMovePopup()">Cancel</button>
        </form>
    </div>
</div>

<script>
//for carrier move change popup

function showMovePopup(carrierId) {
    // Get the current move for the carrier with the given ID
    // You'll need to replace this with your own code to fetch the move from your database
    var currentLocation = ""; // replace this with your query result

    // Populate the form fields with the current move
    document.getElementById("carrier-id").value = carrierId;
    document.getElementById("location").value = currentLocation;

    var formAction = "update_carrier_location.php?id=" + carrierId;

    // set the form action to the constructed URL
    document.querySelector(".move-popup-form").action = formAction;
    // Show the popup
    var popup = document.getElementById("move-popup");
    popup.style.display = "flex";
}

function hideMovePopup() {
    var popup = document.getElementById("move-popup");
    popup.style.display = "none";
}
</script>