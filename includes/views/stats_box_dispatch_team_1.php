<?php if (check_access("stats_box_dispatch_team_1") && not_executive($user["permission"])){ ?>

<div class="row text-center">
    <div class="col-12">
        <div class="page-title-box">
            <h2>
                Dispatch Stats
            </h2>

        </div>
    </div>
</div>


<div class="row" id="form_box_button">
    <div class="col-3">
        <a href='list_team_all_carriers'>
            <div class=" custom-panel card" style="background:#23a6d5">
                <h3><?php echo no_of_all_carriers_by_team_dispatch($user["team_id"]);?></h3>
                <p>Total Carriers</p>
            </div>
        </a>
    </div>
    <div class="col-3">
        <a href='list_team_available_carriers'>
            <div class=" custom-panel card" style="background:#58467e">
                <h3><?php echo no_of_available_carriers_by_team_dispatch($user["team_id"]);?>
                </h3>
                <p>Active Carriers</p>
            </div>
        </a>
    </div>
    <div class="col-3">
        <a href='list_team_dispatched'>
            <div class=" custom-panel card" style="background:#0d6631">
                <h3><?php echo no_of_dispatched_carriers_by_team($user["team_id"]);?></h3>
                <p>On Load</p>
            </div>
        </a>
    </div>
    <div class="col-3">
        <a href='list_team_available_carriers'>
            <div class=" custom-panel card" style="background:#d43a0f">
                <h3><?php echo no_of_available_carriers_by_team_dispatch($user["team_id"]) - no_of_dispatched_carriers_by_team($user["team_id"]);?>
                </h3>
                <p>Pending Dispatch</p>
            </div>
        </a>
    </div>
</div>

<?php } ?>