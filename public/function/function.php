<?php
    include '../../include/connec.php'; // Pastikan file koneksi sudah benar

    // Fungsi untuk pendaftaran pengguna
    function daftar($userName, $email, $password) {
        global $conn;
        
        // Hash password sebelum disimpan ke database
        $kataSandi = password_hash($password, PASSWORD_DEFAULT);

        // Menggunakan prepared statement untuk memanggil prosedur tersimpan
        $stmt = $conn->prepare("CALL buatAkun(?, ?, ?)");
        $stmt->bind_param("sss", $userName, $email, $kataSandi);
        
        // Eksekusi statement dan cek hasilnya
        if($stmt->execute()){
            $stmt->close();
            return true; // Jika pendaftaran berhasil
        } else {
            // Menambahkan penanganan error
            error_log("Error: " . $stmt->error);
            $stmt->close();
            return false; // Jika pendaftaran gagal
        }
    }

    // Fungsi untuk login
    function login($nameOrEmail, $password) {
        global $conn;

        // Menggunakan prepared statement untuk memanggil prosedur tersimpan
        $stmt = $conn->prepare("CALL login(?)");
        if (!$stmt) {
            error_log("Statement preparation failed: " . $conn->error);
            return false; // Gagal mempersiapkan statement
        }
        $stmt->bind_param("s", $nameOrEmail);

        // Eksekusi statement   
        if (!$stmt->execute()) {
            error_log("Statement execution failed: " . $stmt->error);
            return false; // Gagal mengeksekusi statement
        }
            // Ambil hasil query
            $resultSandi = $stmt->get_result();

            // Jika hasil query ada datanya
            if($resultSandi->num_rows > 0){
                $row = $resultSandi->fetch_assoc();
                $storedPassword = $row['storedPassword'];

                // Verifikasi password
                if(password_verify($password, $storedPassword)){
                    $stmt->close();
                    return true; // Jika login berhasil
                } else {
                    error_log("Password salah.");
                }
            } else {
                error_log("Pengguna tidak ditemukan.");
            }

        $stmt->close();
        return false; // Jika login gagal
    }

?>
