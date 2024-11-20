<?php
if (check_access("carrier_assign_dispatcher") && not_executive($user["permission"])) {
$record_set = find_all_users_by_team($user["team_id"]);
} 
if (!not_executive($user["permission"])) {
    $record_set = find_all_active_dispatchers();
}
?>
<div id="revoke-dispatcher-popup" class="popup">
    <form class="revoke-dispatcher-popup-form popup-form" action="" method="post">
        <div class="row popup-content">
            <h2>Revoke Dispatcher</h2>
            <label for="dispatcher">Dispatcher:</label>
            <select name="dispatcher" id="revoke-dispatcher">
            </select><br>
            <input type="hidden" id="cid-for-rd" name="carrierId" value="">
            <input type="hidden" name="prev_url" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <button type="submit" name="submit" onclick="hideRevokeDispatcherPopup()">Revoke</button>
            <button type="button" onclick="hideRevokeDispatcherPopup()">Cancel</button>
        </div>
    </form>
</div>

<script>
//for dispatch popup

function showRevokeDispatcherPopup(carrierId) {
    // Populate the form fields with default values
    document.getElementById("cid-for-rd").value = carrierId;
    document.getElementById("revoke-dispatcher").value = "";

    var formAction = "carrier_revoke_dispatcher";

    var apiRqforRevokeDispatcher = new XMLHttpRequest();
    apiRqforRevokeDispatcher.open("GET", "api_find_dispatchers_by_id.php?id=" + carrierId);
    apiRqforRevokeDispatcher.onload = function() {
        // Get the results of the AJAX request
        var currentDispatchers = JSON.parse(apiRqforRevokeDispatcher.responseText);

        // Populate the select element with the list of currentDispatchers
        var select = document.getElementById("revoke-dispatcher");
        select.innerHTML = "";
        for (var i = 0; i < currentDispatchers.length; i++) {
            var option = document.createElement("option");
            option.value = currentDispatchers[i].id;
            option.text = currentDispatchers[i].full_name;
            select.appendChild(option);
        }
    };
    apiRqforRevokeDispatcher.send();

    // set the form action to the constructed URL
    document.querySelector(".revoke-dispatcher-popup-form").action = formAction;
    // Show the popup
    var popup = document.getElementById("revoke-dispatcher-popup");
    popup.style.display = "flex";

    //hiding the main action popup
    var popup = document.getElementById("carrier-action-popup");
    popup.style.display = "none";
}

function hideRevokeDispatcherPopup() {
    var popup = document.getElementById("revoke-dispatcher-popup");
    popup.style.display = "none";

    var popup = document.getElementById("carrier-action-popup");
    popup.style.display = "flex";
}
</script>