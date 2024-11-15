<div id="dispatch-popup" class="popup">

    <form class="dispatch-popup-form popup-form" action="" method="post">

        <div class="row popup-content-wide">
            <div class="col-12 panel-content-secondary">
                <h2>Dispatch Carrier</h2>
            </div><br>
            <div class="col-6">
                <label for="truck-id">Truck & Driver:</label>
                <select name="truck-id" id="truck-id">
                </select>
            </div>
            <div class="col-6">
                <label for="rate">Rate:</label>
                <input type="number" id="rate" name="rate">
            </div>
            <div class="col-6">
                <label for="loaded_miles">Loaded Miles:</label>
                <input type="number" id="loaded_miles" name="loaded_miles">
            </div>
            <div class="col-6">
                <label for="deadheads">Deadheads:</label>
                <input type="number" id="deadheads" name="deadheads">
            </div>
            <div class="col-6">
                <label for="location">Dispatching From:</label>
                <input type="text" id="current_location" name="current_location"
                    placeholder="if not from current location">
            </div>
            <div class="col-6">
                <label for="location">Dispatching To:</label>
                <input type="text" id="dispatch_location" name="dispatch_location">
            </div>
            <div class="col-6">
                <label for="datetime">Estimated Pickup Time:</label>
                <input type="datetime-local" id="pickup_datetime" name="pickup_datetime">
            </div>
            <div class="col-6">
                <label for="datetime">Estimated Delivery Time:</label>
                <input type="datetime-local" id="delivery_datetime" name="delivery_datetime">
            </div>

            <input type="hidden" id="carrier-id" name="carrier-id" value="">
            <input type="hidden" name="prev_url" value="<?php echo $_SERVER['REQUEST_URI']; ?>">

            <div class="col-6">
                <button type="button" class="background:red" onclick="hideDispatchPopup()">Cancel</button>
            </div>

            <div class="col-6">
                <button type="submit" name="submit" onclick="hideDispatchPopup()">Dispatch</button>
            </div>

        </div>
    </form>
</div>

<script>
//for dispatch popup

function showDispatchPopup(carrierId) {
    // Populate the form fields with default values
    document.getElementById("carrier-id").value = carrierId;

    var formAction = "dispatch_carrier?id=" + carrierId;

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "api_find_trucks_by_carrier_id.php?id=" + carrierId);
    xhr.onload = function() {
        // Get the results of the AJAX request
        var trucks = JSON.parse(xhr.responseText);

        // Populate the select element with the list of trucks
        var select = document.getElementById("truck-id");
        select.innerHTML = "";
        for (var i = 0; i < trucks.length; i++) {
            var option = document.createElement("option");
            option.value = trucks[i].id;
            option.text = trucks[i].d_name;
            select.appendChild(option);
        }
    };
    xhr.send();

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