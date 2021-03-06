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
		      <h3 class="box-title">Upload Budget CVS File</h3>
		    </div>
	    <!-- /.box-header -->
	    <!-- form start -->
		    <form role="form" action="<?= base_url(); ?>/Project/budget_change/<?= $project_id;?>" method="post" enctype="multipart/form-data">
		      <div class="box-body">
		        <div class="form-group">
		          <label for="exampleInputFile">File input</label>
		          <input name="budget_file" id="budget_file" type="file">

		          <p class="help-block">Upload your cvs file here.</p>
		        </div>
		        </div>

		      <!-- /.box-body -->

		      <div class="box-footer">
		        <button name="upload" type="submit"  class="btn btn-primary">Submit</button>
		        <a href="<?= base_url(); ?>/assets/downloads/budget_template.csv" download class="btn pull-right btn-success">Download CVS template
		        </a>
		      </div>
		    </form>
	  </div>
	</div>
	<div class="col-xs-6">
	<div class="box box-primary">
	    <div class="box-header with-border">
	      <h3 class="box-title">Download Prcie List & Item List</h3>
	    </div>
	    <!-- /.box-header -->
	    <!-- form start -->
	    <form role="form" action="<?= base_url(); ?>/Project/budget_change/<?= $project_id;?>" method="post">
	      <div class="box-body">
	        <div class="form-group">
	          <label for="exampleInputFile">Price List</label>
	          <select name="price_list_id" class="sellect2" style="width:100%;">
	          	<?php
	          		foreach ($price_lists as $price) {
	          			echo '<option value="'.$price->id.'"> '.$price->name.' </option>';
	          		}
	          	?>
	          <select>
	        </div>
	      </div>

	      <!-- /.box-body -->

	      <div class="box-footer">
	        <button name="download_price_list" type="submit"  class="btn btn-primary">Download Price List</button>
	        <a href="<?= base_url(); ?>/Project/get_item_list_cvs" taget="_blank" class="btn pull-right btn-success">Download Item List
	        </a>
	      </div>
	    </form>
	  </div>
	</div>
</div>
