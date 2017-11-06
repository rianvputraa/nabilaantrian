
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
      <div class="row">
        <div class="col-lg-12 col-sm-3">
          <form action="pendaftaran_add.php" name="modal_popup" enctype="multipart/form-data" method="post"></form>
         <!-- BAR CHART -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Data Pasien</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="line-chartcanvas"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="row dokter">
        </div>
          </div>
          <!-- /.box -->

        </div>
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->

        <!-- Main content -->
    <section class="content">
          <!-- Small boxes (Stat box) -->
       <div class="row">
            <div class="col-lg-12 col-xs-6">
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
                <a href="index.php?data-dokter" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>

              <?php 

              $dokterquery = mysqli_query ($konek, "SELECT count(no_pasien) as jumlah, nama_dokter, poliklinik FROM tbl_pasien GROUP BY nama_dokter");

              if($dokterquery == false){
              die ("Terjadi Kesalahan : ". mysqli_error($konek));
            }

            while ($data = mysqli_fetch_array ($dokterquery)){

              echo " 
                    <div class='col-lg-4 col-xs-6'>
                    <div class='small-box bg-aqua'>
                    <div class='inner'>
                    <h3><b>$data[jumlah]</b></h3>
                    <p>Jumlah Pasien $data[nama_dokter]</p>
                      </div>
                       <div class='icon'>
                        <i class='ion ion-bag'></i>
                                  </div>
                              <a href='index.php?data-pasien' class='small-box-footer'>More info <i class='fa fa-arrow-circle-right'></i></a>
                          </div>
                    </div>";
                }                  
              ?>



            </div>
            
            </div>


            </section>
            <!-- right col -->
          </div>
          <!-- /.row (main row) -->

        </section>
        <!-- /.content -->
    </div><!-- ./wrapper -->