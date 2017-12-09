
<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Pick or Delete a Customer</h3>
      </div>
      <div class="box-body">
        <table id='customer_details' class="table table-bordered table-striped">
          <thead>
            <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Address</th>
                  <th>Email</th>
                  <th>Phone Number</th>
                  <th></th>
                  <th></th>
                </tr>
          </thead>
          <tbody>
            <?php
              foreach ($customers as $customer) {
                echo "<tr>";
                echo '<td> #STG'.$customer->id.'</td>';
                echo '<td> '.$customer->name.'</td>';
                echo '<td> '.$customer->address.'</td>';
                echo '<td> '. $customer->email.'</td>';
                echo '<td> '.$customer->phone_number.'</td>';
                
          echo '<td>
          <form action="'.base_url().'/Customer/customerbyidview/'.$customer->id.'" method="post">
              <input hidden name="id" value="'.$customer->id.'">
              <button type="submit" class="btn btn-block btn-info" >Info</button>
            </form>
          </td>';
          echo '<td>
          <form action="'.base_url().'/Customer/deletecustomer/'.$customer->id.'" method="post">
              <input hidden name="id" value="'.$customer->id.'">
              <button type="submit" class="btn btn-block btn-danger" >Delete</button>
            </form>
          </td>';
          
                echo "</tr>";
              }
            ?>
          </tbody>
          <tfoot>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Address</th>
              <th>Email</th>
              <th>Phone Number</th>
              <th></th>
              <th></th>
            </tr>
          </tfoot>
        </table>
      </div>
      <div class="box-footer">

      </div>
    </div>
  </div>
</div>
