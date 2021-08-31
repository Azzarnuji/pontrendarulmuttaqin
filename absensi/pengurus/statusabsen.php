<?php
session_start();
require_once '../core/Init.php';
$app = new pengurus_db;
$data = $app->getDataAbsen();
if ($_SESSION['login']!="Logged"){
    header("Location:../");
}
?>

<section>
    <div class="container table-responsive">
        <h2 class="text-center">Absensi</h2>
        <table class="table table-bordered align-middle" width="100%" id="dataTable" cellspacing="0">
        <a href="index.php" class="btn btn-primary mb-3" id="btnAbsen">Absen</a>
            
                <thead>
                        <tr>
                        <th>No</th>
                        <th>Kobong</th>
                        <th>Tanggal Absen</th>
                        <th>Status Ngaji</th>
                        <th>Nama Yang Tidak Ngaji</th>
                        <th>Waktu Ngaji</th>
                        <th>Deskripsi</th> 
                        <th>Jenis Kelamin</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Kobong</th>
                        <th>Tanggal Absen</th>
                        <th>Status Ngaji</th>
                        <th>Nama Yang Tidak Ngaji</th>
                        <th>Waktu Ngaji</th>
                        <th>Deskripsi</th> 
                        <th>Jenis Kelamin</th>
                    </tr>
                </tfoot>
                <?php 

                $NO = 1;
                ?>
                <?php foreach ($data as $absen):?>
                <tbody>
                    <tr>
                        <td><?=$NO++;?></td>
                        <td><?=$absen['owner_id_kobong'];?></td>
                        <td><?=$absen['tanggal_absen'];?></td>
                        <td><?=$absen['status_ngaji'];?></td>
                        <td><?=$absen['nama_yang_tidak_ngaji'];?></td>
                        <td><?=$absen['waktu_ngaji'];?></td>
                        <td><?=$absen['deskripsi'];?></td>
                        <td><p class="text-break"><?=$absen['jenis_kelamin'];?></p></td>
                    </tr>
                </tbody>
                <?php endforeach;?>
        </table>

    </div>

</section>