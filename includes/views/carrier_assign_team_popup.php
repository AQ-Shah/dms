<?php
if (check_access("carrier_assign_dispatcher")) {
$record_set = find_teams_by_department_id("5");
} 
?>
<div id="assign-team-popup" class="popup">
    <div class="popup-content">
        <h2>Assign Dispatcher</h2>
        <form class="assign-team-popup-form popup-form" action="" method="post">
            <label for="team-id">Dispatch Teams:</label>
            <select name="team-id" id="team-id">

                <?php while($record = mysqli_fetch_assoc($record_set)) { ?>
                <option value="<?php echo htmlentities($record["id"]); ?>">
                    <?php echo htmlentities($record["name"]); ?> </option>
                <?php } ?>

            </select><br>
            <input type="hidden" id="carrier-id" name="carrier-id" value="">
            <input type="hidden" name="prev_url" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <button type="submit" name="submit" onclick="hideAssignTeamPopup()">Assign</button>
            <button type="button" onclick="hideAssignTeamPopup()">Cancel</button>
        </form>
    </div>
</div>

<script>
//for dispatch popup

function showDAssignTeamPopup(carrierId) {
    // Populate the form fields with default values
    document.getElementById("carrier-id").value = carrierId;
    document.getElementById("team-id").value = "";

    var formAction = "carrier_assign_team";

    // set the form action to the constructed URL
    document.querySelector(".assign-team-popup-form").action = formAction;
    // Show the popup
    var popup = document.getElementById("assign-team-popup");
    popup.style.display = "flex";
}

function hideAssignTeamPopup() {
    var popup = document.getElementById("assign-team-popup");
    popup.style.display = "none";
}
</script>