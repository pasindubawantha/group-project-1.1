<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Vendor Details</h3>
        <?php  echo form_open('http://localhost/group-project-1.1/index.php/Vendor/vendorbyid'); ?>
        <class="sidebar-form">
        <div class="input-group">
          <input type="text" name="id" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Address</th>
                  <th>Email</th>
                  <th>Phone Number</th>
<th></th>
<th></th>
<th></th>
                </tr>
                <?php 
                //echo form_open('http://localhost/group-project-1.1/index.php/Customer/customerbyid');
                foreach ($vendors as $vendor) {
                 
                
                echo '<tr>';
                  echo '<td>'.$vendor->id.'</td>';
                  echo '<td>'.$vendor->name.'</td>';
                  echo '<td>'.$vendor->address.'</td>';
                  echo '<td>'. $vendor->email.'</td>';
                 echo  '<td>'.$vendor->phone_number.'</td>';

                  
                  
  echo '<td>
          <form action="'.base_url().'/Vendor/vendorbyidview" method="post">
              <input hidden name="id" value="'.$vendor->id.'">
              <button type="submit" class="btn btn-block btn-info" >Info</button>
            </form>
          </td>';
   echo '<td>
          <form action="'.base_url().'/Vendor/edit" method="post">
              <input hidden name="id" value="'.$vendor->id.'">
              <button type="submit" class="btn btn-block btn-success" >Edit</button>
            </form>
          </td>';
    echo '<td>
           
          <form action="'.base_url().'/Vendor/deletevendor/'.$vendor->id.'" method="post">
              <input hidden name="id" value="'.$vendor->id.'">
              <button type="submit" class="btn btn-block btn-danger" >Delete</button>
          </form>
        </td>';
   //<a href="<?php echo base_url('index.php/Admin/editRingPost/'.$row['ringId']);
   
                
              //echo '</tr>';
              }
              //</form>
              ?>


                <!--<tr>
                  <td>219</td>
                  <td>Alexander Pierce</td>
                  <td>11-7-2014</td>
                  <td><span class="label label-warning">Pending</span></td>
                  <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                </tr>
                <tr>
                  <td>657</td>
                  <td>Bob Doe</td>
                  <td>11-7-2014</td>
                  <td><span class="label label-primary">Approved</span></td>
                  <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                </tr>
                <tr>
                  <td>175</td>
                  <td>Mike Doe</td>
                  <td>11-7-2014</td>
                  <td><span class="label label-danger">Denied</span></td>
                  <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                </tr>-->
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
