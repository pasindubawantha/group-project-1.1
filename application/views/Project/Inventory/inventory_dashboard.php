<div class="row">
  <div class="col-xs-12">
    <div style="display:<?php if(isset($fail)) echo"block"; else echo "none"; ?>;" class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-ban"></i> Failed!</h4>
      <?php if(isset($message)) echo $message; ?>
    </div>
    <div style="display:<?php if(isset($sucess)) echo"block"; else echo "none"; ?>;"  class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-check"></i> Sucess!</h4>
      <?php if(isset($message)) echo $message; ?>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Inventory Items</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="table_stock_log" class="table table-bordered table-striped" >
          <thead>
            <tr>
              <th>Item ID</th>
              <th>Item</th>
              <th>No of units</th>
              <th>Transfer ammount</th>
              <th>Transfer Out</th>
              <th>Transfer to Main</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach ($stocks as $stock)
              {
                echo '<tr>';

                  echo '<td> '.$stock->id.' </td>';
                  echo '<td> '.$stock->name.' </td>';
                  echo '<td> '.$stock->no_of_units.' '.$stock->unit.' </td>';
                  echo '<form action="'.base_url().'/Project/inventory_dashboard/'.$project_id.'" method="post">';

                    echo '<td>';
                    echo '<input name="item_id" value="'.$stock->id.'" hidden>';
                    echo ' <input name="no_of_units" type="number" min=1 max='.$stock->no_of_units.' > '.$stock->unit.' </td>';
                    echo '<td> <button type="submit" name="out" class="btn btn-block btn-danger"> OUT </button> </td>';
                    echo '<td> <button type="submit" name="transfer" class="btn btn-block btn-warning"> TRANSFER </button> </td>';
                  echo '</form>';
                echo '</tr>';
              }
            ?>
          </tbody>
          <tfoot>
            <tr>
              <th>Item ID</th>
              <th>Item</th>
              <th>No of units</th>
              <th>Transfer ammount</th>
              <th>Transfer Out</th>
              <th>Transfer to Main</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
  </div>
</div>
