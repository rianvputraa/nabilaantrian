<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
		Data user
		</h1>
		<ol class="breadcrumb">
			<li><i class="fa fa-users"></i> user</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
					</div><!-- /.box-header -->
					<div class="box-body">
	<a href="#"><button class="btn btn-success" type="button" data-target="#ModalAdd" data-toggle="modal"><i class="fa fa-plus"></i> Add</button></a>
						<br></br>
		<table id="data" class="table table-bordered table-striped table-scalable">
			<?php
				include "dt_user.php";
			?>
						</table>
					</div><!-- /.box-body -->
				</div><!-- /.box -->
			</div><!-- /.col -->
		</div><!-- /.row -->
	</section><!-- /.content -->

<!-- Modal Popup user -->
<div id="ModalAdd" class="modal animated bounceIn" tabindex="-1" role="dialog">
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title">Tambah user</h4>
		</div>
		<div class="modal-body">
			<form action="user_add.php" name="modal_popup" enctype="multipart/form-data" method="post">
			<div class="form-group">
					<label>Nomor user</label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-id-card"></i>
							</div>
							<input name="no_user" type="text" class="form-control" placeholder="Nomor user"/>
						</div>
				</div>
				<div class="form-group">
					<label>Nama user</label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-id-card"></i>
							</div>
							<input name="nama_user" type="text" class="form-control" placeholder="Nama user"/>
						</div>
				</div>
				<div class="form-group">
					<label>Alamat user</label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-user"></i>
							</div>
							<input name="alamat" type="text" class="form-control" placeholder="Alamat user"/>
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

<!-- Modal Popup user Edit -->
<div id="ModalEditUser" class="modal fade" tabindex="-1" role="dialog"></div>

</div><!-- /.content-wrapper -->
</div><!-- ./wrapper -->

<!-- Javascript Edit-->
<script type="text/javascript">
$(document).ready(function () {

// user
$(".open_modal").click(function(e) {
var m = $(this).attr("id");
	$.ajax({
		url: "user_modal_edit.php",
		type: "GET",
		data : {id_user: m,},
		success: function (ajaxData){
		$("#ModalEditUser").html(ajaxData);
		$("#ModalEditUser").modal('show',{backdrop: 'true'});
		}
	});
});

</script>
