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
                        <a class="nav-link" href="vaksin_klinik/beranda">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="vaksin_klinik/data_pasien">Data Pasien</a>
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

    <div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card o-hidden border-0 shadow-lg my-5 ">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg">
                                    <div class="p-5">
                                        <!-- Page Heading -->
                                        <div class="card">
                                            <div class="card-header">
                                                Pendaftaran Vaksin
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="container-fluid">
                                                        <form action="vaksin_klinik/proses_register"
                                                            class="form-control" method="POST"
                                                            enctype="multipart/form-data">
                                                            <div class="form-group row mb-2">
                                                                <label for="" class="col-sm-3 col-form-label">Nama
                                                                    Lengkap</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="nama"
                                                                        placeholder="Masukan Nama Lengkap"
                                                                        autocomplete="off" class="form-control">
                                                                </div>
                                                                <div class="text-danger">
                                                                    <?php echo form_error('nama'); ?></div>
                                                            </div>
                                                            <div class="form-group row mb-2">
                                                                <label for="" class="col-sm-3 col-form-label">No
                                                                    KTP</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="no_nik"
                                                                        class="form-control" autocomplete="off"
                                                                        placeholder="Masukan Nomor KTP">
                                                                </div>
                                                                <div class="text-danger">
                                                                    <?php echo form_error('no_nik'); ?></div>
                                                            </div>
                                                            <div class="form-group row mb-2">
                                                                <label for="" class="col-sm-3 col-form-label">Tanggal
                                                                    Lahir</label>
                                                                <div class="col-sm-9">
                                                                    <input type="date" autocomplete="off" name="date"
                                                                        class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mb-2">
                                                                <label for=""
                                                                    class="col-sm-3 col-form-label">Umur</label>
                                                                <div class="col-sm-9">
                                                                    <input type="number" autocomplete="off" name="umur"
                                                                        placeholder="Umur" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mb-2">
                                                                <label for="" class="col-sm-3 col-form-label">E-mail
                                                                </label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="email" autocomplete="off"
                                                                        placeholder="example@gmail.com"
                                                                        class="form-control">
                                                                </div>
                                                                <div class="text-danger">
                                                                    <?php echo form_error('email'); ?></div>
                                                            </div>
                                                            <div class="form-group row mb-2">
                                                                <label for="" class="col-sm-3 col-form-label">No
                                                                    Telepon</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" autocomplete="off" name="no_telp"
                                                                        placeholder="exp: 081234xxxxx"
                                                                        class="form-control">
                                                                </div>
                                                                <div class="text-danger">
                                                                    <?php echo form_error('no_telp'); ?></div>
                                                            </div>
                                                            <div class="form-group row mb-2">
                                                                <label for="" class="col-sm-3 col-form-label">Jenis
                                                                    Kelamin</label>
                                                                <div class="col-sm-9">
                                                                    <select class="form-control" name="jk">
                                                                        <option selected>- Jenis
                                                                            Kelamin -</option>
                                                                        <option value="Laki-Laki">Laki-Laki</option>
                                                                        <option value="Perempuan">Perempuan</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mb-2">
                                                                <label for="" class="col-sm-3 col-form-label">Orang
                                                                    Tua/Wali</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" autocomplete="off"
                                                                        placeholder="Nama Orang Tua/Wali" name="ortu"
                                                                        value="" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mb-2">
                                                                <label for="" class="col-sm-3 col-form-label">Alamat
                                                                    Sekarang</label>
                                                                <div class="col-sm-9">
                                                                    <textarea type="text" name="alamat"
                                                                        placeholder="Alamat Rumah"
                                                                        class="form-control"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mb-2">
                                                                <div class="d-grid gap-2 col-6 mx-auto">
                                                                    <button class="btn btn-success"
                                                                        name="daftar">DAFTAR</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
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