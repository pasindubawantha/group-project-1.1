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
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Request material</h3>
      </div>
      <div class="box-body">
        <table id="table_stages_material_request" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Type</th>
              <th>Item ID</th>
              <th>Item name</th>
              <th>Units</th>
              <th>Request Ammount</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach ($items as $item)
              {
                echo "<tr>";
                echo '<td> <small class="label bg-yellow"> material </small> </td>';
                echo '<td> #ITM'.$item->item_id.'</td>';
                echo '<td> '.$item->item_name.'</td>';
                echo '<td> '.$item->item_unit.'</td>';
                echo '<td>
                        <form action="'.base_url().'/Project/operation_request/'.$project_id.'/'.$stage_id.'" method="post">
                            <input name="type" value="material" hidden>
                            <input name="budget_entry_id" value="'.$item->budget_entry_id.'" hidden>
                            <input type="number" min="1" name="ammount" required>
                            <button type="submit" class="btn btn-warning"> Request </button>
                          </form>
                        </td>';
                echo "</tr>";
              }
              foreach ($payments as $payment)
              {
              echo "<tr>";
              echo '<td> <small class="label bg-red"> payment </small> </td>';
              echo '<td> - </td>';
              echo '<td> '.$payment->name.'</td>';
              echo '<td> Rs </td>';
              echo '<td>
                      <form action="'.base_url().'/Project/operation_request/'.$project_id.'/'.$stage_id.'" method="post">
                          <input name="type" value="payment" hidden>
                          <input name="budget_entry_id" value="'.$payment->budget_entry_id.'" hidden>
                          <input type="number" min="1" name="ammount" required >
                          <button type="submit" class="btn btn-warning"> Request </button>
                        </form>
                      </td>';
              echo "</tr>";
            }
            ?>
          </tbody>
          <tfoot>
            <tr>
              <th>Item ID</th>
              <th>Item name</th>
              <th>Units</th>
              <th>Request Ammount</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <div class="box-footer">

      </div>
    </div>
  </div>
</div>
