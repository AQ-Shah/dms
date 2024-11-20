<div id="move-popup" class="popup">
    <div class="popup-content">
        <h2>Changing Location</h2>
        <form class="move-popup-form popup-form" action="" method="post">
            <label for="location">New Location:</label>
            <input type="text" id="location" name="location" placeholder="If changing to new location.."><br><br>
            <input type="hidden" id="truck-id-for-move" name="truck-id-for-move" value="">
            <input type="hidden" name="prev_url" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <button type="submit" name="submit" onclick="hideMovePopup()">Save</button>
            <button type="button" onclick="hideMovePopup()">Cancel</button>
        </form>
    </div>
</div>

<script>
//for carrier move change popup

function showMovePopup(truckId) {
    
    var currentLocation = ""; 

    // Populate the form fields with the current move
    document.getElementById("truck-id-for-move").value = truckId;
    document.getElementById("location").value = currentLocation;

    var formAction = "update_truck_location.php";

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