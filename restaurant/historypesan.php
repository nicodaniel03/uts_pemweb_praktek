
<?php
include 'function.php';

$query = "SELECT * FROM history_pesanan";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History Pemesanan</title>
    <link rel="stylesheet" href="css/history.css"> 
</head>
<body>
    <h1>History Pemesanan</h1>
    <table class="tabel-2">
        <thead>
            <tr>
                <th>No</th>
                <th>Jenis Pesanan</th>
                <th>Jumlah Pesanan</th>
                <th>Harga</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $grand_total = 0;
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $grand_total += $row['total_harga'];
                    echo "<tr>";
                    echo "<td>" . $no++ . "</td>";
                    echo "<td>" . $row['jenis_pesanan'] . "</td>";
                    echo "<td>" . $row['jumlah_pesanan'] . "</td>";
                    echo "<td>Rp " . number_format($row['harga_pesanan'], 2, ',', '.') . "</td>";
                    echo "<td>Rp " . number_format($row['total_harga'], 2, ',', '.') . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Tidak ada data pesanan.</td></tr>";
            }
            ?>
            <tr>
                <td colspan="4"><strong class="total">Total</strong></td>
                <td><strong>Rp <?php echo number_format($grand_total, 2, ',', '.'); ?></strong></td>
            </tr>
        </tbody>
    </table>
</body>
</html>
