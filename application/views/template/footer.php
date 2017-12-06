
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Get support from <a href="mailto:ìnfo@sandhooraholdings.lk?cc=ranjan@sandhooraholdings.lk&amp;subject=Regarding%20Sandhoora%20Homes"><i class="fa fa-fw fa-envelope"></i></span> info@sandhooraholdings.lk</a>
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2017 <a href="#">Sandhooraholdings</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                    <span class="label label-danger pull-right">70%</span>
                  </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>/assets/js/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>/assets/js/bootstrap.min.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url(); ?>/assets/js/bootstrap-datepicker.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>/assets/js/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>/assets/js/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>/assets/js/adminlte.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>/assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/dataTables.bootstrap.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url(); ?>/assets/js/select2.full.min.js"></script>
<!-- Page script -->
<script>
  $(document).ready(function () {

    //Date picker
    $('#project_new_datepicker').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true
    })
    $('#project_new_datepicker1').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true
    })
    $('#po_datepicker').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true
    })


    $('.select2').select2();
    <?php
    if(isset($data_tables))
    {
      foreach ($data_tables as $data_table) {
        echo "$('#".$data_table."').DataTable(";
        // echo "'paging'      : true,";
        // echo "'lengthChange'      : false,";
        // echo "'searching'      : true,";
        // echo "'ordering'      : true,";
        // echo "'info'      : true,";
        // echo "'autoWidth'      : false";
        echo ");\n";
      }
    }
      ?>

  })
</script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>
