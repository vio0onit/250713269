function fn_ValForm() {
     var nama = document.getElementById("nama").value;
     var email = document.getElementById("email").value;
     var umur = document.getElementById("umur").value;
     var kategori = document.getElementById("kategori").value;
     var sMsg = "";
     var validasi = /^[a-z0-9][a-z0-9_\.-]{0,}[a-z0-9]@[a-z0-9][a-z0-9_\.-]{0,}[a-z0-9][\.][a-z0-9]{2,4}$/;

     if (nama == "") {
         sMsg += "Nama harus diisi\n";
     }

     if (email == "") {
         sMsg += "Email harus diisi\n";
      } else if (!validasi.test(email) == false) {
        sMsg += "Email tidak valid\n";
      }

     if (umur == "") {
         sMsg += "Umur harus diisi\n";
     } else {
        if (umur >= 15 && umur <= 60) {
            if(umur <= 25){
                alert("Peserta mahasiswa");
            } else {
                alert("Peserta umum");
            }
        }
     }

     if (kategori == "") {
         sMsg += "Kategori harus diisi\n";
     } else {
        var pilihan = "";
        switch(kategori) {
            case "W":
                pilihan = "Workshop";
                break;
            case "S":
                pilihan = "Seminar";
                break;
            case "L":
                pilihan = "Lomba Coding";
                break;
        }
     }

    if (sMsg != "") {
        alert("Data anda belum lengkap:\n" + sMsg);
        return false;
    } else {
        return true;
    }
}
