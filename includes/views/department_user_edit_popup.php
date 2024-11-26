<div id="department-user-edit-popup" class="popup">
    <div class="row popup-content-wide">
        <h2>Edit User</h2>
        <form class="department-user-edit-popup-form popup-form" action="" method="post">
            <div class="form-row-col-6">
                    <label for="full_name_edit">Full Name:</label>
                    <input type="text" id="full_name_edit" name="full_name_edit">

                    <label for="email_edit">Email:</label>
                    <input type="text" id="email_edit" name="email_edit">
                </div>

            <div class="form-row-col-6">
                <label for="phone_num_edit">Phone Number:</label>
                <input type="tel" maxlength="15" id="phone_num_edit" name="phone_num_edit">

                <label for="emergency_contact_edit">Emergency Number:</label>
                <input type="tel" maxlength="15" id="emergency_contact_edit" name="emergency_contact_edit">
            </div>

            <div class="form-row-col-6">
                <label for="join_date_edit">Joining Date:</label>
                <input type="date" id="join_date_edit" name="join_date_edit">

                <label for="birth_date_edit">Birth Date:</label>
                <input type="date" id="birth_date_edit" name="birth_date_edit">
            </div>
            <input type="hidden" id="user_id_edit" name="user_id_edit" value="">
            <input type="hidden" name="prev_url" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <button type="submit" name="submit" onclick="hideDepartmentUserEditPopup()">Edit</button>
            <button type="button" onclick="hideDepartmentUserEditPopup()">Cancel</button>
        </form>
    </div>
</div>

<script>
//for dispatch popup

function showDepartmentUserEditPopup(recordId, recordName, recordEmail, phoneNum, emrNum, gender,joinDate,birthDate) {
    // Populate the form fields with default values
    document.getElementById("user_id_edit").value = recordId;
    document.getElementById("full_name_edit").value = recordName;
    document.getElementById("email_edit").value = recordEmail;
    document.getElementById("phone_num_edit").value = phoneNum;
    document.getElementById("emergency_contact_edit").value = emrNum;
    document.getElementById("join_date_edit").value = joinDate;
    document.getElementById("birth_date_edit").value = birthDate;

    var formAction = "edit_user?id=" + recordId;

    // set the form action to the constructed URL
    document.querySelector(".department-user-edit-popup-form").action = formAction;
    // Show the popup
    var popup = document.getElementById("department-user-edit-popup");
    popup.style.display = "flex";
    var popup = document.getElementById("department-user-action-popup");
    popup.style.display = "none";
}

function hideDepartmentUserEditPopup() {
    var popup = document.getElementById("department-user-edit-popup");
    popup.style.display = "none";
}
</script>