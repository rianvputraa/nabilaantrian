      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          Data Pasien
          </h1>
          <ol class="breadcrumb">
            <li><i class="fa fa-users"></i> Pasien</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <form name="modal_popup" enctype="multipart/form-data" method="post"></form>
              <div class="box">
                <div class="box-header">
                </div><!-- /.box-header -->
                <div class="box-body">
				  <table id="data" class="table table-bordered sPdfMessage table-striped table-scalable TablePasien">
						<?php
							include "dt_pasien.php";
						?>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
   	 </div><!-- /.content-wrapper -->
    </div><!-- ./wrapper -->

    <!-- Javascript Edit-->
	<script type="text/javascript">
		
	</script>
