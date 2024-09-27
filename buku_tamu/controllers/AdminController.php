<?php
include_once __DIR__.'/../config/Database.php';
include_once __DIR__.'/../models/Admin.php';

class AdminController {
    private $admin;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->admin = new Admin($db);
    }

    // Fungsi untuk login
    public function login($username, $password) {
        $this->admin->username = $username;
        $this->admin->password = $password;
        return $this->admin->login();
    }
}
?>

Membuat View
Form Buku Tamu
/views/guest_form.php
<h2>Selamat Datang di Buku Tamu</h2>
<form action="index.php" method="post">
    <label for="name">Nama:</label><br>
    <input type="text" name="name" required><br><br>
    <label for="comment">Komentar:</label><br>
    <textarea name="comment" rows="5" required></textarea><br><br>
    <input type="submit" value="Kirim">
</form>


Daftar Buku Tamu
/views/guest_list.ph
<h3>Daftar Komentar</h3>
<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>Nama</th>
        <th>Komentar</th>
        <th>Waktu</th>
    </tr>
    <?php while ($row = $guests->fetch(PDO::FETCH_ASSOC)) { ?>
    <tr>
        <td><?php echo htmlspecialchars($row['name']); ?></td>
        <td><?php echo htmlspecialchars($row['comment']); ?></td>
        <td><?php echo $row['created_at']; ?></td>
    </tr>
    <?php } ?>
</table>

