<?php
session_start();
require_once 'core/Init.php';
$app = new pengurus_db;
$datalaki = $app->getDataApi('Laki-Laki');
$dataCewe = $app->getDataApi('Perempuan');
if ($_SESSION['apistatus']!="diberiakses"){
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
            <style>
                table{
                    table-layout: fixed;
                }
                td{
                    word-wrap: break-word;
                }
            </style>
            <div class="container">
                <h2 class="text-center">Daftar Absen</h2>
                <h3 class="text-center">Laki-Laki</h3>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                                <tr>
                                <th>No</th>
                                <th>Tanggal Absen</th>
                                <th>Kobong</th>
                                <th>Status Ngaji</th>
                                <th>Nama Yang Tidak Ngaji</th>
                                <th>Waktu Ngaji</th>
                                <th>Deskripsi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Absen</th>
                                <th>Kobong</th>
                                <th>Status Ngaji</th>
                                <th>Nama Yang Tidak Ngaji</th>
                                <th>Waktu Ngaji</th>
                                <th>Deskripsi</th>
                            </tr>
                        </tfoot>
                        <?php 
    
                        $NO = 1;
                        ?>
                        <?php foreach ($datalaki as $absen):?>
                        <tbody>
                            <tr>
                                <td><?=$NO++;?></td>
                                <td><?=$absen['tanggal_absen'];?></td>
                                <td><?=$absen['owner_id_kobong'];?></td>
                                <td><?=$absen['status_ngaji'];?></td>
                                <td><?=$absen['nama_yang_tidak_ngaji'];?></td>
                                <td><?=$absen['waktu_ngaji'];?></td>
                                <td><?=$absen['deskripsi'];?></td>
                            </tr>
                        </tbody>
                        <?php endforeach;?>
                </table>
    
            </div>

            <div class="container">
                <h2 class="text-center">Daftar Absen</h2>
                <h3 class="text-center">Perempuan</h3>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                                <tr>
                                <th>No</th>
                                <th>Tanggal Absen</th>
                                <th>Kobong</th>
                                <th>Status Ngaji</th>
                                <th>Nama Yang Tidak Ngaji</th>
                                <th>Waktu Ngaji</th>
                                <th>Deskripsi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Absen</th>
                                <th>Kobong</th>
                                <th>Status Ngaji</th>
                                <th>Nama Yang Tidak Ngaji</th>
                                <th>Waktu Ngaji</th>
                                <th>Deskripsi</th>
                            </tr>
                        </tfoot>
                        <?php 
    
                        $NO = 1;
                        ?>
                        <?php foreach ($dataCewe as $absen):?>
                        <tbody>
                            <tr>
                                <td><?=$NO++;?></td>
                                <td><?=$absen['tanggal_absen'];?></td>
                                <td><?=$absen['owner_id_kobong'];?></td>
                                <td><?=$absen['status_ngaji'];?></td>
                                <td><?=$absen['nama_yang_tidak_ngaji'];?></td>
                                <td><?=$absen['waktu_ngaji'];?></td>
                                <td><?=$absen['deskripsi'];?></td>
                            </tr>
                        </tbody>
                        <?php endforeach;?>
                </table>
    
            </div>

        </section>
        
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
                        $('#nama').hide();
                        $('#tidak_hadir_ngaji').hide();
                        $('#keterangan').hide();
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