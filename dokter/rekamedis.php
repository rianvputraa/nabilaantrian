      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          Data Rekam Medis
          </h1>
          <ol class="breadcrumb">
            <li><i class="fa fa-users"></i> Data Rekam Medis</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                <a href="#"><button class="btn btn-success" type="button" data-target="#ModalAdd" data-toggle="modal"><i class="fa fa-plus"></i>  Add</button></a>
                </div><!-- /.box-header -->
                <div class="box-body">
				  <table id="data" class="table table-bordered table-striped table-scalable">
						<?php
							include "dt_rekamedis.php";
						?>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
   
		<!-- Modal Popup Pasien -->
		<div id="ModalAdd" class="modal animated bounceIn" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Tambah Data Rekamedis</h4>
					</div>
					<div class="modal-body">
						<form id="daftar" action="rekamedis_add.php" name="modal_popup" enctype="multipart/form-data" method="post">
              <div class="box-body">
          <div class="row">
            <div class="col-xs-6">
							<div class="form-group">
								<label>Nomor Pasien</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-id-card"></i>
										</div>
                   							 <?php

                                 $result  = mysqli_query($konek, "select * from tbl_pasien where nama_dokter = '$_SESSION[akun_nama]'");
                                 $jsArray = "var prdName = new Array(); 
                                 ";
                                 $jsArray2 = "var prd2Name = new Array(); 
                                 ";

                                 ?>



                                 <select name="no_pasien" class="form-control" onchange="document.getElementById('prd_name').value = prdName[this.value],document.getElementById('prd2_name').value = prd2Name[this.value]">

                                 <option value="0" selected>-- Nomor Pasien Klinik --</option>

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
            </div>
            <div class="col-xs-6">
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
                <label>Nama Dokter</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                               <input type="text" value="<?php echo "".$_SESSION["akun_nama"]."" ?>" class="form-control" name="nama_dokter" readonly>
                  </div>
               </div>
             </div>
              <div class="col-lg-12">
              <div class="form-group">
                <label>Diagnosis</label>
                              <textarea name="diagnosis" class="textarea" style="width: 100%; height: 150px; font-size: 14px; line-height: 18px; border: none; padding: 10px;" required></textarea>
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
            <div id="modal_popup_errorloc" style="text-align: center; margin: 0; color: red;">
              </div>
   	 </div><!-- /.content-wrapper -->
    </div><!-- ./wrapper -->

  