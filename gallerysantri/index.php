<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Website Pontren Darul Muttaqin" />
        <meta name="author" content="Azzarnuji" />
        <title>Pontren Darul Muttaqin</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Aguafina+Script" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.css" integrity="sha256-yydPR4I9kVTwVawkyOisG2g5biRQnEpf2e4wWlidxZE=" crossorigin="anonymous">
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    </head>
    <style>
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
        hr {
            margin-top: 1rem;
            margin-bottom: 1rem;
            border: 0;
            border-top: 1px solid rgba(0, 0, 0, 0.1);
        }
    </style>
    <body id="page-top">
        <?php if (isset($_GET['statuscode'])):?>
            <?php if($_GET['statuscode'] == "berhasil"):?>
                <script>
                    $(document).ready(function(){
                        mulai();
                    })
                    function mulai(){
                        Swal.fire(
                                'Pesan Terikirim',
                                'Terimakasih :)',
                                'success'
                            );
                    };
                </script>
            <?php elseif($_GET['statuscode'] == "gagal"):?>
                <script>
                    $(document).ready(function(){
                        mulai();
                    })
                    function mulai(){
                        Swal.fire(
                                'Pesan Gagal Terkirim',
                                'Ulangi Kembali :(',
                                'error'
                            );
                    };
                </script>
            <?php endif;?>
        <?php endif;?>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <!-- <a class="navbar-brand" href="#page-top"><img src="assets/img/ponpes.svg" alt="..." /></a> -->
                <p class="text">Darul Muttaqin </p>   
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#services">Sistem Pengajian</a></li>
                        <li class="nav-item"><a class="nav-link" href="#portfolio">Gallery Pontren</a></li>
                        <li class="nav-item"><a class="nav-link" href="#about">Tentang Kami</a></li>
                        <li class="nav-item"><a class="nav-link" href="#team">Pendiri Pontren</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Hubungi Kami</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Welcome To Pontren Darul Muttaqin</div>
                <div class="masthead-heading text-uppercase">Ahlan Wa Sahlan</div>
                <a class="btn btn-primary btn-xl text-uppercase" href="#services">Lihat Foto</a>
            </div>
        </header>
        <section class="page-section bg-light" id="services"> 
            <div class="container">
            <h2 class="text-center">Gallery Santri</h4>
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                        <tr>
                        <th>No</th>
                        <th>Nama File</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama File</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <?php
                    $dirname = "../assets/santri/";
                    $images = glob($dirname."*.jpg");
                    $NO = 1;
                    
                ?>
                    <?php foreach ($images as $image):?>
                    <tbody>
                        <tr>
                            <td><?=$NO++;?></td>
                            <td><a href="<?=$image;?>"><img class="img-thumbnail rounded" src="<?=$image;?>" height="300px" width="300px" /></a></td>
                            <td><a href="<?=$image;?>" class="btn btn-primary" type="submit" name="dowmload" value="<?=$image;?>" download=""<?=$image;?>"">Download</a></td>
                        </tr>
                    </tbody>
                    <?php endforeach;?>
            </table>
        </div>
            </div>
       
        </section>






        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="../js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.all.js" integrity="sha256-bCfvkn7wlryDb0Z3q/8FlRsOvD3/hIHzV7TWvJvuXKc=" crossorigin="anonymous"></script>
    </body>
</html>