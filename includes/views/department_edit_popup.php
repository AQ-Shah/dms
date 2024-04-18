<div id="department-edit-popup" class="popup" style="display:none;">
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
            <input type="hidden" name="prev_url" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
            <button type="submit" name="submit" onclick="hideDepartmentEditPopup()">Edit</button>
            <button type="button" onclick="hideDepartmentEditPopup()">Cancel</button>
        </form>
    </div>
</div>


<script>

// For dispatch popup
function showDepartmentEditPopup(recordId, recordName, functionType) {
    const popup = document.getElementById("department-edit-popup");
    const departmentIdInput = document.getElementById("department_id");
    const nameInput = document.getElementById("name");
    const functionTypeSelect = document.getElementById("function-type");

    if (popup && departmentIdInput && nameInput && functionTypeSelect) {
        departmentIdInput.value = recordId;
        nameInput.value = recordName;
        functionTypeSelect.value = functionType;

        // Ensure the appropriate option is selected
        for (let option of functionTypeSelect.options) {
            if (option.value === functionType.toString()) {
                option.selected = true;
                break;
            }
        }

        var formAction = "department_edit?id=" + recordId;
        document.querySelector(".department-edit-popup-form").action = formAction;

        // Show the popup by setting display to flex
        popup.style.display = "flex";
    } else {
        console.error("Element not found!");
    }
}

function hideDepartmentEditPopup() {
    const popup = document.getElementById("department-edit-popup");
    if (popup) {
        // Hide the popup by setting display to none
        popup.style.display = "none";
    } else {
        console.error("Element not found!");
    }
}



</script>