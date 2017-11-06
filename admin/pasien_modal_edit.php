<?php

include "../koneksi.php";

$id_pasien	= $_GET["id_pasien"];

$queryspl = mysqli_query($konek, "SELECT * FROM tbl_pasien WHERE id_pasien='$id_pasien'");
if($queryspl == false){
	die ("Terjadi Kesalahan : ". mysqli_error($konek));
}
while($spl = mysqli_fetch_array($queryspl)){

?>
	
	<script src="../aset/plugins/daterangepicker/moment.min.js"></script>
	<script src="../aset/plugins/daterangepicker/daterangepicker.js"></script>
	<!-- page script -->
    <script>
      $(function () {	
		// Daterange Picker
		  $('#Tanggal_Lahir2').daterangepicker({
			  singleDatePicker: true,
			  showDropdowns: true,
			  format: 'YYYY-MM-DD'
		  });
      });
    </script>
<!-- Modal Popup Dosen -->
			<div class="modal-dialog animated bounceIn">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Edit Pasien</h4>
					</div>
					<div class="modal-body">
						<form action="pasien_edit.php" name="modal_popup" enctype="multipart/form-data" method="post">
						<div class="form-group">
								<label>Nomor Pasien</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-id-card"></i>
										</div>
										<input name="no_pasien" type="text" class="form-control" value="<?php echo $spl["no_pasien"]; ?>"/>
									</div>
							</div>
							<div class="form-group">
								<label>Nama Pasien</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-id-card"></i>
										</div>
										<input name="nama_pasien" type="text" class="form-control" value="<?php echo $spl["nama_pasien"]; ?>"/>
									</div>
							</div>
							<div class="form-group">
								<label>Alamat</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										<input name="alamat" type="text" class="form-control" value="<?php echo $spl["alamat"]; ?>"/>
									</div>
							</div>
							<div class="modal-footer">
								<button class="btn btn-success" type="submit">
									Save
								</button>
								<button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
									Cancel
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			
			
<?php
			}

?>