
<h4>Personal Details</h4>
<?php foreach($user as $user){ ?>
    <form class="form-horizontal">
        <div class="form-group">
            <label class="col-sm-3 control-label">Name : </label>
            <label class="col-sm-7 control-label"><?php echo $customer->name ?></label>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">RoleID : </label>
            <label class="col-sm-7 control-label"><?php echo $customer->address ?></label>
        </div>
            <?php } ?>
        </div>
    </form>



