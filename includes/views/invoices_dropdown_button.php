 <?php if (check_access("update_invoice_status")) { ?>


 <div class="dropdown">
     <button class="dropdown-button">Actions</button>
     <div class="dropdown-content">

         <button
             onclick="window.open('invoice_view?invoice_id=<?php echo urlencode($record['id']); ?>', '_blank')">View</button>

         <button onclick="showInvoiceStatusPopup(<?php echo $record['id']; ?>)">Change
             Status</button>


     </div>
 </div>

 <?php } ?>