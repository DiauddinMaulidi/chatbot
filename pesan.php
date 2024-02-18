<?php
    
    $conn = mysqli_connect("localhost", "root", "", "lat_chatbox") or die ("database error");

    // ambil pesasn dari ajax
    $pesan = mysqli_real_escape_string($conn, $_POST['isi_pesan']);

    // cek pertanyaan ke dalam database
    $result = mysqli_query($conn, "SELECT jawaban FROM chatbot WHERE pertanyaan LIKE '%$pesan%' ");

    if (mysqli_num_rows($result) > 0) {
        
        // jika ada tampung ke dalam variable
        $data = mysqli_fetch_assoc($result);

        // kirim kembali data ke ajax
        $jawab = $data['jawaban'];
        echo $jawab;
    } else {
        echo "maaf ga ngerti bahasa antum";
    }

?>