<!DOCTYPE html>
<base href="<?= base_url(); ?>">
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/0567264f5f.js" crossorigin="anonymous"></script>
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
                        <a class="nav-link" href="vaksin_klinik/data_pasien">Data Pasien</a>
                    </li>
                    <li class=" nav-item dropdown ">
                        <a href="javascript:void(0);" class="dropdown-toggle nav-link active" data-toggle="dropdown"
                            role="button" aria-haspopup="true" aria-expanded="false">
                            Vaksinasi Anak
                        </a>
                        <ul style="min-width:150px;" class="dropdown-menu dropdown-menu-right">
                            <li class="nav-item">
                                <a class="dropdown-item" href="vaksin_klinik/skrining">Skrining</a>
                            </li>
                            <li class="nav-item">
                                <a class="dropdown-item active" href="vaksin_klinik/vaksin_anak">Vaksinasi</a>
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
                <div class="col-lg-10">
                    <div class="card o-hidden border-0 shadow-lg my-5 ">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg">
                                    <div class="p-5">
                                        <!-- <form class="d-flex mb-2" action="vaksin_klinik/search_vaksin">
                                            <input class="form-control me-3" type="search" name="search"
                                                placeholder="Masukkan Nomor NIK...." aria-label="Search"><a href=""></a>
                                            <button class="btn btn-outline-success" type="submit">Search</button>
                                        </form> -->
                                        <div class="container-fluid">
                                            <!-- <div class="col-sm-3">
                                                <h5 class="fw-bold"><?= $vaksin->nama ?> <br>
                                                    <?= $vaksin->no_nik ?>
                                                </h5>
                                            </div> -->
                                            <!-- Page Heading -->
                                            <div class="card shadow mb-4">
                                                <div class="card-header py-3">
                                                    <h6 class="m-0 font-weight-bold ">Vaksinasi Anak</h6>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="container-fluid">
                                                            <form action="vaksin_klinik/cek_biaya" class="form-control"
                                                                method="POST" enctype="multipart/form-data">
                                                                <input type="hidden" name="no_pembayaran">
                                                                <div class="form-group row mb-2">
                                                                    <label for="" class="col-sm-3 col-form-label">Nama
                                                                        Lengkap</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" name="nama"
                                                                            placeholder="Masukan Nama Lengkap" value=""
                                                                            class="form-control">
                                                                    </div>
                                                                    <div class="text-danger">
                                                                        <?php echo form_error('nama'); ?></div>
                                                                </div>
                                                                <div class="form-group row mb-2">
                                                                    <label for="" class="col-sm-3 col-form-label">No
                                                                        KTP</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text"
                                                                            placeholder="Masukan Nomor KTP"
                                                                            name="no_nik" class="form-control" value="">
                                                                    </div>
                                                                    <div class="text-danger">
                                                                        <?php echo form_error('no_nik'); ?></div>
                                                                </div>
                                                                <div class="form-group row mb-4">
                                                                    <label for=""
                                                                        class="col-sm-3 col-form-label">Tanggal
                                                                        Vaksin</label>
                                                                    <div class="col-sm-3">
                                                                        <input type="date" name="date_vaksin"
                                                                            class="form-control">
                                                                    </div>
                                                                    <label for="" class="col-sm-3 col-form-label">Jam
                                                                        Vaksin (Jam:Menit)
                                                                    </label>
                                                                    <div class="col-sm-3">
                                                                        <input type="time" name="jam_vaksin"
                                                                            class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row mb-4">
                                                                    <label for="" class="col-sm-3 col-form-label">No
                                                                        Telepon</label>
                                                                    <div class="col-sm-3">
                                                                        <input type="text" name="no_telp" value=""
                                                                            placeholder="exp: 081234xxxxx"
                                                                            class="form-control">
                                                                    </div>
                                                                    <label for="" class="col-sm-3 col-form-label">Jenis
                                                                        Kelamin</label>
                                                                    <div class="col-sm-3">
                                                                        <select class="form-control" name="jk">
                                                                            <option selected>- Jenis
                                                                                Kelamin -</option>
                                                                            <option value="Laki-Laki">Laki-Laki</option>
                                                                            <option value="Perempuan">Perempuan</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row mb-2">
                                                                    <label for="" class="col-sm-3 col-form-label">Nama
                                                                        Vaksin</label>
                                                                    <div class="col-sm-9">
                                                                        <select class="form-control"
                                                                            name="jenis_vaksin">
                                                                            <option selected>- Pilih
                                                                                Vaksin -</option>
                                                                            <option value="BCG">BCG</option>
                                                                            <option value="Campak">Campak
                                                                            </option>
                                                                            <option value="Hepatitis A">Hepatitis A
                                                                            </option>
                                                                            <option value="Hepatitis B">Hepatitis B
                                                                            </option>
                                                                            <option value="Influenza">Influenza
                                                                            </option>
                                                                            <option value="IPD/PCV">IPD/PCV</option>
                                                                            <option value="Japanese Encepalitis">
                                                                                Japanese Encepalitis</option>
                                                                            <option value="Rotavirus">Rotavirus</option>
                                                                            <option value="Rubella">Rubella</option>
                                                                            <option value="Varicella">Varicella</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row mb-2">
                                                                    <label for="" class="col-sm-3 col-form-label">Paket
                                                                        Vaksin</label>
                                                                    <div class="col-sm-9">
                                                                        <select class="form-control" id="paket_vaksin"
                                                                            name="paket_vaksin">
                                                                            <option selected>- Pilih
                                                                                Paket -</option>
                                                                            <option value="0 - 6 Bulan">0 - 6 Bulan
                                                                            </option>
                                                                            <option value="7 - 12 Bulan">7 - 12 Bulan
                                                                            </option>
                                                                            <option value="0 - 12 Bulan">0 - 12 Bulan
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row mb-2">
                                                                    <label for="" class="col-sm-3 col-form-label">Harga
                                                                        Paket</label>
                                                                    <div class="col-sm-3">
                                                                        <input type="text" name="harga"
                                                                            placeholder="Harga Paket"
                                                                            class="form-control" readonly disabled>
                                                                    </div>
                                                                    <label for=""
                                                                        class="col-sm-3 col-form-label">Potongan
                                                                        (%)</label>
                                                                    <div class="col-sm-3">
                                                                        <input type="text" name="potongan"
                                                                            placeholder="Potongan Diskon"
                                                                            class="form-control" readonly disabled>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row mb-2">
                                                                    <label for="" class="col-sm-3 col-form-label">Total
                                                                        Harga
                                                                    </label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" name="total_bayar"
                                                                            placeholder="Total Harga"
                                                                            class="form-control" readonly disabled>
                                                                    </div>
                                                                </div>
                                                                <!-- <div class="form-group row mb-2">
                                                                    <label for="" class="col-sm-3 col-form-label">Bayar
                                                                        Cash
                                                                    </label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" name="bayar_cash"
                                                                            placeholder="Bayar Tunai"
                                                                            class="form-control">
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-9">
                                                                    <input type="hidden" name="kembalian"
                                                                        placeholder="Kembalian" class="form-control"
                                                                        readonly disabled>
                                                                </div> -->

                                                                <div class="form-group row mb-2">
                                                                    <div
                                                                        class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                                        <button class="btn btn-primary me-md-2"
                                                                            name="bayar">Cek Biaya</button>
                                                                    </div>
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