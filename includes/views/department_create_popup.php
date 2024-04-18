<div id="department-create-popup" class="popup">
    <div class="popup-content">
        <h2>Create Unit</h2>
        <form class="department-create-popup-form popup-form" action="" method="post">

            <label for="name">Unit Name:</label>
            <input type="text" id="new-department-name" name="name"><br>

            <label for="function-type">Unit Function:</label>
            <select name="function-type" class="form-control w-100" required>
                <option value="">Select Function type</option>
                <option value="5">Dispatching</option>
                <option value="10">Clients Acquisition</option>
            </select>

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