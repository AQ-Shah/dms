<div id="truck-edit-popup" class="popup">
    <form class="truck-edit-popup-form popup-form" action="" method="post">
        <div class="row popup-content">
            <div class="col-12 panel-content-secondary">
                <h2>Edit Truck/Driver Info</h2>
            </div>
            <br>
            <div class="col-12">
                <label for="carrier-truck-id-edit">Select :</label>
                <select name="carrier-truck-id-edit" id="carrier-truck-id-edit">
                </select>
            </div>
            <input type="hidden" id="carrier-id-for-truck-edit-popup" name="carrier-id-for-truck-edit-popup" value="">
            <input type="hidden" name="prev_url" value="<?php echo $_SERVER['REQUEST_URI']; ?>">

            <div class="col-6">
                <button type="button" class="background:red" onclick="hideTruckEditViewPopup()">Cancel</button>
            </div>

            <div class="col-6">
                <button type="button" onclick="showEditTruckPopup(document.getElementById('carrier-truck-id-edit').value)">Edit
                Truck</button>
            </div>
        </div>
    </form>
</div>

<script>
//for dispatch popup

function showEditTruckViewPopup(carrierId) {
    // Populate the form fields with default values
    document.getElementById("carrier-id-for-truck-edit-popup").value = carrierId;

    var formAction = "update_carrier_truck";

    var apiRqforEditTruck = new XMLHttpRequest();
    apiRqforEditTruck.open("GET", "api_find_trucks_by_carrier_id.php?id=" + carrierId);
    apiRqforEditTruck.onload = function() {
        // Get the results of the AJAX request
        var trucks = JSON.parse(apiRqforEditTruck.responseText);

        // Populate the select element with the list of trucks
        var select = document.getElementById("carrier-truck-id-edit");
        select.innerHTML = "";
        for (var i = 0; i < trucks.length; i++) {
            var option = document.createElement("option");
            option.value = trucks[i].id;
            option.text = trucks[i].d_name;
            select.appendChild(option);
        }
    };
    apiRqforEditTruck.send();

    // set the form action to the constructed URL
    document.querySelector(".truck-edit-popup-form").action = formAction;
    // Show the popup
    var popup = document.getElementById("truck-edit-popup");
    popup.style.display = "flex";
}

function hideTruckEditViewPopup() {
    var popup = document.getElementById("truck-edit-popup");
    popup.style.display = "none";
}


</script>