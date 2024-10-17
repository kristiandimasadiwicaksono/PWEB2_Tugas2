<?php
// Menghubungkan file koneksi ke dalam index
include 'koneksi.php'; 

// Class surat tugas yang merupakan anakan dari connection
class surat_tugas extends connection{
    // method untuk mengambil data dari tabel surat_tugas pada database
    public function getDosen(){
        $tugas = parent::__construct()->query("SELECT * FROM surat_tugas");
        return $tugas;
    }
}

// Class permohonan izin yang merupakan anakan dari connection
class permohonan_izin extends connection {
    // method untuk mengambil data dari tabel permohonan_izin pada database
    public function getDosen(){
        $izin = parent::__construct()->query("SELECT * FROM permohonan_izin");
        return $izin;
    }
}
// instansiasi objek
$tugas = new surat_tugas();
$izin = new permohonan_izin();
// variable permohonan yang berisi method permohonan yang berisi permohonan_izin
$permohonan=$izin->getDosen('permohonan_izin');
// variable surat yang berisi method permohonan untuk tabel surat_tugas
$surat=$tugas->getDosen('surat_tugas');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Tugas 2</title>
</head>
<style>
    .container .btn{
        position: relative;
        font-size: 15px;
        justify-content: center;
    }
    .btn{
        font-size: 10px;
    }
    .navbar-light {
        background-color: #f8f9fa;
        color: #000;
    }
    .navbar-light .navbar{
        background-color: #000;
        color: #fff;
    }
    .navbar-light .navbar-brand,
    .navbar-light .nav-link {
        color: #000;
    }
    .dark-mode {
        background-color: #343a40;
        color: #fff;
    }
    .dark-mode .navbar-brand, .dark-mode .nav-link {
        color: #000;
    }
    .navbar-nav .nav-link.active, .navbar-nav .nav-link.show {
        color: #000;
    }
    .nav-item .dropdown-menu{
        margin-top: 10px;
    }
</style>
<body>
    <!-- Membuat sebuah navbar -->
    <nav class="navbar navbar-expand navbar-light shadow rounded" style="padding-left: 20px;">
        <a class="navbar-brand" href="index.php">Tugas 2</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <!-- Dropdown untuk pilihan Surat Tugas -->
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-bs-toggle="dropdown">Surat Tugas</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#" onclick="showContent('adminTugas')">Surat Tugas (Administrator)</a>
                        <a class="dropdown-item" href="#" onclick="showContent('dosenTugas')">Surat Tugas (Dosen)</a>
                    </div>
                </li>
            </ul>
            <!-- Dropdown untuk pilihan Permohonan izin -->
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-bs-toggle="dropdown">Permohonan Izin</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#" onclick="showContent('adminIzin')">Permohonan izin (Administrator)</a>
                    <a class="dropdown-item" href="#" onclick="showContent('dosenIzin')">Permohonan izin (Dosen)</a>
                    </div>
                </li>
            </ul>
            <button class="btn btn-primary position-absolute end-0 bottom-0 m-3 btn-sm" id="toggle-mode">Toggle Mode</button>
        </div>
    </nav>
    <div class="Body">
        <!-- Kalimat pada tampilan awal halaman -->
        <div class="position-absolute top-50 start-50 translate-middle text-center" id="welcomeMessage">
            <h2>Selamat Datang!</h2>
            <p>Harap menekan salah satu tombol diatas untuk menampilkan data.</p>
        </div>
    </div>
    <!-- Tampilan tabel surat tugas untuk role administrator -->
    <div class="container" id="adminTugas" style="margin-top: 20px; display: none;">
        <h1 class="text-center">Surat Tugas (Administrator)</h1>
        <table class="table mt-5" style="text-align: center ;">
            <!-- Table Head Surat Tugas Administrator -->
            <thead>
                <tr>
                    <th class="">Nomor</th>
                    <th class="">Nama Dosen</th>
                    <th class="">Tanggal Surat</th>
                    <th class="">Tujuan</th>
                    <th class="">Transportasi</th>
                    <th class="">Keperluan</th>
                </tr>
            </thead>
            <!-- Proses mencetak isi data pada database ke dalam tabel untuk admin -->
            <tbody>
                <?php
                foreach($surat as $row) { ?>
                <tr>
                    <td><?php echo $row['nomor']; ?></td>
                    <td><?php echo $row['nama_dsn']; ?></td>
                    <td><?php echo $row['tgl_surat_tugas']; ?></td>
                    <td><?php echo $row['tujuan']; ?></td>
                    <td><?php echo $row['transportasi']; ?></td>
                    <td><?php echo $row['keperluan']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <a class="kembali btn btn-primary" href="index.php" role="button">Kembali</a>
    </div>
    <!-- Tampilan tabel surat tugas untuk role Dosen -->
    <div class="container" id="dosenTugas" style="margin-top: 20px; display: none;">
        <h1 class="text-center">Surat Tugas (Dosen)</h1>
        <table class="table mt-5" style="text-align: center ;">
            <!-- Table head untuk surat tugas role dosen -->
            <thead>
                <tr>
                    <th class="">Nama Dosen</th>
                    <th class="">Tanggal Surat</th>
                    <th class="">Tujuan</th>
                </tr>
            </thead>
            <!-- Proses mencetak isi data pada database ke dalam tabel untuk dosen -->
            <tbody>
                <?php
                foreach($surat as $row) {
                ?>
                <tr>
                    <td><?php echo $row['nama_dsn']; ?></td>
                    <td><?php echo $row['tgl_surat_tugas']; ?></td>
                    <td><?php echo $row['tujuan']; ?></td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
        <a class="kembali btn btn-primary" href="index.php" role="button">Kembali</a>
    </div>
    <!-- Tampilan tabel permohonan izin untuk role administrator -->
    <div class="container" id="adminIzin" style="margin-top: 20px; display: none;">
        <h1 class="text-center">Permohonan Izin (Administrator)</h1>
        <table class="table mt-5" style="text-align: center ;">
            <thead>
                <tr>
                    <th>Nama Dosen</th>
                    <th>NIP</th>
                    <th>Pangkat Jabatan</th>
                    <th>Jabatan</th>
                    <th>Unit Kerja</th>
                </tr>
            </thead>
            <!-- Proses mencetak isi data pada databaseke dalam tabel untuk administrator -->
            <tbody>
                <?php
                foreach($permohonan as $row) { ?>
                <tr>
                    <td><?php echo $row['nama_dsn']; ?></td>
                    <td><?php echo $row['nip']; ?></td>
                    <td><?php echo $row['pangkat_jabatan']; ?></td>
                    <td><?php echo $row['jabatan']; ?></td>
                    <td><?php echo $row['unit_kerja']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <a class="kembali btn btn-primary" href="index.php" role="button">Kembali</a>
    </div>
    <!-- Tampilan tabel permohonan izin untuk role dosen -->
    <div class="container" id="dosenIzin" style="margin-top: 20px; display: none;">
        <h1 class="text-center">Permohonan Izin (Dosen)</h1>
        <table class="table mt-5" style="text-align: center ;">
            <thead>
                <tr>
                    <th class="">Nama Dosen</th>
                    <th class="">NIP</th>
                    <th class="">Jabatan</th>
                </tr>
            </thead>
            <!-- Proses mencetak isi data pada database ke dalam tabel untuk dosen -->
            <tbody>
                <?php
                foreach($permohonan as $row) {
                ?>
                <tr>
                    <td><?php echo $row['nama_dsn']; ?></td>
                    <td><?php echo $row['nip']; ?></td>
                    <td><?php echo $row['jabatan']; ?></td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
        <a class="kembali btn btn-primary" href="index.php" role="button">Kembali</a>
    </div>
</body>
<!-- Fungsi js untuk menghilangkan tampilan jika tidak ditekan tombolnya -->
    <script>
        function showContent(type){
            document.getElementById('welcomeMessage').style.display = 'none';
            document.getElementById('adminTugas').style.display = 'none';
            document.getElementById('dosenTugas').style.display = 'none';
            document.getElementById('adminIzin').style.display = 'none';
            document.getElementById('dosenIzin').style.display = 'none';


            document.getElementById(type).style.display = 'block';
        }
        const toggleButton = document.getElementById('toggle-mode');
            const bodyElement = document.body;

            toggleButton.addEventListener('click', () => {
                const currentTheme = bodyElement.getAttribute('data-bs-theme');
                if (currentTheme === 'dark') {
                    bodyElement.setAttribute('data-bs-theme', 'light');
                } else {
                    bodyElement.setAttribute('data-bs-theme', 'dark');
                }
            });
    </script>
</html>