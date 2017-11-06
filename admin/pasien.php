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
        <div class="box">
          <div class="box-header">
          </div><!-- /.box-header -->
          <div class="box-body">
  <a href="#"><button class="btn btn-success" type="button" data-target="#ModalAdd" data-toggle="modal"><i class="fa fa-plus"></i> Add</button></a>
            <br></br>
    <table id="data" class="table table-bordered table-striped table-scalable">
      <?php
        include "dt_pasien.php";
      ?>
            </table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </section><!-- /.content -->

  <?php

  $cari_kd=mysqli_query($konek, "select max(no_pasien)as kode from tbl_pasien"); //mencari kode yang paling besar atau kode yang baru masuk
  $tm_cari=mysqli_fetch_array($cari_kd);
  $kode=substr($tm_cari['kode'],1,4); //mengambil string mulai dari karakter pertama 'A' dan mengambil 4 karakter setelahnya.
  $tambah=$kode+1; //kode yang sudah di pecah di tambah 1
    if($tambah<10){ //jika kode lebih kecil dari 10 (9,8,7,6 dst) maka
      $id="N000".$tambah;
      }else{
      $id="N00".$tambah;
      }
  ?>

<!-- Modal Popup Pasien -->
<div id="ModalAdd" class="modal animated bounceIn" tabindex="-1" role="dialog">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title">Tambah Pasien</h4>
    </div>
    <div class="modal-body">
      <form action="pasien_add.php" name="modal_popup" enctype="multipart/form-data" method="post">
      <div class="form-group">
          <label>Nomor Pasien</label>
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-id-card"></i>
              </div>
              <input name="no_pasien" type="text" class="form-control" value="<?php echo $id;?>" readonly/>
            </div>
        </div>
        <div class="form-group">
          <label>Nama Pasien</label>
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-id-card"></i>
              </div>
              <input name="nama_pasien" type="text" class="form-control" placeholder="Nama Pasien" required/>
            </div>
        </div>
        <div class="form-group">
          <label>Alamat Pasien</label>
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-user"></i>
              </div>
              <input name="alamat" type="text" class="form-control" placeholder="Alamat Pasien" required/>
            </div>
        </div>
        <div class="form-group">
          <label>Dokter</label>
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-id-card"></i>
              </div>
                           <?php

                           $result  = mysqli_query($konek, "select * from tbl_dokter");
                           $jsArray = "var poliklinikName = new Array();
                           ";

                           ?>



                           <select name="nama_dokter" class="form-control" onchange="document.getElementById('poliklinik_name').value = poliklinikName[this.value]">

                           <option value="0" selected>-- Nama Dokter --</option>

                           <?php

                           while ($row = mysqli_fetch_array($result)) {

                             echo '

                             <option value = "' . $row['nama_dokter'] . '">' . $row['nama_dokter'] . '</option>';

                             $jsArray .= "poliklinikName['" . $row['nama_dokter'] . "'] = '" . addslashes($row['poliklinik']) . "';
                             ";
                                }

                                echo '

                                </select>

                                ';

                                ?>
        </div>
        <div class="form-group">
          <label>poliklinik</label>
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-id-card"></i>
              </div>
                          <input type="text" class="form-control" name="poliklinik" id="poliklinik_name" readonly>
                          <script>

                          <?php echo $jsArray; ?>

                          </script>
            </div>
        </div>
       <div id="modal_popup_errorloc" style="text-align: center; margin: 0; color: red;">
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
