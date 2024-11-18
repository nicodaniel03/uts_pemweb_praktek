
<?php
include 'function.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $jenis_pesanan = $_POST['jenis_pesanan'];
    $jumlah_pesanan = $_POST['jumlah_pesanan'];
    $harga_pesanan = $_POST['harga_pesanan'];
    $total_harga = $jumlah_pesanan * $harga_pesanan;

    if ($conn) {
        $stmt = $conn->prepare("INSERT INTO history_pesanan (jenis_pesanan, jumlah_pesanan, harga_pesanan, total_harga) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sidd", $jenis_pesanan, $jumlah_pesanan, $harga_pesanan, $total_harga);

        if ($stmt->execute()) {
            echo "Pesanan berhasil ditambahkan!";
        } else {
            echo "Gagal menambahkan pesanan: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Koneksi ke database gagal.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rincian Pesanan</title>
    <link rel="stylesheet" href="css/info.css">
</head>
<body>   
    
    <div class="notice">
        <p class="notice-2"><span class="catat">Catatan:</span> Tolong periksa kembali pesanan Anda. Jika masih ada yang ingin diubah, Anda dapat memilih <i>Batalkan Pesanan</i>. Apabila sudah sesuai, silakan lanjutkan ke tahap <i>Pembayaran</i>.</p>
    </div>
    <div class="container">
        <a href="pemesanan.php" id="cancelOrderButton"> 
            <button class="cancel">Batalkan Pesanan</button>
        </a>
        <h1>Rincian Pesanan</h1>

        <table>
            <thead>
                <tr>
                    <th>Jenis Pesanan</th>
                    <th>Nama Makanan</th>
                    <th>Jumlah Pesanan</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody id="orderDetails"></tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="total">Total</td>
                    <td id="totalPrice" style="font-weight: bold; font-size: 15px;">Rp. 0</td> 
                </tr>
            </tfoot>
        </table>

    </div>

    <footer class="lanjut">
        <a href="metodebayar.php">
            <button type="submit" class="next" id="paymentButton">Bayar Rp. 0</button>
        </a>
    </footer>
        
<script>
        swal.fire({
    title: "Good job!",
    text: "You clicked the button!",
    icon: "success"
    });
     function loadOrderDetails() {
        const orderDetails = JSON.parse(localStorage.getItem('orders')) || {};
        const orderTableBody = document.getElementById('orderDetails');
        orderTableBody.innerHTML = '';

        let totalPrice = 0;

        for (const itemName in orderDetails) {
            const order = orderDetails[itemName];

            if (order.jumlah > 0) {
                const harga = order.jumlah * order.harga;

                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${order.kategori}</td>
                    <td>${itemName}</td>
                    <td>${order.jumlah}</td>
                    <td>Rp. ${harga.toLocaleString('id-ID')}</td>
                `;
                orderTableBody.appendChild(row);

                totalPrice += harga;
            }
        }

        document.getElementById('totalPrice').textContent = `Rp. ${totalPrice.toLocaleString('id-ID')}`;

        document.getElementById('paymentButton').textContent = `Bayar Rp. ${totalPrice.toLocaleString('id-ID')}`;
    }

    loadOrderDetails();

    document.getElementById('cancelOrderButton').addEventListener('click', function(event) {
        event.preventDefault();
        localStorage.removeItem('orders'); 
        loadOrderDetails(); 
        window.location.href = 'pemesanan.php'; 
    });

    document.getElemntbyId('paymenbutton').addEvenListener('click', function(event){

    })

</script>
</body>
</html>

