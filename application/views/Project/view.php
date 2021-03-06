<div class="row">
  <?php
    if($access['project_customer'])
    {
      echo '
            <div class="col-md-3 col-sm-6 col-xs-12">
              <a href="'.base_url().'/Project/analytics/'.$project_id.'" >
                <div class="info-box">
                  <span class="info-box-icon bg-aqua"><i class="fa fa-line-chart"></i></span>
                   <div class="info-box-content">
                      <h2>Analytics</h2>
                    </div>
                  </div>
                </a>
              </div>';
    }

    if($access['project_inventory'])
    {
      echo '
      <div class="col-md-3 col-sm-6 col-xs-12">
        <a href="'.base_url().'/Project/inventory_stock/'.$project_id.'" >
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-fw fa-cubes"></i></span>
            <div class="info-box-content">
              <h2>Inventory</h2>
            </div>
          </div>
        </a>
      </div>';
    }

    if($access['project_team'])
    {
      echo '
      <div class="col-md-3 col-sm-6 col-xs-12">
        <a href="'.base_url().'/Project/team_members/'.$project_id.'" >
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-fw fa-users"></i></span>
            <div class="info-box-content">
              <h2>Team</h2>
            </div>
          </div>
        </a>
      </div>';
    }

    if($access['project_budget'])
    {
      echo '
      <div class="col-md-3 col-sm-6 col-xs-12">
        <a href="'.base_url().'/Project/budget/'.$project_id.'" >
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-fw fa-calculator"></i></span>
            <div class="info-box-content">
              <h2>Budget</h2>
            </div>
          </div>
        </a>
      </div>';
    }

    if($access['project'])
    {
      echo '
      <div class="col-md-3 col-sm-6 col-xs-12">
        <a href="'.base_url().'/Project/operation_inbox/'.$project_id.'" >
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-fw fa-inbox"></i></span>
            <div class="info-box-content">
              <h2>Operation</h2>
            </div>
          </div>
        </a>
      </div>';
    }
  ?>
</div>
