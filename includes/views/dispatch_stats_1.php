<?php if (check_access("dispatch_stats_1")){ ?>

<div class="row text-center">
    <div class="col-12">
        <div class="page-title-box">
            <h2>
                Carrier Stats
            </h2>

        </div>
    </div>
</div>


<div class="row" id="form_box_button">
    <div class="col-3">
        <a href='list_carriers'>
            <div class=" custom-panel card" style="background:#23a6d5">
                <h3><?php echo no_of_carrier_form();?></h3>
                <p>Total Carriers</p>
            </div>
        </a>
    </div>
    <div class="col-3">
        <a href='list_working_carriers'>
            <div class=" custom-panel card" style="background:#58467e">
                <h3><?php echo no_of_carrier_form()-no_of_unavailable_carriers();?></h3>
                <p>Active Carriers</p>
            </div>
        </a>
    </div>
    <div class="col-3">
        <a href='list_dispatched'>
            <div class=" custom-panel card" style="background:#0d6631">
                <h3><?php echo no_of_dispatched_carriers();?></h3>
                <p>On Load</p>
            </div>
        </a>
    </div>
    <div class="col-3">
        <a href='list_working_carriers'>
            <div class=" custom-panel card" style="background:#d43a0f">
                <h3><?php echo no_of_carrier_form()-no_of_unavailable_carriers()-no_of_dispatched_carriers();?></h3>
                <p>Pending Dispatch</p>
            </div>
        </a>
    </div>
</div>

<?php } ?>