<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
  <style>
    .footer {
        background-color: white;
        padding: 10px 0;
        position: fixed;
        bottom: 0;
        width: 100%;
        display: flex;
        justify-content: space-around;
        box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.1);
    }

    .footer .footer-item {
        text-align: center;
        color: #1a2a44;
        position: relative;
        flex: 1;
    }

    .footer .footer-item i {
        display: block;
        font-size: 24px;
    }

    .footer .footer-item div {
        font-size: 12px;
        margin-top: 10px;
    }

    .footer .footer-item.active {
        color: #1a2a44;
    }

    .footer .presence-logo {
        position: absolute;
        top: -30px;
        left: 50%;
        transform: translateX(-50%);
        background-color: #1a2a44;
        border-radius: 50%;
        padding: 15px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .footer .presence-logo i {
        font-size: 24px;
        color: white;
    }

    .footer .presence-logo-text {
        margin-top: 40px;
        font-size: 12px;
        color: #1a2a44;
    }

    .calendar-icon {
        color: #1a2a44;
    }

    .home-icon {
        color: #1a2a44;
    }

    .user-icon {
        color: #306194;
    }
  </style>
</head>
<body class="bg-gray-100 font-roboto">
  <div class="bg-[#192f46] text-white p-4">
   <div class="flex justify-between items-center">
    <div class="flex items-center space-x-2">
     <img alt="School Logo" class="w-12 h-12 rounded-full" height="40" src="images/logo smkn 3 cimahi.png" width="40"/>
    </div>
    <div class="flex-1 text-center">
     <div class="text-xl font-bold">
      Online Presence
     </div>
     <div class="text-lg">
      SMA Negeri 3 Cimahi
     </div>
    </div>
    <div class="flex items-center space-x-2">
     <i class="fas fa-sign-out-alt text-2xl"></i>
    </div>
   </div>
  </div>

  <div class="bg-[#192f46] text-white p-2 rounded-3xl mt-4 mx-4 h-[600px]">
   <div class="text-center">
    <h1 class="text-xl font-bold">
     Profile
    </h1>
    <img alt="Profile Picture" class="rounded-full mx-auto mt-4" height="100" src="https://storage.googleapis.com/a1aa/image/91iLIOeG7QVtDiDYCrFbWIwYOstgopoUnZcQmmWXhLeKTGoTA.jpg" width="100"/>
   </div>
   <div class="bg-white text-black p-4 mt-4 rounded-lg">
    <h2 class="font-bold">Informasi Diri</h2>
    <div class="mt-2">
        <div class="flex">
            <div class="w-1/3 font-semibold">Nama Lengkap</div>
            <div class="w-2/3">{{ $guru->nama }}</div> <!-- Menampilkan nama guru -->
        </div>
        <div class="flex mt-2">
            <div class="w-1/3 font-semibold">Alamat</div>
            <div class="w-2/3">{{ $guru->alamat ?? 'Belum diisi' }}</div> <!-- Menampilkan alamat guru -->
        </div>
        <div class="flex mt-2">
            <div class="w-1/3 font-semibold">NIP</div>
            <div class="w-2/3">{{ $guru->nip ?? 'Belum diisi' }}</div> <!-- Menampilkan NIP guru -->
        </div>
    </div>
</div>

   </div>
  </div>

  <!-- Footer navigation -->
  <div class="footer">
    <div class="footer-item">
        <i class="fas fa-home home-icon"></i>
        <div>Dashboard</div>
    </div>
    <div class="footer-item">
        <i class="fas fa-calendar-alt calendar-icon"></i>
        <div>Jadwal</div>
    </div>
    <div class="footer-item active">
        <div class="presence-logo">
            <i class="fas fa-users"></i>
        </div>
        <div class="presence-logo-text" style="margin-top: 40px;">Cek Presensi</div>
    </div>
    <div class="footer-item">
        <i class="fas fa-user user-icon"></i>
        <div>Akun</div>
    </div>
    <div class="footer-item">
        <i class="fas fa-envelope"></i>
        <div>Surat Maauk</div>
    </div>
  </div>
</body>
</html>
