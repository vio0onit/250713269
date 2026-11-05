<h2>Pendaftaran Akun</h2>
<form method="POST" action="">
    <p>Nama : <br /><input type="text" name="nama" /></p>
    <p>Telepon : <br /><input type="text" name="telepon" /></p>
    <p>Metode Verifikasi : <br />
        <select name="verifikasi">
            <option value="">-- Pilih --</option>
            <option value="WhatsApp">WhatsApp</option>
            <option value="SMS">SMS</option>
        </select>
    </p>
    <button type="submit">Kirim</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'] ?? '';
    $tlp = $_POST['telepon'] ?? '';
    $verifikasi = $_POST['verifikasi'] ?? '';
    $errors = array();

    if (empty($nama) || empty($tlp) || empty($verifikasi)) {
        $errors[] = "Harap isi semua bidang formulir.";
    }

    if (!preg_match("/^[a-zA-Z\s]*$/", $nama)) {
        $errors[] = "Nama hanya boleh mengandung huruf dan spasi.";
    }

    if (!preg_match("/^(|\+62|08)[0-9]{9,11}$/", $tlp)) {
        $errors[] = "Nomor telepon harus diawali +62 atau 08 dan memiliki jumlah digit yang valid.";
    }

    if (!empty($errors)) {
        foreach ($errors as $err) {
            echo "<p style='color:red;'>!! " . htmlspecialchars($err) . " !!</p>";
        }
    } else {
        $lokasi = ($verifikasi === 'WhatsApp') ? 'WhatsApp' : 'SMS';

        echo "<h2>Informasi Pendaftaran</h2>";
        echo "<p><strong>Nama:</strong> " . htmlspecialchars($nama) . "</p>";
        echo "<p><strong>Telepon:</strong> " . htmlspecialchars($tlp) . "</p>";
        echo "<p><strong>Verifikasi:</strong> Kode OTP via " . htmlspecialchars($lokasi) . "</p>";
        echo "<p>Pendaftaran akun Anda terkirim. Silahkan mengecek " . htmlspecialchars($lokasi) . " " . htmlspecialchars($tlp) . " untuk mendapatkan kode OTP verifikasi.</p>";
    }
} else {
    echo "<p>Silahkan lengkapi formulir di atas.</p>";
}
?>