<div id="department-edit-popup" class="popup">
    <div class="popup-content">
        <h2>Edit Unit</h2>
        <form class="department-edit-popup-form popup-form" action="" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value=""><br>
            <label for="function-type">Unit Function:</label>
            <select id="function-type" name="function-type" class="form-control w-100">
                <option value="5">Dispatching</option>
                <option value="10">Clients Acquisition</option>
            </select>
            <input type="hidden" id="department_id" name="department_id" value="">
            <input type="hidden" name="prev_url" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <button type="submit" name="submit" onclick="hideDepartmentEditPopup()">Edit</button>
            <button type="button" onclick="hideDepartmentEditPopup()">Cancel</button>
        </form>
    </div>
</div>

<script>
//for dispatch popup

function showDepartmentEditPopup(recordId, recordName, functionType) {
    // Populate the form fields with default values
    document.getElementById("department_id").value = recordId;
    document.getElementById("name").value = recordName;
    document.getElementById("function-type").value = functionType;

    var formAction = "department_edit?id=" + recordId;

    // set the form action to the constructed URL
    document.querySelector(".department-edit-popup-form").action = formAction;
    // Show the popup
    var popup = document.getElementById("department-edit-popup");
    popup.style.display = "flex";
    var popup = document.getElementById("department-action-popup");
    popup.style.display = "none";
}

function hideDepartmentEditPopup() {
    var popup = document.getElementById("department-edit-popup");
    popup.style.display = "none";
}
</script>