<?php 
    require_once("../includes/public_require.php"); 
    $current_page = "dispatch_board";
	include("../includes/layouts/public_header.php"); 
    include("../includes/data/trucks_by_company_data_fetch.php"); 
?>

<div class="container">

    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <?php echo message(); ?>
                <h2>Dispatch Board</h2>
            </div>
        </div>
    </div>



    <div class="row card">
        <div class="col-12">
            <div class="row py-3">
                <div class="col-3 simple-panel">
                    <label>Dispatch Board</label>
                </div>
                <div class="col-6 simple-panel" style="background-color:transparent">
                    <input class="form-control" id="kanbanSearch" onkeyup="kanban_search(event)" type="text"
                        placeholder="Search..">
                </div>
            </div>
            <div class="kanban-board">
                <div class="kanban-column" id="available">
                    <h3>Available</h3>
                    <div class="kanban-items">
                        <?php if (isset($available_trucks)) { ?>
                        <?php while($record = mysqli_fetch_assoc($available_trucks)) { ?>
                        <?php if ($record["truck_load_status"] == 1) { ?>
                        <div class="kanban-item" draggable="true" data-id="<?php echo $record['id']; ?>">
                            <p><?php echo htmlentities(find_carrier_form_by_id($record["carrier_id"])).' - '.htmlentities($record["d_name"]); ?></p>
                        </div>
                        <?php } ?>
                        <?php } ?>
                        <?php } ?>
                    </div>
                </div>
                <div class="kanban-column" id="dispatched">
                    <h3>Dispatched</h3>
                    <div class="kanban-items">
                        <?php if (isset($onload_trucks)) { ?>
                        <?php while($record = mysqli_fetch_assoc($onload_trucks)) { ?>
                        <?php if ($record["truck_load_status"] == 2) { ?>
                        <div class="kanban-item" draggable="true" data-id="<?php echo $record['id']; ?>">
                            <p><?php echo htmlentities(find_carrier_form_by_id($record["carrier_id"])).' - '.htmlentities($record["d_name"]); ?></p>
                        </div>
                        <?php } ?>
                        <?php } ?>
                        <?php } ?>
                    </div>
                </div>
                <div class="kanban-column" id="unavailable">
                    <h3>Unavailable</h3>
                    <div class="kanban-items">
                        <?php if (isset($unavailable_trucks)) { ?>
                        <?php while($record = mysqli_fetch_assoc($unavailable_trucks)) { ?>
                        <?php if ($record["truck_load_status"] == 3) { ?>
                        <div class="kanban-item" draggable="true" data-id="<?php echo $record['id']; ?>">
                            <p><?php echo htmlentities(find_carrier_form_by_id($record["carrier_id"])).' - '.htmlentities($record["d_name"]); ?></p>
                        </div>
                        <?php } ?>
                        <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>


        </div>
    </div>

</div>

<script>
    document.querySelectorAll('.kanban-item').forEach(item => {
        item.addEventListener('dragstart', dragStart);
    });

    document.querySelectorAll('.kanban-column').forEach(column => {
        column.addEventListener('dragover', dragOver);
        column.addEventListener('drop', drop);
    });

    function dragStart(e) {
        e.dataTransfer.setData('text/plain', e.target.dataset.id);
    }

    function dragOver(e) {
        e.preventDefault();
    }

    function drop(e) {
        e.preventDefault();
        const id = e.dataTransfer.getData('text/plain');
        const draggable = document.querySelector(`[data-id='${id}']`);
        e.target.querySelector('.kanban-items').appendChild(draggable);
    }

    function kanban_search(event) {
        let input = document.getElementById("kanbanSearch");
        let filter = input.value.toUpperCase();
        let items = document.querySelectorAll(".kanban-item");

        items.forEach(item => {
            let text = item.textContent || item.innerText;
            if (text.toUpperCase().indexOf(filter) > -1) {
                item.style.display = "";
            } else {
                item.style.display = "none";
            }
        });
    }
</script>

<?php 
    include("../includes/views/action_dropdown_button.php");
    include("../includes/views/carrier_add_truck_popup.php"); 
    include("../includes/views/carrier_assign_team_popup.php"); 
    include("../includes/views/carrier_assign_dispatcher_popup.php"); 
    include("../includes/views/carrier_status_popup.php"); 
    include("../includes/views/carrier_move_popup.php"); 
    include("../includes/views/carrier_dispatch_popup.php"); 
    include("../includes/pagination/table_script.php"); 
    include("../includes/layouts/public_footer.php"); 
?>