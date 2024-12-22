// Menangani validasi form
document.querySelector('form').addEventListener('submit', function(event) {
    var gameId = document.getElementById('game_id').value;
    var amount = document.getElementById('amount').value;
    var phone = document.getElementById('phone').value;

    // Validasi Game ID
    if (gameId === '') {
        alert('Game ID tidak boleh kosong');
        event.preventDefault(); // Mencegah form untuk submit
        return;
    }

    // Validasi jumlah top-up
    if (amount <= 0) {
        alert('Jumlah top-up harus lebih besar dari 0');
        event.preventDefault();
        return;
    }

    // Validasi nomor telepon (simple check untuk angka)
    var phonePattern = /^[0-9]{10,12}$/;
    if (!phonePattern.test(phone)) {
        alert('Nomor telepon tidak valid, pastikan hanya berisi angka dan antara 10-12 digit');
        event.preventDefault();
        return;
    }

    // Jika semua validasi lolos
    alert('Formulir berhasil disubmit!');
});
