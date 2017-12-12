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
          <h3 class="box-title">Make Payment</h3>
        </div>
      
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="<?= base_url(); ?>/Customer/paymentbyid/<?= $id ?>" method="post">
          <div class="box-body">
            <div class="form-group">
                <label>Project ID</label>

                <select class="select2" style="width: 100%;" id="project_id"  name="project_id">
                  <?php foreach ($projects as $project) {
                     echo '<option value="'.$project->id.'">' .$project->name. '</option> '  ;               
                   } ?>

                </select>
              </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Amount</label>
              <input type="text" class="form-control" id="ammount"  name="ammount">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Memo</label>
              <input type="text" class="form-control" id="ammount"  name="memo">
            </div>
            
          </div>
          
          

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
          

        </form>
      </div>
  </div>
</div>
