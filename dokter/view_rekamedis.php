<?php

ob_start();
session_start();
if(isset($_SESSION['akun_id']));
include "../koneksi.php";

$no_pasien  = $_GET["no_pasien"];

$queryrmedis = mysqli_query($konek, "SELECT * FROM tbl_rekamedis WHERE no_pasien='$no_pasien' GROUP BY nama_pasien");
if($queryrmedis == false){
  die ("Terjadi Kesalahan : ". mysqli_error($konek));
}
while($rmedis = mysqli_fetch_array($queryrmedis)){

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Work Schedule</title>
  <?php
    include "bundle_css.php";
  ?>
  </head>

  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-box-body">
        <form name="modal_popup" enctype="multipart/form-data" method="post"></form>
        <b><h2 class="login-box-msg">Data Rekamedis</h2></b>
        <form action="rmedis_edit.php" method="post">
          <div class="form-group has-feedback">
        <input type="text" name="nama_dokter" class="form-control" value="<?php echo $rmedis["no_pasien"]; ?>" readonly>
        <span class="form-control-feedback"><i class="fa fa-user"></i></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" name="nama_dokter" class="form-control" value="<?php echo $rmedis["nama_pasien"]; ?>" readonly>
        <span class="form-control-feedback"><i class="fa fa-user"></i></span>
      </div>
      <div class="form-group">
          <label>Tanggal Data</label>
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-id-card"></i>
              </div>
                           <?php

                           $result  = mysqli_query($konek, "select id_rekamedis, no_pasien, nama_pasien, alamat, diagnosis, waktu, DAYNAME(waktu) as hari, DAY(waktu) as tgl, MONTHNAME(waktu) as bulan, YEAR(waktu) as tahun from tbl_rekamedis where no_pasien='$no_pasien'");

                           $Array = "var diagName = new Array();
                           ";

                           ?>

                           <select name="waktu" class="form-control" onchange="changeValue(this.value)">

                           <option>-- Tanggal Data --</option>

                           <?php

                           while ($row = mysqli_fetch_array($result)) {

                             echo '

                             <option value = "' . $row['waktu'] . '">' . $row['tgl'] . ' ' . $row['bulan'] . ' ' . $row['tahun'] . '</option>';

                             $Array .= "diagName['" . $row['waktu'] . "'] = { name: '" . addslashes($row['diagnosis']) . "'};
                             ";
                                }

                                echo '

                                </select>

                                ';

                                ?>
        </div>
        <div class="form-group">
          <label>Diagnosis</label>
            <div class="input-group">
              </div>
                   <textarea id="diagName" type="text" style="width: 100%; height: 150px; font-size: 14px; line-height: 18px; border: none; padding: 10px;" readonly></textarea>
                   <script>
                    <?php echo $Array; ?>
                    function changeValue(id){
                      document.getElementById('diagName').value = diagName[id].name;
                    };
                   </script>
            </div>
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label></label>
              <a href="index.php?rekamedis"><button type="button" class="btn btn-block btn-danger"><i class="fa fa-remove"></i> Back</button></a>
          </div>
        </div><!-- /.col -->
      </div>
    </form>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
  <?php
    include "bundle_script.php";
  ?>
  </body>
</html>
<?php
      }

?>
