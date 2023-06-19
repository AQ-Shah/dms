<div class="row">

    <?php if (check_access("invoice_management")){ ?>
    <div class="col-12 col-md-3 my-2">
        <div class="d-grid gap-3">
            <button type="button" class="primary-button" onclick="location.href='invoices_pending'">Invoice
                Management</button>
        </div>
    </div>
    <?php } ?>

    <?php if (check_access("list_carriers")){ ?>
    <div class="col-12 col-md-3 my-2">
        <div class="d-grid gap-3">
            <button type="button" class="primary-button" onclick="location.href='list_carriers'">Carriers
                Section</button>
        </div>
    </div>
    <?php } ?>
    <?php if (check_access("list_dispatched")){ ?>
    <div class="col-12 col-md-3 my-2">
        <div class="d-grid gap-3">
            <button type="button" class="primary-button" onclick="location.href='list_dispatched'">
                Dispatched Sections</button>
        </div>
    </div>
    <?php } ?>
    <?php if (check_access("carrier_create")){ ?>
    <div class="col-12 col-md-3 my-2">
        <div class="d-grid gap-3">
            <button type="button" class="primary-button" onclick="location.href='carrier_create'">Sales Section
                Carriers</button>
        </div>
    </div>

    <?php } ?>
    <?php if (check_access("departments")){ ?>
    <div class="col-12 col-md-3 my-2">
        <div class="d-grid gap-3">
            <button type="button" class="primary-button" onclick="location.href='departments'">Departments
                Management</button>
        </div>
    </div>
    <?php } ?>

    <?php if (check_access("show_news")){ ?>
    <div class="col-12 col-md-3 my-2">
        <div class="d-grid gap-3">
            <button type="button" class="primary-button" onclick="location.href='show_news'">News
                board</button>
        </div>
    </div>
    <?php } ?>
    <?php if (check_access("show_discussion")){ ?>
    <div class="col-12 col-md-3 my-2">
        <div class="d-grid gap-3">
            <button type="button" class="primary-button" onclick="location.href='discussion_board'">Discussion
                board</button>
        </div>
    </div>
    <?php } ?>
    <?php if (check_access("settings")){ ?>
    <div class="col-12 col-md-3 my-2">
        <div class="d-grid gap-3">
            <button type="button" class="primary-button" onclick="location.href='edit_profile'">Settings</button>
        </div>
    </div>
    <?php } ?>


</div>