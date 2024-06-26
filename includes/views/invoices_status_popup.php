<div id="invoices-status-popup" class="popup">
    <div class="popup-content">
        <h2>Change Invoice Status</h2>
        <form class="invoices-status-popup-form popup-form" action="" method="post">
            <label for="invoice-status">Invoice Status:</label>
            <select id="invoice-status" name="invoice-status">
                <option value="2">Pending</option>
                <option value="3">Paid</option>
                <option value="4">Cancelled</option>
            </select><br>
            <input type="hidden" id="invoice-id" name="invoice-id" value="">
            <input type="hidden" name="prev_url" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <button type="submit" name="submit">Save</button>
            <button type="button" onclick="hideInvoicesStatusPopup()">Cancel</button>
        </form>
    </div>
</div>

<script>
//for carrier status change popup

function showInvoiceStatusPopup(invoiceId) {
    // Get the current status for the carrier with the given ID
    // You'll need to replace this with your own code to fetch the status from your database

    // Populate the form fields with the current status
    document.getElementById("invoice-id").value = invoiceId;

    var formAction = "update_invoice_status";

    // set the form action to the constructed URL
    document.querySelector(".invoices-status-popup-form").action = formAction;
    // Show the popup
    var popup = document.getElementById("invoices-status-popup");
    popup.style.display = "flex";
}

function hideInvoicesStatusPopup() {
    var popup = document.getElementById("invoices-status-popup");
    popup.style.display = "none";
}
</script>