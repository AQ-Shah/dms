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
                        <?php if (isset($available_trucks) && mysqli_num_rows($available_trucks) > 0) { ?>
                            <?php while($record = mysqli_fetch_assoc($available_trucks)) { ?>
                                <div class="kanban-item" draggable="true" data-id="<?php echo $record['id']; ?>" data-carrier-id="<?php echo $record['carrier_id']; ?>" data-truck-id="<?php echo $record['id']; ?>">
                                    <p onclick="toggleInfo(<?php echo $record['id']; ?>)">
                                        <?php 
                                        $carrier = find_carrier_form_by_id($record["carrier_id"]); 
                                        echo htmlentities($carrier['b_name']) . ' - ' . htmlentities($record["d_name"]) . ' - ' . htmlentities($record["truck_type"]);
                                        ?>
                                    </p>
                                    <div id="info-<?php echo $record['id']; ?>" class="kanban-info" style="display:none;">
                                        <p>MC: <?php echo htmlentities($carrier['mc']); ?></p>
                                        <p>Business Number: <?php echo htmlentities($carrier['b_number']); ?></p>
                                        <p>Drivers Number: <?php echo htmlentities($record['d_number']); ?></p>
                                        <p>Note: <?php echo htmlentities($record['note']); ?></p>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php }  ?>
                    </div>
                </div>

                <div class="kanban-column" id="dispatched">
                    <h3>Dispatched</h3>
                    <div class="kanban-items">
                        <?php if (isset($onload_trucks) && mysqli_num_rows($onload_trucks) > 0) { ?>
                            <?php while($record = mysqli_fetch_assoc($onload_trucks)) { ?>
                                <div class="kanban-item" draggable="true" data-id="<?php echo $record['id']; ?>" data-carrier-id="<?php echo $record['carrier_id']; ?>" data-truck-id="<?php echo $record['id']; ?>">
                                    <p onclick="toggleInfo(<?php echo $record['id']; ?>)">
                                        <?php 
                                        $carrier = find_carrier_form_by_id($record["carrier_id"]); 
                                        echo htmlentities($carrier['b_name']) . ' - ' . htmlentities($record["d_name"]) . ' - ' . htmlentities($record["truck_type"]);
                                        ?>
                                    </p>
                                    <div id="info-<?php echo $record['id']; ?>" class="kanban-info" style="display:none;">
                                        <p>MC: <?php echo htmlentities($carrier['mc']); ?></p>
                                        <p>Business Number: <?php echo htmlentities($carrier['b_number']); ?></p>
                                        <p>Drivers Number: <?php echo htmlentities($record['d_number']); ?></p>
                                        <p>Note: <?php echo htmlentities($record['note']); ?></p>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>

                <div class="kanban-column" id="unavailable">
                    <h3>Unavailable</h3>
                    <div class="kanban-items">
                        <?php if (isset($unavailable_trucks) && mysqli_num_rows($unavailable_trucks) > 0) { ?>
                            <?php while($record = mysqli_fetch_assoc($unavailable_trucks)) { ?>
                                <div class="kanban-item" draggable="true" data-id="<?php echo $record['id']; ?>" data-carrier-id="<?php echo $record['carrier_id']; ?>" data-truck-id="<?php echo $record['id']; ?>">
                                    <p onclick="toggleInfo(<?php echo $record['id']; ?>)">
                                        <?php 
                                        $carrier = find_carrier_form_by_id($record["carrier_id"]); 
                                        echo htmlentities($carrier['b_name']) . ' - ' . htmlentities($record["d_name"]) . ' - ' . htmlentities($record["truck_type"]);
                                        ?>
                                    </p>
                                    <div id="info-<?php echo $record['id']; ?>" class="kanban-info" style="display:none;">
                                        <p>Status Changed Reason: <?php echo htmlentities($record['status_change_reason']); ?></p>
                                        <p>MC: <?php echo htmlentities($carrier['mc']); ?></p>
                                        <p>Business Number: <?php echo htmlentities($carrier['b_number']); ?></p>
                                        <p>Drivers Number: <?php echo htmlentities($record['d_number']); ?></p>
                                        <p>Note: <?php echo htmlentities($record['note']); ?></p>
                                    </div>
                                </div>
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
        e.dataTransfer.setData('id', e.target.dataset.id);
        e.dataTransfer.setData('carrier-id', e.target.dataset.carrierId);
        e.dataTransfer.setData('truck-id', e.target.dataset.carrierTruckId);
    }

    function dragOver(e) {
        e.preventDefault();
    }

    function drop(e) {
        e.preventDefault();
        const truckId = e.dataTransfer.getData('id');
        const carrierId = e.dataTransfer.getData('carrier-id');
        const carrierTruckId = e.dataTransfer.getData('truck-id');
        const draggable = document.querySelector(`[data-id='${truckId}']`);
        const dropzone = e.target.closest('.kanban-column');
        const dropzoneId = dropzone.id;

        // Perform the drop action
        dropzone.querySelector('.kanban-items').appendChild(draggable);

        // Handle popup based on dropzoneId
        if (dropzoneId === 'dispatched') {
            showTruckDispatchPopup(carrierId, truckId); // Function to show dispatch popup
        } else if (dropzoneId === 'unavailable') {
            showTruckStatusPopup(truckId, '3'); // Function to show status change popup
        } else if (dropzoneId === 'available') {
            showTruckStatusPopup(truckId, '1'); // Function to show status change popup
        }

        
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

    function toggleInfo(id) {
        var info = document.getElementById('info-' + id);
        if (info.style.display === 'none') {
            info.style.display = 'block';
        } else {
            info.style.display = 'none';
        }
    }

   


</script>


<?php 

    include("../includes/views/carrier_truck_status_popup.php"); 
    include("../includes/views/carrier_move_popup.php"); 
    include("../includes/views/truck_dispatch_popup.php"); 
    include("../includes/pagination/table_script.php"); 
    include("../includes/layouts/public_footer.php"); 
?>
