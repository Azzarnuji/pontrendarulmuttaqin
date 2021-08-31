<?php
session_start();
require_once '../core/Init.php';
$app = new pengurus_db;
$data = $app->getData();
if ($_SESSION['login']!="Logged"){
    header("Location:../");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Website Pontren Darul Muttaqin" />
        <meta name="author" content="Azzarnuji" />
        <title>Pontren Darul Muttaqin</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="https://pontrendarulmuttaqin.com/assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Aguafina+Script" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.css" integrity="sha256-yydPR4I9kVTwVawkyOisG2g5biRQnEpf2e4wWlidxZE=" crossorigin="anonymous">
        <link href="https://pontrendarulmuttaqin.com/css/styles.css" rel="stylesheet" />
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    </head>
    <style>
        html{
            margin-top: 0px;
            padding: 0px;
            margin-bottom: 2rem;
        }
        .text{
            color: #e2f517;
            font-family: Aguafina Script;
            font-size: 25px;
            text-align: justify;
            transform: translate(2px,6px);
        }
        .text2{
            
            /* font-family: Aguafina Script; */
            font-size: 20px;
            text-align: center;
            transform: translate(2px,6px);
        }
       
    </style>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <!-- <a class="navbar-brand" href="#page-top"><img src="assets/img/ponpes.svg" alt="..." /></a> -->
                <a href="https://pontrendarulmuttaqin.com/"><p class="text">Darul Muttaqin </p></a> 
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="https://pontrendarulmuttaqin.com/">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#portfolio">Gallery Pontren</a></li>
                        <li class="nav-item"><a class="nav-link" href="#about">Tentang Kami</a></li>
                        <li class="nav-item"><a class="nav-link" href="#team">Pendiri Pontren</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Hubungi Kami</a></li>
                        <li class="nav-item"><a class="nav-link" href="../request.php?request=logout">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Welcome To Pontren Darul Muttaqin</div>
                <div class="masthead-heading text-uppercase">Absensi Santri</div>
                <a class="btn btn-primary btn-xl text-uppercase" href="#absen" id="absen">Absen</a>
            </div>
        </header>
        <section id="scTable">
            <div class="container">
                <h2 class="text-center">Daftar Nama Anggota</h2>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <button type="button" class="btn btn-primary mb-3" style="margin-right: 4px;" id="btnInput">Tambah Anggota</button>
                <button type="button" class="btn btn-primary mb-3" id="btnAbsen">Absen</button>
                <button type="button" class="btn btn-primary mb-3" style="margin-left: 4px;" id="stsAbsen">Status Absen</button>
                    
                        <thead>
                                <tr>
                                <th>No</th>
                                <th>Nama Anggota</th>
                                <th>Kelas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Anggota</th>
                                <th>Kelas</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <?php 
    
                        $NO = 1;
                        ?>
                        <?php foreach ($data as $absen):?>
                        <tbody>
                            <tr>
                                <td><?=$NO++;?></td>
                                <td><?=$absen['nama_anggota'];?></td>
                                <td><?=$absen['kelas_anggota'];?></td>
                                <td><a href="../request.php?request=delete&id=<?=$absen['id_nama'];?>" class="btn btn-primary">Hapus</a></td>
                            </tr>
                        </tbody>
                        <?php endforeach;?>
                </table>
    
            </div>

        </section>
        
            <!-- Modal -->
            <div class="modal fade" id="absenModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Input Absen</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="mt-2" id="formLogin" action="../request.php?request=absen" method="POST">
                            <div class="container">
                                <h2 class="text-center">Input Absen</h2>
                                
                                <div class="mb-3">
                                    <label for="form-select">Status Ngaji</label>
                                    <select class="form-select" aria-label="Default select example" id="select_ngaji" name="status_ngaji" required>
                                        <option selected>Pilih Menu</option>
                                        <option>Ada Yang Tidak Ngaji</option>
                                        <option>Ngaji Semua</option>
                                    </select>
                                </div>
                                <div class="mb-3" id="tanggal">
                                    <label for="tanggal">Tanggal</label>
                                    <input type="text" class="form-control" name="tanggal" required/>
                                </div>
                                <div class="mb-3" id="nama">
                                    <label for="nama_anggota">Nama Anggota Yang Tidak Ngaji</label>
                                    <div id="emailHelp" class="form-text">*Contoh Input Lebih Dari 1 Orang:<br>Azzar,Udin,Asep </div>
                                    <input type="text" class="form-control" name="nama_anggota" required/>
                                </div>
                                <div class="mb-3" id="tidak_hadir_ngaji">
                                    <label for="exampleInputPassword1" class="form-label">Waktu Tidak Hadir Ngaji</label>
                                    <div id="emailHelp" class="form-text">*Contoh Input Lebih Dari 1 Orang:<br>Azzar=Subuh,Dzuhur||Udin=Dzuhur||Asep=Isya </div>
                                    <input type="text" class="form-control" name="tidak_ngaji" id="password_pengurus" required>
                                </div>
                                <div class="mb-3" id="keterangan">
                                    <label for="tanggal">Keterangan</label>
                                    <div id="emailHelp" class="form-text text-break">*Contoh Input Lebih Dari 1 Orang:<br>Azzar=Subuh(Tidur),Dzuhur(Pulang)||Udin=Dzuhur(Pulang)||Asep=Isya(Tidur) </div>
                                    <input type="text" class="form-control" name="keterangan" required/>
                                </div>
                                <button type="submit" class="btn btn-primary" id="btnLogin">Kirim</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
            </div>
        
            <!-- Modal 2 -->
            <div class="modal fade" id="inputModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Anggota</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="mt-2" id="formLogin" action="../request.php?request=inputanggota" method="POST">
                            <div class="container">
                                <h2 class="text-center">Tambah Anggota</h2>
                                <div class="mb-3" id="nama">
                                    <label for="nama_anggota">Nama Anggota</label>
                                    <input type="text" class="form-control" name="nama_anggota"/>
                                </div>
                                <div class="mb-3" id="kelas">
                                    <label for="tanggal">Kelas</label>
                                    <input type="text" class="form-control" name="kelas"/>
                                </div>
                                <button type="submit" class="btn btn-primary" id="btnSubmit">Kirim</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
            </div>
        <script>
            $(document).ready(function(){
                $('#absen').click(function(){ 
                    $('#dataTableb ').css('display','block');
                });
                $('#btnAbsen').click(function(){
                    $('#absenModal').modal('show');
                });
                $('#select_ngaji').change(function(){
                    var select = $('#select_ngaji').val();
                    if (select == "Ada Yang Tidak Ngaji"){
                        $('#nama').show();
                        $('#tanggal').show();
                        $('#tidak_hadir_ngaji').show();
                        $('#keterangan').show();
                    }else{
                        $('#nama').prop('required',false).hide();
                        $('#tidak_hadir_ngaji').prop('required',false).hide();
                        $('#keterangan').prop('required',false).hide();
                    }
                })
                $('#stsAbsen').click(function(){
                    $.get({
                        url:'statusabsen.php',
                        success:function(data){
                            $('#scTable').html(data);
                        }
                    })
                })
                $('#btnInput').click(function(){
                    $('#inputModal').modal('show');
                })
            })
        </script>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="https://pontrendarulmuttaqin.com/js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.all.js" integrity="sha256-bCfvkn7wlryDb0Z3q/8FlRsOvD3/hIHzV7TWvJvuXKc=" crossorigin="anonymous"></script>
    </body>
</html>