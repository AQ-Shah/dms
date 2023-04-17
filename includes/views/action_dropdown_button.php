 <div class="dropdown">
     <button class="dropbtn">Actions</button>
     <div class="dropdown-content">
         <button onclick="location.href='show_carrier?id=<?php echo urlencode($record["id"]); ?>'">View</button>
         <button onclick="showDispatchPopup(<?php echo $record["id"]; ?>)">Dispatch</button>
         <button onclick="showStatusPopup(<?php echo $record["id"]; ?>)">Change
             Status</button>
         <button onclick="showMovePopup(<?php echo $record["id"]; ?>)">Change
             Location</button>
         <!-- add more actions here as needed -->
     </div>
 </div>