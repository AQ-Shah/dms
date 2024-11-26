<div id="department-user-action-popup" class="popup">
    <div class="row popup-content">
        <label> Actions:</label>

        <div class="row popup-form">
            
            
            <div class="col-6">
                <button type="button"
                onclick="window.open('profile?id=' + document.getElementById('user_id_view').value)">View</button>
            </div>
            <?php if (check_access("user_edit")) {?>
            <div class="col-6">
                <button type="button" onclick="showDepartmentUserEditPopup(
                    document.getElementById('user_id_view').value,
                    document.getElementById('full_name_view').value,
                    document.getElementById('email_view').value,
                    document.getElementById('phone_num_view').value,
                    document.getElementById('emergency_contact_view').value,
                    document.getElementById('gender_view').value,
                    document.getElementById('join_date_view').value,
                    document.getElementById('birth_date_view').value
                )">Edit</button>
     
            <?php } ?>
            <?php if (check_access("user_delete")) {?>
            <div class="col-12">
                <button type='button'
                onclick="if(confirm('Are you sure?')){window.open('profile_delete?id=' + document.getElementById('user_id_view').value)}">Delete</button>
            </div>
            <?php } ?>
        </div>

        <input type="hidden" id="user_id_view" name="user_id_view" value="">
        <input type="hidden" id="full_name_view" name="full_name_view" value="">
        <input type="hidden" id="email_view" name="email_view" value="">
        <input type="hidden" id="phone_num_view" name="phone_num_view" value="">
        <input type="hidden" id="emergency_contact_view" name="emergency_contact_view" value="">
        <input type="hidden" id="gender_view" name="gender_view" value="">
        <input type="hidden" id="join_date_view" name="join_date_view" value="">
        <input type="hidden" id="birth_date_view" name="birth_date_view" value="">

        <button type="button" onclick="hideDepartmentUsersActionPopup()">Cancel</button>
    </div>

</div>

<script>
//for carrier move change popup

function showDepartmentUsersActionPopup(recordId, recordName, recordEmail, phoneNum, emrNum, gender,joinDate,birthDate) {

    // Populate the form fields with the current move
    document.getElementById("user_id_view").value = recordId;
    document.getElementById("full_name_view").value = recordName;
    document.getElementById("email_view").value = recordEmail;
    document.getElementById("phone_num_view").value = phoneNum;
    document.getElementById("emergency_contact_view").value = emrNum;
    document.getElementById("gender_view").value = gender;
    document.getElementById("join_date_view").value = joinDate;
    document.getElementById("birth_date_view").value = birthDate;

    // Show the popup
    var popup = document.getElementById("department-user-action-popup");
    popup.style.display = "flex";
}

function hideDepartmentUsersActionPopup() {
    var popup = document.getElementById("department-user-action-popup");
    popup.style.display = "none";
}
</script>