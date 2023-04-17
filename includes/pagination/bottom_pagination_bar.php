<div class="pagination-panel">
    <div class="col-6">
        <?php 
        add_pagination ($page,$total_pages,$current_page,$record_per_page);
        ?>
    </div>
    <div class="col-3">
        <label> Number of record per page </label>
    </div>
    <div class="col-3 ">
        <form role="form-inline" action="<?php echo $current_page;?>" method="post">
            <div class="form-group">
                <select id="no_of_record" class="form-control" onchange="pagination()">
                    <option value="5" <?php if ($record_per_page == '5') echo 'selected';?>>5</option>
                    <option value="10" <?php if ($record_per_page == '10') echo 'selected';?>>10</option>
                    <option value="20" <?php if ($record_per_page == '20') echo 'selected';?>>20</option>
                    <option value="50" <?php if ($record_per_page == '50') echo 'selected';?>>50</option>
                    <option value="100" <?php if ($record_per_page == '100') echo 'selected';?>>100</option>
                </select>
            </div>
            <div class="form-group">

            </div>
        </form>
    </div>
</div>