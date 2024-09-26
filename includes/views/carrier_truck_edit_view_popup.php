<div id="truck-edit-popup" class="popup">
    <form class="truck-edit-popup-form popup-form" action="" method="post">
        <div class="row popup-content">
            <div class="col-12 panel-content-secondary">
                <h2>Edit Truck/Driver Info</h2>
            </div>
            <br>
            <div class="col-12">
                <label for="truck-id">Select :</label>
                <select name="truck-id" id="truck-id">
                </select>
            </div>
            <input type="hidden" id="carrier-id" name="carrier-id" value="">
            <input type="hidden" name="prev_url" value="<?php echo $_SERVER['REQUEST_URI']; ?>">

            <div class="col-6">
                <button type="button" class="background:red" onclick="hideTruckEditViewPopup()">Cancel</button>
            </div>

            <div class="col-6">
                <button type="button" onclick="showEditTruckPopup(document.getElementById('truck-id').value)">Edit
                Truck</button>
            </div>
        </div>
    </form>
</div>

<script>
//for dispatch popup

function showEditTruckViewPopup(carrierId) {
    // Populate the form fields with default values
    document.getElementById("carrier-id").value = carrierId;

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
