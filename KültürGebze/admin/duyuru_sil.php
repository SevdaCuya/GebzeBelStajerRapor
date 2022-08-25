<?php
session_start();
if($_SESSION["ad"]=="" || $_SESSION["soyad"]=="")
{
  header("location:../login/panelgiris.php");
}
?>

<?php

include "../login/baglanti.php";

if (isset($_POST['submit'])){

$duyuru_sil_id = htmlentities($_POST['duyuru_sil_id'], ENT_QUOTES, 'UTF-8'); //post içinde input name göre yazılacak


if (!isset($duyuru_sil_id)) {

  echo "<script>alert('boş alanları doldurun')</script>";
} else {

   // $sil = "DELETE FROM `kategoriler` WHERE id='".$kategori_id."'";

      $sil = "DELETE FROM duyurular WHERE id='$duyuru_sil_id'";

      $sonuc = mysqli_query($conn, $sil);

  if ($sonuc) {
    echo "<script>alert('duyuru silindi')</script>";
  } else {
    
    echo "<script>alert('veri tabanından silinirken hata oluştu')</script>";
  }
}
}
?>


<?php include "navbar_sol.php"; ?>



<div class="content-wrapper">
  <h3 class="page-heading mb-4">Duyuru İşlemleri</h3>
  <div class="row mb-2">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title mb-4">Duyuru Sil</h5>

                <div class="table-responsive">

                  <form class="forms-sample" action="duyuru_sil.php" method="POST">

                    <div class="form-group">
                      <label for="etkinlikbasligi">Duyuru ID Giriniz</label>
                      <input type="text" class="form-control p-input" name="duyuru_sil_id" id="duyurubasligi" aria-describedby="emailHelp">
                    </div>


                    <div class="form-group">
                      <button type="submit" name="submit" class="btn btn-primary">Sil</button>
                    </div>

                  </form>

                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php include "footer.php"; ?>


