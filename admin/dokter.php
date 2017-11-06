        <?php
        $cari_dft=mysqli_query($konek, "select max(client)as kode from client_antrian"); //mencari kode yang paling besar atau kode yang baru masuk
        $tm_cari=mysqli_fetch_array($cari_dft);
         //mengambil string mulai dari karakter pertama 'A' dan mengambil 4 karakter setelahnya.
        $tambah = ($kode = $tm_cari['kode'] + 1); //kode yang sudah di pecah di tambah 1
        	if($tambah<10){ //jika kode lebih kecil dari 10 (9,8,7,6 dst) maka
            $no_ruangan="".$tambah;
            }else{
            $no_ruangan="0".$tambah;
            }
        ?>
        <?php
        $cari_dft=mysqli_query($konek, "select max(id_user)as kode from tbl_user"); //mencari kode yang paling besar atau kode yang baru masuk
        $tm_cari=mysqli_fetch_array($cari_dft);
         //mengambil string mulai dari karakter pertama 'A' dan mengambil 4 karakter setelahnya.
        $tambah = ($kode = $tm_cari['kode'] + 1); //kode yang sudah di pecah di tambah 1
        	if($tambah<10){ //jika kode lebih kecil dari 10 (9,8,7,6 dst) maka
            $id_dokter="".$tambah;
            }else{
            $id_dokter="0".$tambah;
            }
        ?>


      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          Data Dokter dan Admin
          </h1>
          <ol class="breadcrumb">
            <li><i class="fa fa-users"></i> Data Dokter</li>
          </ol>
        </section>
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                </div><!-- /.box-header -->
                <div class="box-body">
				<a href="#"><button class="btn btn-success" type="button" data-target="#ModalAdd" data-toggle="modal"><i class="fa fa-plus"></i>  Add Dokter</button></a>
				<a href="user_admin.php"><button class="btn btn-success" type="button" data-target="#ModalAdd" data-toggle="modal"><i class="fa fa-plus"></i>  Add Admin</button></a>
                  <br></br>
				  <table id="data" class="table table-bordered table-striped table-scalable">
						<?php
							include "dt_dokter.php";
						?>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
             <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                </div><!-- /.box-header -->
                <div class="box-body">
				
                  <br></br>
				  <table id="data" class="table table-bordered table-striped table-scalable">
						<?php
							include "dt_admin.php";
						?>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

		<!-- Modal Popup Dokter -->
		<div id="ModalAdd" class="modal animated bounceIn" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Tambah Dokter</h4>
					</div>
					<div class="modal-body">
						<form action="dokter_add.php" name="modal_popup" enctype="multipart/form-data" method="post">
						<div class="form-group">
								<label>Nama Dokter</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-id-card"></i>
										</div>
										<input name="nama_dokter" type="text" class="form-control" required/>
									</div>
							</div>
							<div class="form-group">
								<label>Poliklinik</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-id-card"></i>
										</div>
										<input name="poliklinik" type="text" class="form-control" required/>
									</div>
							</div>
							<div class="form-group">
								<label>Ruangan</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-id-card"></i>
										</div>
										<input name="ruangan" type="text" class="form-control" value="<?php echo $no_ruangan;?>" readonly/>
									</div>
							</div>
							<div class="form-group">
								<label>Username</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-id-card"></i>
										</div>
										<input name="username" type="text" class="form-control" required/>
									</div>
							</div>
							<div class="form-group">
								<label>Password</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-id-card"></i>
										</div>
										<input name="password" type="password" class="form-control" required/>
									</div>
							</div>
							<div class="form-group">
								<label>Hak Akses</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-id-card"></i>
										</div>
										<input name="akses" type="text" class="form-control" value="dokter" readonly/>
									</div>
							</div>
							<div id="modal_popup_errorloc" style="text-align: center; margin: 0; color: red;">
							<div class="modal-footer">
								<button class="btn btn-success" type="submit">
									Add
								</button>
								<button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
									Cancel
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal Popup Pasien Edit -->
		<div id="ModalEditPasien" class="modal fade" tabindex="-1" role="dialog"></div>

    </div><!-- /.content-wrapper -->
    </div><!-- ./wrapper -->
