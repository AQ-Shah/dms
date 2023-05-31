<?php
if (check_access("carrier_assign_dispatcher")) {
$record_set = find_all_users_by_team($user["team_id"]);
} 
?>
<div id="assign-dispatcher-popup" class="popup">
    <div class="popup-content">
        <h2>Assign Dispatcher</h2>
        <form class="assign-dispatcher-popup-form popup-form" action="" method="post">
            <label for="dispatcher">Dispatcher:</label>
            <select name="dispatcher" id="dispatcher">

                <?php while($record = mysqli_fetch_assoc($record_set)) { ?>
                <option value="<?php echo htmlentities($record["id"]); ?>">
                    <?php echo htmlentities($record["full_name"]); ?> </option>
                <?php } ?>

            </select><br>
            <input type="hidden" id="carrier-id" name="carrier_id" value="">
            <input type="hidden" name="prev_url" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <button type="submit" name="submit" onclick="hideAssignDispatcherPopup()">Assign</button>
            <button type="button" onclick="hideAssignDispatcherPopup()">Cancel</button>
        </form>
    </div>
</div>

<script>
//for dispatch popup

function showDAssignDispatcherPopup(carrierId) {
    // Populate the form fields with default values
    document.getElementById("carrier-id").value = carrierId;
    document.getElementById("dispatcher").value = "";

    var formAction = "carrier_assign_dispatcher?carrierId=" + carrierId;

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