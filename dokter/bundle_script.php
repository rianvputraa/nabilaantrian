    <!-- Jquery Core Js -->
    <script src="../aset/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery 2.1.4 -->
    <script src="../aset/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../aset/bootstrap/js/bootstrap.min.js"></script>
    <!-- Waves Effect Plugin Js -->
    <script src="../aset/plugins/node-waves/waves.js"></script>
    <!-- DataTables -->
    <script src="../aset/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../aset/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="../aset/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- SweetAlert Plugin Js -->
    <script src="../aset/plugins/sweetalert/sweetalert.min.js"></script>
    <!-- FastClick -->
    <script src="../aset/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../aset/dist/js/app.min.js"></script>
    <script src="../aset/validjs/validjs.js"></script>
    <!--Chart -->
    <script src="../aset/dist/js/Chart.js"></script>
    <script src="../aset/dist/js/Chart.min.js"></script>
	<!-- Daterange Picker -->
	<script src="../aset/plugins/daterangepicker/moment.min.js"></script>
	<script src="../aset/plugins/daterangepicker/daterangepicker.js"></script>
	<script src="../aset/plugins/select2/select2.full.min.js"></script>
	<script src="../aset/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
	<!-- iCheck -->
	<script src="../aset/plugins/iCheck/icheck.min.js"></script>
	<!-- Bootstrap WYSIHTML5 -->
    <script src="../aset/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
	<!-- page script -->
<script language="JavaScript" type="text/javascript">
//You should create the validator only after the definition of the HTML form
 var frmvalidator  = new Validator("modal_popup");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();

  frmvalidator.addValidation("no_pasien","dontselect=0","Anda belum memilih Nomor Pasien");
  frmvalidator.addValidation("nama_dokter","dontselect=0","Anda belum memilih Nama Dokter");
</script>
</script>
   <script>
  $(document).ready(function(){
  $('#pegawai').on('submit',function(e) {
  $.ajax({
      url:'pegawai_add.php', 
      data:$(this).serialize(),
      type:'POST',
      success:function(data){
        console.log(data);
	    swal("Success!", "Data Berhasil Disimpan!");
		window.location.href = 'index.php?data-pegawai'
	  },
      error:function(data){
	    swal("Oops...", "Something went wrong :(", "error");
      }
    });
    e.preventDefault(); 
  });
});
</script>
<script>
        jQuery(document).ready(function($){
            $('.delete-link').on('click',function(){
                var getLink = $(this).attr('href');
                swal({
                        title: "PERHATIAN !",
						text: "Anda yakin akan menghapus data ?",
						type: "warning",
                        html: true,
                        confirmButtonColor: '#DD6B55',
						confirmButtonText: 'Hapus',
					    showCancelButton: true,
						cancelButtonText: 'Jangan',
						closeOnConfirm: true
                        },function(){
						swal("Deleted!", "Your imaginary file has been deleted!", "success");
					    window.location.href = getLink
					})
                return false;
            });
        });
    </script>
    <script>
        jQuery(document).ready(function($){
            $('.reset-history').on('click',function(){
                var getLink = $(this).attr('href');
                swal({
                        title: "PERHATIAN !",
						text: "Anda yakin akan mereset History ?",
						type: "warning",
                        html: true,
                        confirmButtonColor: '#DD6B55',
						confirmButtonText: 'Hapus',
					    showCancelButton: true,
						cancelButtonText: 'Jangan',
						closeOnConfirm: true
                        },function(){
						swal("Deleted!", "Your imaginary file has been deleted!", "success");
					    window.location.href = getLink
					})
                return false;
            });
        });
    </script>
</script>
    <script>
      $(function () {
		// Daterange Picker
		$('#Tanggal').daterangepicker({
			singleDatePicker: true,
			showDropdowns: true,
			format: 'YYYY-MM-DD'
		});

		  // Data Table
        $("#data").dataTable({
			scrollX: true
		});
      });
    </script>

	<!-- Date Time Picker -->
	<script>
		$(function (){
			$('#Jam_Mulai').datetimepicker({
				format: 'HH:mm'
			});

			$('#Jam_Selesai').datetimepicker({
				format: 'HH:mm'
			});
		});
	</script>

	

	<!-- Javascript Delete -->
	<script>
		function confirm_delete(delete_url){
			$("#modal_delete").modal('show', {backdrop: 'static'});
			document.getElementById('delete_link').setAttribute('href', delete_url);
		}
	</script>
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
	<script>
		  $(function () {
    //Enable iCheck plugin for checkboxes
    //iCheck for checkbox and radio inputs
    $('.mailbox-messages input[type="checkbox"]').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });

    //Enable check and uncheck all functionality
    $(".checkbox-toggle").click(function () {
      var clicks = $(this).data('clicks');
      if (clicks) {
        //Uncheck all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
        $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
      } else {
        //Check all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("check");
        $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
      }
      $(this).data("clicks", !clicks);
    });

    //Handle starring for glyphicon and font awesome
    $(".mailbox-star").click(function (e) {
      e.preventDefault();
      //detect type
      var $this = $(this).find("a > i");
      var glyph = $this.hasClass("glyphicon");
      var fa = $this.hasClass("fa");

      //Switch states
      if (glyph) {
        $this.toggleClass("glyphicon-star");
        $this.toggleClass("glyphicon-star-empty");
      }

      if (fa) {
        $this.toggleClass("fa-star");
        $this.toggleClass("fa-star-o");
      }
    });
  });
    </script>
    <script>
  $(function () {
    //Add text editor
    $("#compose-textarea").wysihtml5();
  });
</script>