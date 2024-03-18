<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page PPDB Sekolah</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            color: #555;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        section {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1, h2, h3 {
            color: #333;
        }

        p {
            line-height: 1.6;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <h1 style="color:white">Selamat Datang di PPDB SDIT At-Tajdied</h1>
    </header>

    <section>
        <h2>Tentang PPDB</h2>
        <p>SDIT At-Tajdied membuka pendaftaran untuk tahun ajaran baru. Kami menyediakan lingkungan belajar yang mendukung dan berkualitas untuk perkembangan peserta didik.</p>

        <h2>Proses Pendaftaran</h2>
        <p>Proses pendaftaran sangat mudah. Cukup isi formulir pendaftaran online kami dan tunggu konfirmasi dari pihak sekolah.</p>

        <h2>Fasilitas Sekolah</h2>
        <p>Kami menyediakan fasilitas modern dan berbagai kegiatan ekstrakurikuler untuk meningkatkan potensi peserta didik.</p>

        <button onclick="openWhatsApp()" >Daftar Sekarang</button>
    </section>

    <footer>
        <p>&copy; 2024 SDIT At-Tajdied. All rights reserved.</p>
    </footer>
</body>
<script>
  function openWhatsApp() {
            // Gantilah nomor_telepon_dituju dengan nomor telepon tujuan yang diinginkan
            var nomor_telepon_dituju = "6289646372529";
            
            // Gantilah pesan_default dengan pesan default yang diinginkan
            var pesan_default = "Halo, saya ingin mendaftar PPDB.";

            // Buat URL WhatsApp dengan nomor telepon dan pesan
            var urlWhatsApp = "https://wa.me/" + nomor_telepon_dituju + "?text=" + encodeURIComponent(pesan_default);

            // Buka URL WhatsApp di tab baru
            window.open(urlWhatsApp, '_blank');
        }
  
  </script>
</html>
