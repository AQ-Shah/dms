<div id="department-team-create-popup" class="popup">
    <div class="row popup-content">
        <form class="department-team-create-popup-form popup-form" action="" method="post">


            <div>
                <label for="team_name">Team Name:</label>
                <input type="text" id="team_name" name="team_name">
            </div>

            <input type="hidden" id="department_id" name="department_id" value="">
            <input type="hidden" name="prev_url" value="<?php echo $_SERVER['REQUEST_URI']; ?>">

            <div class="form-actions">
                <button type="submit" name="submit" onclick="hideDepartmentTeamCreatePopup()">Create</button>
                <button type="button" onclick="hideDepartmentTeamCreatePopup()">Cancel</button>
            </div>
        </form>
    </div>
</div>

<script>
//for dispatch popup

function showDepartmentTeamCreatePopup() {

    var formAction = "department_team_create";

    document.getElementById("department_id").value = '<?php echo $department["id"];?>';
    document.querySelector(".department-team-create-popup-form").action = formAction;

    // Show the popup
    var popup = document.getElementById("department-team-create-popup");
    popup.style.display = "flex";
}

function hideDepartmentTeamCreatePopup() {
    var popup = document.getElementById("department-team-create-popup");
    popup.style.display = "none";
}
</script>