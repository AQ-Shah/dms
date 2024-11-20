<?php
if (check_access("carrier_assign_dispatcher") && not_executive($user["permission"])) {
$record_set = find_all_users_by_team($user["team_id"]);
} 
if (!not_executive($user["permission"])) {
    $record_set = find_all_active_dispatchers();
}
?>
<div id="assign-dispatcher-popup" class="popup">
    <form class="assign-dispatcher-popup-form popup-form" action="" method="post">
        <div class="row popup-content-wide">
            <h2>Assign Dispatcher</h2>
            <label for="dispatcher">Dispatcher:</label>
            <select name="dispatcher" id="dispatcher">
                <option value="">Select Dispatcher*</option>
                <?php while($record = mysqli_fetch_assoc($record_set)) { ?>
                <option value="<?php echo htmlentities($record["id"]); ?>" >
                    <?php echo htmlentities($record["full_name"]); ?> </option>
                <?php } ?>

            </select><br>
            <input type="hidden" id="cid-for-ad" name="carrierId" value="">
            <input type="hidden" name="prev_url" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <button type="submit" name="submit" onclick="hideAssignDispatcherPopup()">Assign</button>
            <button type="button" onclick="hideAssignDispatcherPopup()">Cancel</button>
        </div>
    </form>
</div>

<script>
//for dispatch popup

function showDAssignDispatcherPopup(carrierId) {
    // Populate the form fields with default values
    document.getElementById("cid-for-ad").value = carrierId;
    document.getElementById("dispatcher").value = "";

    var formAction = "carrier_assign_dispatcher";

    // set the form action to the constructed URL
    document.querySelector(".assign-dispatcher-popup-form").action = formAction;
    // Show the popup
    var popup = document.getElementById("assign-dispatcher-popup");
    popup.style.display = "flex";
}

function hideAssignDispatcherPopup() {
    var popup = document.getElementById("assign-dispatcher-popup");
    popup.style.display = "none";
}
</script>