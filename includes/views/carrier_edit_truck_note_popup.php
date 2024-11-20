<div id="carrier-truck-note-edit-popup" class="popup">
    <form class="carrier-truck-note-edit-popup-form popup-form" action="" method="post">
        <div class="row popup-content-wide">
            <label>Edit Note:</label>

            <div class="col-12 panel-content-secondary">
                <textarea class="form-control" name="note" id="note" rows="4"></textarea>
            </div>
            <input type="hidden" id="carrier-id-for-truck-note-to-be-edited" name="carrier-id-for-truck-note-to-be-edited"
                value="">
            <input type="hidden" name="prev_url" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <button type="submit" name="submit" onclick="hideEditTruckNotePopup()">Save</button>
            <button type="button" onclick="hideEditTruckNotePopup()">Cancel</button>
        </div>
    </form>
</div>

<script>
    //for carrier move change popup

    function showEditTruckNotePopup(truckId) {
    // Get the current move for the carrier with the given ID
    // You'll need to replace this with your own code to fetch the move from your database

    // Populate the form fields with the current move
    document.getElementById("carrier-id-for-truck-note-to-be-edited").value = truckId;

    var formAction = "carrier_truck_edit_note";

    var apiRqForTruckbyID = new XMLHttpRequest();
    apiRqForTruckbyID.open("GET", "api_find_truck_by_id.php?id=" + truckId);
    apiRqForTruckbyID.onload = function () {
        // Parse the API response
        var truck_info = JSON.parse(apiRqForTruckbyID.responseText);

        // Ensure truck_info is an array and has at least one element
        if (truck_info.length > 0) {
            // Access the first truck in the array
            var truck = truck_info[0];
            document.getElementById("note").value = truck.note;
        }
    };
    apiRqForTruckbyID.send();

    // set the form action to the constructed URL
    document.querySelector(".carrier-truck-note-edit-popup-form").action = formAction;
    
    // Show the popup
    var popup = document.getElementById("carrier-truck-note-edit-popup");
    popup.style.display = "flex";

    var popupPrevious = document.getElementById("truck-edit-popup");
    popupPrevious.style.display = "none";
}


    function hideEditTruckNotePopup() {
        var popup = document.getElementById("carrier-truck-note-edit-popup");
        popup.style.display = "none";
    }
</script>