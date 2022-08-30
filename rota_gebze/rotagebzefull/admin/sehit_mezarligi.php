<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<?php
session_start();
if($_SESSION["ad"]=="")
{
  header("location:../login/panelgiris.php");//bu doğru olan
}
?>

<?php 
include "navbar_sol.php" ;
include "../login/baglanti.php";?>
<div class="content-wrapper">
  <h3 class="page-heading mb-4">Şehit Mezarlığı</h3>
  <div class="row mb-2">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <form action="ara_mezar.php" method="POST">
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" name="s" id="s" placeholder="Search">
                    <button class="btn btn-success" style=" background:blue;" type="submit">ARA</button>
                  </div>
                </form>
                <div class="table-responsive">
                  
</div>

<div class="card-deck">
        <div class="card col-lg-12 px-0 mb-4">
          <div class="card-body">
            <a href="ekle_mezar.php" ><i class="fa-solid fa-plus ekleme"></i></a>
            <h5 class="card-title"></h5>
            <div class="table-responsive">
              <table class="table center-aligned-table">
                <thead>
                  <tr class="text-primary">
                    <th>Fotoğraf</th>
                    <th>Başlık</th>
                    <th>Açıklama</th>
                    <th>İşlem </th>
                    
                    
                    
                  </tr>
                </thead>
                <tbody>
                <?php

$sorgu = $conn->query("SELECT * FROM tarihi_cami"); // Makale tablosundaki tüm verileri çekiyoruz.

while ($sonuc = $sorgu->fetch_assoc()) {

    $id = $sonuc['id']; // Veritabanından çektiğimiz id satırını $id olarak tanımlıyoruz.
    $foto = $sonuc['foto'];
    $baslik = $sonuc['baslik'];
    $icerik = $sonuc['icerik'];

// While döngüsü ile verileri sıralayacağız. Burada PHP tagını kapatarak tırnaklarla uğraşmadan tekrarlatabiliriz. 
    ?>
                    <tr>
            <!-- <td><?php echo $id; // Yukarıda tanıttığımız gibi alanları dolduruyoruz. ?></td> -->
            <td><img width="150px" src="images/<?php echo $foto; ?>" style="height:90px;" alt=""></td>
            <td><?php echo $baslik; ?></td>
            <td><?php echo $icerik; ?></td>
            <td><span><a href="duzenle_mezar.php?id=<?php echo $id; ?>" ><i class="fa-solid fa-pen-to-square ikon"></i></a></span>
            <span><a href="sil_mezar.php?id=<?php echo $id; ?>" ><i class="fa-solid fa-trash-can ikon" ></i></a></span></td>
        </tr>

    <?php } // Tekrarlanacak kısım bittikten sonra PHP tagının içinde while döngüsünü süslü parantezi kapatarak sonlandırıyoruz. ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
<!-- ############################################################## -->
<!-- Veritabanına eklenmiş verileri sıralamak için önce üst kısmı hazırlayalım. -->

              </div>
            </div>
<hr>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>




<?php include "footer.php"; ?>