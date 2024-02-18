<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot Sederhana | Ngodingpintar</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

<body>
    <div class="wrapper">
        <div class="title">Chatbot Pertama saya</div>
        <div class="form">
            <div class="bot-inbox inbox">
                <div class="icon">
                    <i class="fas fa-user"></i>
                </div>
                <div class="msg-header">
                    <p>Hai, ada yang bisa saya bantu? </p>
                </div>
            </div>
        </div>
        <div class="typing-field">
            <div class="input-data">
                <input id="text-pesan" type="text" placeholder="Ketikkan sesuatu disini..." required>
                <button id="send-btn">Kirim</button>
            </div>
        </div>
    </div>

</body>

<script>
    $(document).ready(function() {
        // jika tombol diklik
        $('#send-btn').on('click', function() {
            // ambil inputan pesan
            $pesan = $('#text-pesan').val();
            
            // simpan pesan
            $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>' + $pesan + '</p></div></div>'

            // masukkan ke form
            $('.form').append($msg);

            // ubah kembali inputan menjadi kosong setelah terisi
            $('#text-pesan').val('');

            // persiapan ajax
            $.ajax({
                url : 'pesan.php',
                type: 'POST',
                data: "isi_pesan=" + $pesan,
                success : function(result) {
                    // jika sukses kirim datanya
                    $balasan = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>'+ result +'</p></div></div>';

                    // masukkan ke form
                    $('.form').append($balasan);

                    // buat form otomatis ke scroll kebawah
                    $('.form').scrollTop($('.form')[0].scrollHeight);
                }
            })
        })
    })
</script>

</html>