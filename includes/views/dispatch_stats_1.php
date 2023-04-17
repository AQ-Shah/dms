<div class="row" id="form_box_button">
    <div class="col-3">
        <div class="custom-panel">
            <h3><?php echo no_of_carrier_form();?></h3>
            <p>Total Carriers</p>
        </div>
    </div>
    <div class="col-3">
        <div class="custom-panel" style="background:#58467e">
            <h3><?php echo no_of_unavailable_carriers();?></h3>
            <p>Unavailable</p>
        </div>
    </div>
    <div class="col-3">
        <div class="custom-panel" style="background:#0d6631">
            <h3><?php echo no_of_dispatched_carriers();?></h3>
            <p>Dispatched</p>
        </div>
    </div>
    <div class="col-3">
        <div class="custom-panel" style="background:#d43a0f">
            <h3><?php echo no_of_carrier_form()-no_of_unavailable_carriers()-no_of_dispatched_carriers();?></h3>
            <p>Pending</p>
        </div>
    </div>
</div>