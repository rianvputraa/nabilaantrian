     
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          
          <div class="row">
            <div class="col-lg-12 col-xs-6">
               <form name="modal_popup" enctype="multipart/form-data" method="post"></form>
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <?php
                       $sql=mysqli_query($konek, "select * from tbl_dokter");
                       $count  = mysqli_num_rows($sql);
                       echo " <h3><b>$count</b></h3>";
                     ?>
                  <p>Jumlah Dokter</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="pegawai.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            

            </section>
            <!-- right col -->
          </div>
          <!-- /.row (main row) -->

        </section>
        <!-- /.content -->
    </div><!-- ./wrapper -->
