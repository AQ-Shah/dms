<div id="department-action-popup" class="popup">
    <div class="row popup-content">
        <label> Actions:</label>

        <div class="row popup-form">
            
            
            <div class="col-4">
                <button type="button"
                onclick="window.open('department_view?id=' + document.getElementById('department-id').value)">View</button>
            </div>
            <?php if (check_access("department_edit")) {?>
            <div class="col-4">
                <button type="button" onclick="showDepartmentEditPopup(
                        document.getElementById('department-id').value,
                        document.getElementById('department-name').value,
                        document.getElementById('department-function-code').value
                    )">Edit</button>
            </div>
            <?php } ?>
            <?php if (check_access("department_delete")) {?>
            <div class="col-4">
                <button type='button'
                onclick="if(confirm('Are you sure?')){window.open('department_delete?id=' + document.getElementById('department-id').value)}">Delete</button>
            </div>
            <?php } ?>
        </div>

        <input type="hidden" id="department-id" name="department-id" value="">
        <input type="hidden" id="department-name" name="department-name" value="">
        <input type="hidden" id="department-function-code" name="department-function-code" value="">
        <input type="hidden" name="prev_url" value="<?php echo $_SERVER['REQUEST_URI']; ?>">

        <button type="button" onclick="hideDepartmentActionPopup()">Cancel</button>
    </div>

</div>

<script>
//for carrier move change popup

function showDepartmentActionPopup(departmentId, departmentName, departmentFunctionCode) {

    // Populate the form fields with the current move
    document.getElementById("department-id").value = departmentId;
    document.getElementById("department-name").value = departmentName;
    document.getElementById("department-function-code").value = departmentFunctionCode;


    // Show the popup
    var popup = document.getElementById("department-action-popup");
    popup.style.display = "flex";
}

function hideDepartmentActionPopup() {
    var popup = document.getElementById("department-action-popup");
    popup.style.display = "none";
}
</script>