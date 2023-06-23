 <?php if (check_access("update_invoices_status")) { ?>


 <div class="dropdown">
     <button class="dropdown-button">Actions</button>
     <div class="dropdown-content">

         <button onclick="showInvoiceStatusPopup(<?php echo $record['id']; ?>)">Change
             Status</button>


     </div>
 </div>

 <?php } ?>