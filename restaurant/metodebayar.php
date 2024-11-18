<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Metode Pembayaran</title>
    <link rel="stylesheet" href="bayar.css">
</head>
<body>
    <div class="payment-container">
        <h1>Pilih Metode Pembayaran</h1>
        <div class="payment-options">
            <div class="payment-option">
                <div class="payment-icon bank-icon"></div>
                <h2>Bank Transfer</h2>
                <p>Pilih metode pembayaran via Bank.</p>
                <button class="pay-button bank-btn" onclick="toggleBankOptions()">Pilih Bank</button>
                <div id="bank-options" class="bank-options">
                    <select>
                        <option value="mandiri">Mandiri</option>
                        <option value="bca">BCA</option>
                        <option value="bri">BRI</option>
                        <option value="bni">BNI</option>
                        <option value="permata">Bank Permata</option>
                        <option value="bsi">Bank Syariah Indonesia (BSI)</option>
                    </select>
                </div>
            </div>

            <div class="payment-option">
                <div class="payment-icon dana-icon"></div>
                <h2>E-Wallet</h2>
                <p>Pilih metode pembayaran via E-Wallet.</p>
                <button class="pay-button wallet-btn" onclick="toggleWalletOptions()">Pilih E-Wallet</button>
                <div id="wallet-options" class="wallet-options">
                    <select>
                        <option value="dana">Dana</option>
                        <option value="gopay">GoPay</option>
                        <option value="ovo">OVO</option>
                        <option value="shoppe">ShopeePay</option>
                    </select>
                </div>
            </div>

            <div class="payment-option">
                <div class="payment-icon qr-icon"></div>
                <h2>QR-Code</h2>
                <p>Pilih metode pembayaran via QR-Code.</p>
                <button class="pay-button qr-btn" onclick="zoomQRCode('img/qrcode.png')">Scan QR untuk Bayar</button>
            </div>
        </div>
    </div>

    <div id="qr-modal" class="qr-modal">
        <span class="close" onclick="closeModal()">&times;</span>
        <img id="modal-qr-img" src="" alt="QR Code Zoomed" class="modal-qr-image">
    </div>

    <script>
        function toggleBankOptions() {
            const bankOptions = document.getElementById('bank-options');
            bankOptions.style.display = bankOptions.style.display === 'none' || bankOptions.style.display === '' ? 'block' : 'none';
        }

        function toggleWalletOptions() {
            const walletOptions = document.getElementById('wallet-options');
            walletOptions.style.display = walletOptions.style.display === 'none' || walletOptions.style.display === '' ? 'block' : 'none';
        }

        function zoomQRCode() {
            const qrModal = document.getElementById('qr-modal');
            const modalQRImg = document.getElementById('modal-qr-img');
            modalQRImg.src = 'img/qrcode.png';
            qrModal.style.display = 'flex';
        }

        function closeModal() {
            const qrModal = document.getElementById('qr-modal');
            qrModal.style.display = 'none';
        }

        window.addEventListener('click', function(event) {
            const bankOptions = document.getElementById('bank-options');
            const walletOptions = document.getElementById('wallet-options');
            if (!event.target.closest('.pay-button.bank-btn') && !event.target.closest('#bank-options')) {
                bankOptions.style.display = 'none';
            }
            if (!event.target.closest('.pay-button.wallet-btn') && !event.target.closest('#wallet-options')) {
                walletOptions.style.display = 'none';
            }
        });
    </script>
</body>
</html>
