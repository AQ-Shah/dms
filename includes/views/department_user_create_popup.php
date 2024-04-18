<?php

$record_set = find_all_teams_by_department($department["id"]);

?>
<div id="department-user-create-popup" class="popup">
    <div class="row popup-content-wide">
        <form class="department-user-create-popup-form popup-form" action="" method="post">

            <?php if (not_executive($_GET['id'])) {?>
            <div class="form-row-col-6">
                <label for="team_id">Team:</label>
                    <select name="team_id">

                        <?php while($record = mysqli_fetch_assoc($record_set)) { ?>
                            <option value="<?php echo htmlentities($record["id"]); ?>">
                            <?php echo htmlentities($record["name"]); ?> </option>
                        <?php } ?>

                    </select>

                <label for="role_id">Role:</label>
                <select name="role_id">
                    <?php if($department['function_code']== 5) { ?>
                    <option value="5">Dispatch Agent </option>
                    <option value="4">Dispatch Supervisor </option>
                    <?php } ?>
                    <?php if($department['function_code']== 10) { ?>
                    <option value="10">Sales Agent </option>
                    <option value="9">Sales Supervisor </option>
                    <?php } ?>
                </select>
            </div>
            <?php } ?>

            <div class="form-row-col-6">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email">
                
                <label for="password">Set Password:</label>
                <input type="text" id="password" name="password">
            </div>

            <div class="form-row-col-6">
                <label for="full_name">Full Name:</label>
                <input type="text" id="full_name" name="full_name">

                <label for="gender">Gender:</label>
                <select name="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>

            <div class="form-row-col-6">

                <label for="phone_num">Phone Number:</label>
                <input type="tel" maxlength="11" id="phone_num" name="phone_num">

                <label for="emergency_contact">Emergency Number:</label>
                <input type="tel" maxlength="11" id="emergency_contact" name="emergency_contact">

            </div>

            <div class="form-row-col-6">
                <label for="join_date">Joining Date:</label>
                <input type="date" id="join_date" name="join_date">

                <label for="birth_date">Birth Date:</label>
                <input type="date" id="birth_date" name="birth_date">
            </div>

            <input type="hidden" name="department_id" value="<?php echo $department["id"];?>">
            <input type="hidden" name="company_id" value="<?php echo $department["company_id"];?>">
            <input type="hidden" name="prev_url" value="<?php echo $_SERVER['REQUEST_URI']; ?>">

            <div class="form-actions">
                <button type="submit" name="submit" onclick="hideDepartmentUserCreatePopup()">Create</button>
                <button type="button" onclick="hideDepartmentUserCreatePopup()">Cancel</button>
            </div>
        </form>
    </div>
</div>

<script>
//for dispatch popup

function showDepartmentUserCreatePopup() {

    var formAction = "profile_create";
    document.querySelector(".department-user-create-popup-form").action = formAction;

    // Show the popup
    var popup = document.getElementById("department-user-create-popup");
    popup.style.display = "flex";
}

function hideDepartmentUserCreatePopup() {
    var popup = document.getElementById("department-user-create-popup");
    popup.style.display = "none";
}
</script>