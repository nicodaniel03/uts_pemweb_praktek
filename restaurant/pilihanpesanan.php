<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilihan</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-decoration: none;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
            color: white;
        }

        .container {
            text-align: center;
            animation: fadeIn 1.5s ease-in-out;
        }

        .div {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 60px;
            margin-top: 50px;
        }

        .pilihan, .pilihan-2 {
            width: 200px;
            padding: 20px;
            text-align: center;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 30px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .pilihan:hover, .pilihan-2:hover {
            transform: translateY(-10px);
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.3);
        }

        .pilihan h1, .pilihan-2 h1 {
            font-size: 1.2rem;
            font-weight: 600;
            color: #fff;
            animation: blink 1s infinite;
        }

        @keyframes blink {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.5;
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.8);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        footer {
            margin-top: 20px;
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.8);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Selamat Datang di Layanan Kami</h1>
        <p>Pilih opsi layanan sesuai kebutuhan Anda.</p>
        <div class="div">
            <div class="pilihan" id="pilihan1">
                <h1>Pesan Langsung Di Tempat</h1>
            </div>
                <div class="pilihan-2" id="pilihan2">
                    <h1>Pesan Dari Rumah</h1>
                </div>
        </div>
        <footer>
            <p>© 2024 Pilihan Layanan. All rights reserved.</p>
        </footer>
    </div>
    <script>
            document.getElementById('pilihan1').addEventListener('click', async () => {
        
        await Swal.fire({
            title: 'Pesan Langsung Di Tempat',
            text: 'Anda memilih opsi untuk pesan langsung di tempat!',
            icon: 'success',
            confirmButtonText: 'Lanjutkan',
            confirmButtonColor: '#6a11cb'
        });

        Swal.fire({
            title: 'Proses Berlanjut',
            text: 'Silakan lakukan proses berikutnya.',
            icon: 'info',
            confirmButtonText: 'OK',
            confirmButtonColor: '#6a11cb'
        });
    });

    document.getElementById('pilihan2').addEventListener('click', async () => {
        await Swal.fire({
            title: 'Pesan Dari Rumah',
            text: 'Anda memilih opsi untuk pesan dari rumah!',
            icon: 'info',
            confirmButtonText: 'Oke',
            confirmButtonColor: '#2575fc'
        });

        window.location.href = 'pemesanan.php';
    });

    window.onload = () => {
        document.body.style.opacity = '0';
        setTimeout(() => {
            document.body.style.transition = 'opacity 1s';
            document.body.style.opacity = '1';
        }, 100);
    };
    </script>
</body>
</html>
