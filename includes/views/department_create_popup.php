<div id="department-create-popup" class="popup">
    <div class="popup-content">
        <h2>Create Department</h2>
        <form class="department-create-popup-form popup-form" action="" method="post">

            <label for="name">Department Name:</label>
            <input type="text" id="new-department-name" name="name"><br>

            <label for="email">Email:</label>
            <input type="text" id="new-department-email" name="email"><br>

            <input type="hidden" name="prev_url" value="<?php echo $_SERVER['REQUEST_URI']; ?>">

            <button type="submit" name="submit" onclick="hideDepartmentCreatePopup()">Create</button>

            <button type="button" onclick="hideDepartmentCreatePopup()">Cancel</button>
        </form>
    </div>
</div>

<script>
//for dispatch popup

function showDepartmentCreatePopup() {

    var formAction = "department_create";

    // set the form action to the constructed URL
    document.querySelector(".department-create-popup-form").action = formAction;
    // Show the popup
    var popup = document.getElementById("department-create-popup");
    popup.style.display = "flex";
}

function hideDepartmentCreatePopup() {
    var popup = document.getElementById("department-create-popup");
    popup.style.display = "none";
}
</script>