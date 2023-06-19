<div class="row">

    <?php if (check_access("invoice_management")){ ?>
    <div class="col-12 col-md-3 my-2">
        <div class="d-grid gap-3">
            <button type="button" class="primary-button">Invoice Management</button>
        </div>
    </div>
    <?php } ?>

    <?php if (check_access("invoice_management")){ ?>
    <div class="col-12 col-md-3 my-2">
        <div class="d-grid gap-3">
            <button type="button" class="primary-button" onclick="location.href='list_carriers'">Carriers
                Section</button>
        </div>
    </div>
    <?php } ?>
    <?php if (check_access("invoice_management")){ ?>
    <div class="col-12 col-md-3 my-2">
        <div class="d-grid gap-3">
            <button type="button" class="primary-button" onclick="location.href='list_dispatched'">
                Dispatched Sections</button>
        </div>
    </div>
    <?php } ?>
    <?php if (check_access("invoice_management")){ ?>
    <div class="col-12 col-md-3 my-2">
        <div class="d-grid gap-3">
            <button type="button" class="primary-button" onclick="location.href='list_unavailable'">Sales Section
                Carriers</button>
        </div>
    </div>

    <?php } ?>
    <?php if (check_access("invoice_management")){ ?>
    <div class="col-12 col-md-3 my-2">
        <div class="d-grid gap-3">
            <button type="button" class="primary-button" onclick="location.href='carrier_create'">Departments
                Management</button>
        </div>
    </div>
    <?php } ?>

    <?php if (check_access("invoice_management")){ ?>
    <div class="col-12 col-md-3 my-2">
        <div class="d-grid gap-3">
            <button type="button" class="primary-button" onclick="location.href='carrier_create'">News
                board</button>
        </div>
    </div>
    <?php } ?>
    <?php if (check_access("invoice_management")){ ?>
    <div class="col-12 col-md-3 my-2">
        <div class="d-grid gap-3">
            <button type="button" class="primary-button" onclick="location.href='carrier_create'">Discussion
                board</button>
        </div>
    </div>
    <?php } ?>
    <?php if (check_access("invoice_management")){ ?>
    <div class="col-12 col-md-3 my-2">
        <div class="d-grid gap-3">
            <button type="button" class="primary-button" onclick="location.href='carrier_create'">Settings</button>
        </div>
    </div>
    <?php } ?>


</div>