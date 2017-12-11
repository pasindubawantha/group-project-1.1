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
  <div class="col-xs-6">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Add new entry(Material)</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form action="<?= base_url(); ?>/Project/budget/<?= $project_id; ?>/<?= $stage_id; ?>" method="post" role="form">
        <div class="box-body">
          <div class="form-group">
            <table class="table">
              <tr>
                <td><label for="name">Item :</label></td>
                <td><select style="width:100%;" class="select2" name="item">
                  <?php
                    foreach ($form_items as $item)
                    {
                      echo '<option value="'.$item->id.'">'.$item->name.'</option>';
                    }

                  ?>
                </select></td>
              </tr>
              <tr>
                <td><label for="name">Price(list) :</label></td>
                <td><select style="width:100%;" class="select2" name="price">
                  <?php
                    foreach ($form_prices as $price)
                    {
                      echo '<option value="'.$price->id.'">'.$price->name.'</option>';
                    }

                  ?>
                </select></td>
              </tr>
              <tr>
                <td><label for="name">Ammount :</label></td>
                <td><input class="form-control" name="new_ammount" type="number" min=1></td>
              </tr>
            </table>
            <input hidden name="new_entry_form" value="true">
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <input name="type" value="material" hidden>
          <button type="submit" class="btn btn-primary pull-right">Add Entry</button>
        </div>
      </form>
    </div>
  </div>
  <div class="col-xs-6">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Add new entry(Payment)</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form action="<?= base_url(); ?>/Project/budget/<?= $project_id; ?>/<?= $stage_id; ?>" method="post" role="form">
        <div class="box-body">
          <div class="form-group">
            <table class="table">
              <tr>
                <td><label for="name">Description :</label></td>
                <td><input name="name" type="text" placeholder="Description"></td>
              </tr>
              <tr>
                <td><label for="name">Ammount :</label></td>
                <td><input class="form-control" name="new_ammount" type="number" min=1></td>
              </tr>
            </table>
            <input hidden name="new_entry_form" value="true">
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <input name="type" value="payment" hidden>
          <button type="submit" class="btn btn-primary pull-right">Add Entry</button>
        </div>
      </form>
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
        <table id="table_stages_budget" class="table table-bordered table-striped">
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
                echo '<td> '.$item->ammount.'</td>';
                echo "</tr>";
              }
              foreach ($payments as $payment)
              {
              echo "<tr>";
              echo '<td> <small class="label bg-red"> payment </small> </td>';
              echo '<td> - </td>';
              echo '<td> '.$payment->name.'</td>';
              echo '<td> Rs </td>';
              echo '<td> '.$payment->ammount.'</td>';
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
