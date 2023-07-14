 <?php if (check_access("update_dispatched_status")) { ?>

 <?php if ($record["status"] != "Cancelled") { ?>
 <div class="dropdown">
     <button class="dropdown-button">Actions</button>
     <div class="dropdown-content">

         <button
             onclick="showDispatchedStatusPopup(<?php echo $record["id"]; ?>, <?php echo $record["carrier_id"]; ?>)">Change
             Status</button>

         <!-- add more actions here as needed -->
     </div>
 </div>

 <?php } ?>
 <?php } ?>