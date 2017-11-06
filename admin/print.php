<?php
/**
 * HTML2PDF Librairy - example
 *
 * HTML => PDF convertor
 * distributed under the LGPL License
 *
 * @author      Laurent MINGUET <webmaster@html2pdf.fr>
 *
 * isset($_GET['vuehtml']) is not mandatory
 * it allow to display the result in the HTML format
 */
    // get the HTML
    ob_start();
    session_start();
    if(isset($_SESSION['akun_id']));
    include "../koneksi.php";

     $no_pasien  = $_GET["no_pasien"];
     $num = 'CMD01-'.date('ymd');
     $nom = 'DUPONT Alphonse';
     $date = '01/01/2012';
     $querydokter = mysqli_query($konek, "SELECT * FROM tbl_pasien WHERE no_pasien='$no_pasien'");
if($querydokter == false){
    die ("Terjadi Kesalahan : ". mysqli_error($konek));
}
while($dokter = mysqli_fetch_array($querydokter)){
?>
<style type="text/css">
<!--
    div.zone { border: none; border-radius: 2mm; background: #D2527F; border-collapse: collapse; padding:6mm; font-size: 2.7mm;}
    h1 { padding: 0; margin: 0; color: #000; font-size: 7mm; text-align: center; }
    h2 { padding: 0; color: #fff; right: 0mm; top: 1mm; float: right; text-align: right; font-size: 5.8mm; position: absolute;}
    h3 { padding: 0; margin: 0; color: #fff; font-size: 1mm; position: relative; }
-->
</style>
<page format="90x55" orientation="L" backcolor="#D2527F" style="font: calibri;">
    <table style="width: 99%;border: none;" cellspacing="4mm" cellpadding="0">
        <tr>
            <td colspan="0" style="width: 100%">
                <div class="zone" style="height: 34mm;position: relative;font-size: 4mm;">
                    <div style="position: absolute; right: 3mm; top: 10mm; text-align: right; font-size: 4mm; ">
                    </div>
                    <div style="position: absolute; right: 5mm; bottom: 0mm; text-align: right; font-size: 4mm; color: #fff;">
                        <b><?php echo $dokter['nama_pasien']; ?></b><br>
                        <b><?php echo $dokter['no_pasien']; ?></b><br>
                        <b><?php echo $dokter['alamat']; ?></b><br>
                    </div>
                    <img src="logo.png" alt="logo" style="margin-top: 2mm; left: 5mm; width: 70mm; height: 10mm; position: absolute;">
                </div>
            </td>
        </tr>
    </table>
</page>
<?php
     $content = ob_get_clean();

    // convert
   require_once('../html2pdf/html2pdf.class.php');
    try
    {
        $html2pdf = new HTML2PDF('P', 'A5', 'en', true, 'UTF-8', 0);
        $html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('Kartu Pasien'.' '.$dokter['nama_pasien']. '.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
}
?>

