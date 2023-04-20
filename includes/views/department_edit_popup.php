<div id="department-edit-popup" class="popup">
    <div class="popup-content">
        <h2>Edit Department</h2>
        <form class="department-edit-popup-form popup-form" action="" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value=""><br>
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" value=""><br>
            <input type="hidden" id="carrier-id" name="carrier_id" value="">
            <input type="hidden" name="prev_url" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <button type="submit" name="submit" onclick="hideDepartmentEditPopup()">Edit</button>
            <button type="button" onclick="hideDepartmentEditPopup()">Cancel</button>
        </form>
    </div>
</div>

<script>
//for dispatch popup

function showDepartmentEditPopup(recordId, recordName, recordEmail) {
    // Populate the form fields with default values
    document.getElementById("carrier-id").value = recordId;
    document.getElementById("name").value = recordName;
    document.getElementById("email").value = recordEmail;

    var formAction = "department_edit?id=" + recordId;

    // set the form action to the constructed URL
    document.querySelector(".department-edit-popup-form").action = formAction;
    // Show the popup
    var popup = document.getElementById("department-edit-popup");
    popup.style.display = "flex";
}

function hideDepartmentEditPopup() {
    var popup = document.getElementById("department-edit-popup");
    popup.style.display = "none";
}
</script>