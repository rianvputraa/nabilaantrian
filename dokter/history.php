      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          History
          </h1>
          <ol class="breadcrumb">
            <li><i class="fa fa-users"></i> History</li>
          </ol>
        </section>
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                </div><!-- /.box-header -->
                <div class="box-body">
                 <a href="history_reset.php" class ="reset-history"><button class="btn btn-danger" type="reset"><i class="fa fa-minus"></i>  Reset</button></a>
                  <br></br>
				  <table id="data" class="table table-bordered table-striped table-scalable">
						<?php
							include "dt_history.php";
						?>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

        <?php

        $cari_kd=mysqli_query($konek, "select max(id_pendaftaran)as kode from tbl_pendaftaran"); //mencari kode yang paling besar atau kode yang baru masuk
        $tm_cari=mysqli_fetch_array($cari_kd);
        $kode=substr($tm_cari['kode'],1,4); //mengambil string mulai dari karakter pertama 'A' dan mengambil 4 karakter setelahnya.
        $tambah=$kode+1; //kode yang sudah di pecah di tambah 1
        	if($tambah<10){ //jika kode lebih kecil dari 10 (9,8,7,6 dst) maka
            $id="P000".$tambah;
            }else{
            $id="P00".$tambah;
            }
?>
<?php
        $cari_dft=mysqli_query($konek, "select max(no_pendaftaran)as kode from tbl_pendaftaran"); //mencari kode yang paling besar atau kode yang baru masuk
        $tm_cari=mysqli_fetch_array($cari_dft);
         //mengambil string mulai dari karakter pertama 'A' dan mengambil 4 karakter setelahnya.
        $tambah = ($kode = $tm_cari['kode'] + 1); //kode yang sudah di pecah di tambah 1
        	if($tambah<10){ //jika kode lebih kecil dari 10 (9,8,7,6 dst) maka
            $no_daftar="".$tambah;
            }else{
            $no_daftar="0".$tambah;
            }
        ?>

		<!-- Modal Popup Pasien -->
		<div id="ModalAdd" class="modal animated bounceIn" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Tambah Pendaftaran</h4>
					</div>
					<div class="modal-body">
						<form action="pendaftaran_add.php" name="modal_popup" enctype="multipart/form-data" method="post">
						<div class="form-group">
								<label>Id Pendaftaran</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-id-card"></i>
										</div>
										<input name="id_pendaftaran" type="text" class="form-control" value="<?php echo $id;?>" readonly/>
									</div>
							</div>
							<div class="form-group">
								<label>No Pendaftaran</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-id-card"></i>
										</div>
										<input name="no_pendaftaran" type="text" class="form-control" value="<?php echo $no_daftar;?>" readonly/>
									</div>
							</div>
							<div class="form-group">
								<label>Nomor Pasien</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-id-card"></i>
										</div>
                   							 <?php

                                 $result  = mysqli_query($konek, "select * from tbl_pasien");
                                 $jsArray = "var prdName = new Array(); 
                                 ";
                                 $jsArray2 = "var prd2Name = new Array(); 
                                 ";

                                 ?>



                                 <select name="no_pasien" class="form-control" onchange="document.getElementById('prd_name').value = prdName[this.value],document.getElementById('prd2_name').value = prd2Name[this.value]">

                                 <option>-- Nomor Pasien Klinik --</option>

                                 <?php

                                 while ($row = mysqli_fetch_array($result)) {

                                   echo '

                                   <option value = "' . $row['no_pasien'] . '">' . $row['no_pasien'] . '</option>';

                                   $jsArray .= "prdName['" . $row['no_pasien'] . "'] = '" . addslashes($row['nama_pasien']) . "';
                                   ";
                                   $jsArray2 .= "prd2Name['" . $row['no_pasien'] . "'] = '" . addslashes($row['alamat']) . "';
                                   ";
                                      }
                                    
                                      echo '

                                      </select>

                                      ';

                                      ?>
							</div>
							<div class="form-group">
								<label>Nama Pasien</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-id-card"></i>
										</div>
                   							<input type="text" class="form-control" name="nama_pasien" id="prd_name" readonly>
                                <script>

                                <?php echo $jsArray; ?>

                                </script>
									</div>
							</div>
             <div class="form-group">
                <label>Alamat</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                                <input type="text" class="form-control" name="alamat" id="prd2_name" readonly>
                                <script>

                                <?php echo $jsArray2; ?>

                                </script>
                  </div>
              </div>
            	<div class="form-group">
                <label>Ruangan</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                                 <?php

                                 $result  = mysqli_query($konek, "select * from tbl_ruangan");
                                 $jsArray1 = "var dktName = new Array(); 
                                 ";
                                 $jsArray2 = "var poliklinikName = new Array(); 
                                 ";

                                 ?>



                                 <select name="counter" class="form-control" onchange="document.getElementById('dkt_name').value = dktName[this.value],document.getElementById('poliklinik_name').value = poliklinikName[this.value]">

                                 <option>-- Nomor Pasien Klinik --</option>

                                 <?php

                                 while ($row = mysqli_fetch_array($result)) {

                                   echo '

                                   <option value = "' . $row['id_ruangan'] . '">' . $row['id_ruangan'] . '</option>';

                                   $jsArray1 .= "dktName['" . $row['id_ruangan'] . "'] = '" . addslashes($row['nama_dokter']) . "';
                                   ";

                                   $jsArray2 .= "poliklinikName['" . $row['id_ruangan'] . "'] = '" . addslashes($row['nama_poliklinik']) . "';
                                   ";
                                      }

                                      echo '

                                      </select>

                                      ';

                                      ?>
              </div>
              <div class="form-group">
                <label>Nama Dokter</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                                <input type="text" class="form-control" name="nama_dokter" id="dkt_name" readonly>
                                <script>

                                <?php echo $jsArray1; ?>

                                </script>
                  </div>
              </div>
              <div class="form-group">
                <label>poliklinik</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                                <input type="text" class="form-control" name="poliklinik" id="poliklinik_name" readonly>
                                <script>

                                <?php echo $jsArray2; ?>

                                </script>
                  </div>
              </div>
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