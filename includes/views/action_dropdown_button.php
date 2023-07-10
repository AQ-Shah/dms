<div class="dropdown">
    <button class="dropdown-button">Actions</button>
    <div class="dropdown-content">
        <button onclick="window.open('show_carrier?id=<?php echo urlencode($record['id']); ?>', '_blank')">View</button>

        <?php if (check_access("carrier_update")) {?>
        <button
            onclick="window.open('carrier_update?id=<?php echo urlencode($record['id']); ?>', '_blank')">Edit</button>
        <?php } ?>

        <?php if (check_access("dispatch_carrier")) {?>
        <button onclick="showDispatchPopup(<?php echo $record['id']; ?>)">Dispatch</button>
        <?php } ?>

        <?php if (check_access("update_carrier_status")) {?>
        <button onclick="showStatusPopup(<?php echo $record['id']; ?>)">Change Status</button>
        <?php } ?>

        <?php if (check_access("carrier_truck_create")) {?>
        <button onclick="showAddTruckPopup(<?php echo $record['id']; ?>)">Add Truck</button>
        <?php } ?>

        <?php if (check_access("carrier_assign_dispatcher")) {?>
        <button onclick="showDAssignDispatcherPopup(<?php echo $record['id']; ?>)">Assign Dispatcher</button>
        <?php } ?>

        <?php if (check_access("carrier_assign_team")) {?>
        <button onclick="showDAssignTeamPopup(<?php echo $record['id']; ?>)">Assign Team</button>
        <?php } ?>
        <!-- add more actions here as needed -->
    </div>
</div>