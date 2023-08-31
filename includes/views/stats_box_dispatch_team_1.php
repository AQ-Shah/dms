<?php if (not_executive($user["permission"])){ ?>

<div class="row" id="form_box_button">
    <div class="col-4">
        <a href='list_carriers'>
            <div class=" custom-panel card" style="background:#23a6d5">
                <h3><?php 
                echo check_access("dispatch_supervisor") ? no_of_all_carriers_by_team_dispatch($user["team_id"]) : 
                no_of_all_carriers_by_dispatcher($user["id"]);
                ?></h3>
                <p>Total Carriers</p>
            </div>
        </a>
    </div>
    <div class="col-4">
        <a href='list_carriers?only_available'>
            <div class=" custom-panel card" style="background:#23a6d5">
                <h3><?php 
                echo check_access("dispatch_supervisor") ? no_of_available_carriers_by_team_dispatch($user["team_id"]) : 
                no_of_available_carriers_by_dispatcher($user["id"]);
                ?></h3>
                <p>Available Carriers</p>
            </div>
        </a>
    </div>
    <div class="col-4">
        <a href='list_carriers?only_unavailable'>
            <div class=" custom-panel card" style="background:#58467e">
                <h3><?php 
                echo check_access("dispatch_supervisor") ? no_of_unavailable_carriers_by_team_dispatch($user["team_id"]) : 
                no_of_unavailable_carriers_by_team_dispatch($user["team_id"]);
                ?></h3>
                </h3>
                <p>All Unavailable Carriers</p>
            </div>
        </a>
    </div>


</div>

<?php } ?>