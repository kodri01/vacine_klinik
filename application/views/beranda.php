<!DOCTYPE html>
<base href="<?= base_url(); ?>">
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://kit.fontawesome.com/0567264f5f.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>
<title>Klinik Hamdalah</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top" style="background-color: #0a4275;">
        <div class="container">
            <a class="navbar-brand" href="vaksin_klinik/beranda"><img
                    src="https://img.icons8.com/ios-filled/28/ffffff/heart-health.png" />&nbsp;&nbsp;Klinik Hamdalah</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav " style="margin-left: 45rem; width:max-content;">
                    <li class="nav-item">
                        <a class="nav-link active" href="vaksin_klinik/beranda">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="vaksin_klinik/data_pasien">Data Pasien</a>
                    </li>
                    <li class=" nav-item dropdown ">
                        <a href="javascript:void(0);" class="dropdown-toggle nav-link" data-toggle="dropdown"
                            role="button" aria-haspopup="true" aria-expanded="false">
                            Vaksinasi Anak
                        </a>
                        <ul style="min-width:150px;" class="dropdown-menu dropdown-menu-right">
                            <li class="nav-item">
                                <a class="dropdown-item" href="vaksin_klinik/skrining">Skrining</a>
                            </li>
                            <li class="nav-item">
                                <a class="dropdown-item" href="vaksin_klinik/vaksin_anak">Vaksinasi</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="vaksin_klinik/vaksinasi">Vaksin Covid-19</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="vaksin_klinik/logout"><i
                                class="fa-solid fa-right-from-bracket"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid row mx-auto">
        <div class="mt-5">
            <h1 class="fw-bold m-3"> Selamat Datang, <?php echo $admin->nama_admin; ?></h1>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="card text-bg-primary m-3" style="max-width: 23rem;">
                            <div class="card-header fw-bold fs-4">Registrasi</div>
                            <div class="col">
                                <h1 class="text-end" style="font-size: 50px;"> <?php echo $user; ?></h1><a
                                    href="vaksin_klinik/data_pasien" class="text-light"><i
                                        class="mb-2 fa-solid fa-user-gear" style="font-size:6rem ;"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card text-bg-warning m-3" style="max-width: 23rem;">
                            <div class="card-header fw-bold fs-4">Vaksinasi</div>
                            <div class="col">
                                <h1 class="text-end" style="font-size: 50px;"> <?php echo $total; ?></h1>
                                <a href="vaksin_klinik/hasil_vaksin" class="text-dark"><i
                                        class="mb-2 fa-solid fa-file-medical" style="font-size:6rem ;"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card text-bg-success m-3" style="max-width: 23rem;">
                            <div class="card-header fw-bold fs-4">Imunisasi</div>
                            <div class="col">
                                <h1 class="text-end" style="font-size: 50px;"> <?php echo $timun; ?></h1><a
                                    href="vaksin_klinik/beranda" class="text-light"><i class="fa-solid fa-capsules"
                                        style="font-size: 6rem;"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card text-bg-info m-3" style="max-width: 23rem;">
                            <div class="card-header fw-bold fs-4">Skrining</div>
                            <div class="col">
                                <h1 class="text-end" style="font-size: 50px;"> <?php echo $skrining; ?></h1><a
                                    href="vaksin_klinik/hasil_skrining" class="text-light"><i
                                        class="fa-solid fa-prescription-bottle-medical"
                                        style="font-size: 6rem;"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-6">
                    <div class="card shadow m-3">
                        <div class="card-header py-3">
                            <h6 class="fw-bold ">Data Pasien Selesai Vaksin</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-success" id="dataTable" cellspacing="1">
                                    <thead>
                                        <tr>
                                            <th class="text-center" width="4%">No</th>
                                            <th class="text-center" width="15%">Nama Lengkap</th>
                                            <th class="text-center" width="15%">Tanggal Vaksin</th>
                                            <th class="text-center" width="15%">Nama Vaksin
                                            </th>
                                            <th class="text-center" width="20%">Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $nomor = 1;
                                        foreach ($vaksin as $s) { ?>
                                        <tr>
                                            <td class="text-center"><?= $nomor++; ?></td>
                                            <td><?= $s->nama; ?></td>
                                            <td><?= $s->tgl_vaksin; ?></td>
                                            <td><?= $s->paket_vaksin; ?></td>
                                            <td><?= $s->vaksin_ket; ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="card shadow m-3">
                        <div class="card-header py-3">
                            <h6 class="fw-bold ">Data Pasien Selesai Imunisasi</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-info" id="dataTable" cellspacing="1">
                                    <thead>
                                        <tr>
                                            <th class="text-center" width="4%">No</th>
                                            <th class="text-center" width="15%">Nama Lengkap</th>
                                            <th class="text-center" width="15%">Umur</th>
                                            <th class="text-center" width="15%">Tanggal Imunisasi</th>
                                            <th class="text-center" width="15%">Paket Imunisasi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $nomor = 1;
                                        foreach ($imun as $i) { ?>
                                        <tr>
                                            <td class="text-center"><?= $nomor++; ?></td>
                                            <td><?= $i->nama; ?></td>
                                            <td><?= $i->umur; ?></td>
                                            <td><?= $i->tgl_imun; ?></td>
                                            <td><?= $i->paket_imun; ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>






    </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>

</body>

</html>