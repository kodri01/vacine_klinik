<!DOCTYPE html>
<base href="<?= base_url(); ?>">
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<title>Klinik Hamdalah</title>
</head>

<body>


    <div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card o-hidden border-0 shadow-lg my-5 ">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg">
                                    <div class="p-2">
                                        <div class="container"><img class="rounded float-start"
                                                src="https://img.icons8.com/ios-filled/128/0a4275/heart-health.png" />
                                            <img class="rounded float-end"
                                                src="https://img.icons8.com/ios-filled/128/0a4275/heart-health.png" />
                                        </div>
                                        <h1 class="text-center mt-5" style="color:#1B5E9B ;">KLINIK HAMDALAH</h1>
                                        <p class="text-center">Jalan Nuskam Syarif No. 99 Simp. IV Sipin Telanaipura</p>
                                        <p class="text-center">Telp. 021(12345666) fax. 121(12345666)</p>

                                        <hr>
                                        <div class="p-4">

                                            <div class="container">
                                                <h1 class="text-center text-primary">KARTU SKRINING</h1>
                                            </div>
                                            <div class="p-4">
                                                <table class="tabel" style="width: 60%;">
                                                    <tr>
                                                        <td>
                                                            Nama Lengkap
                                                        </td>
                                                        <td>
                                                            :
                                                        </td>
                                                        <td>
                                                            <?= $user->nama ?>
                                                        </td>
                                                        <td class="fw-bold">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            No KTP
                                                        </td>
                                                        <td>
                                                            :
                                                        </td>
                                                        <td class="fw-bold">
                                                            <?= $user->no_nik ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Tanggal Lahir
                                                        </td>
                                                        <td>
                                                            :
                                                        </td>
                                                        <td>
                                                            <?= $user->tgl_lahir ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            No Telepon
                                                        </td>
                                                        <td>
                                                            :
                                                        </td>
                                                        <td>
                                                            <?= $user->no_telp ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Alamat
                                                        </td>
                                                        <td>
                                                            :
                                                        </td>
                                                        <td>
                                                            <?= $user->alamat ?>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <div class="mt-5">
                                                    <p>
                                                        Hasil Skrining Anda hari ini adalah
                                                        <a
                                                            class="fw-bold text-decoration-none text-dark"><?= $user->keterangan ?></a>
                                                    </p>
                                                </div>
                                                <table class="tabel float-end" style="width: 60%;">
                                                    <tr>
                                                        <td class="fw-bold" width="50%">
                                                            TTD Pasien
                                                        </td>
                                                        <td class="fw-bold">
                                                            TTD Petugas
                                                        </td>
                                                    </tr>
                                                </table>
                                                <table class="tabel float-end mt-5 mb-3" style="width: 60%">
                                                    <tr>
                                                        <td width="50%">
                                                            <?= $user->nama ?>
                                                        </td>

                                                        <td class="float-start">
                                                            <?= $admin->nama_admin ?>
                                                        </td>
                                                    </tr>
                                                </table>
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

    <script>
    window.print();
    </script>



</body>

</html>