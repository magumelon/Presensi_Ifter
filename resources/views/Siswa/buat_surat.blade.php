<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Buat Surat Izin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet"/>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            display: flex;
            flex-direction: column;
            height: 100vh; /* Mengatur tinggi body agar memenuhi layar */
        }
        /* Custom scrollbar styles */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        ::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
        .footer {
            background-color: white;
            padding: 10px 0;
            width: 100%;
            display: flex;
            justify-content: space-around;
            box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.1);
        }
        .footer .footer-item {
            text-align: center;
            color: #306194;
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
            color: #1a2a44;
        }
        .content {
            flex: 1; /* Membuat konten mengambil sisa ruang yang tersedia */
            overflow-y: auto; /* Mengaktifkan scroll pada konten */
        }
    </style>
</head>
<body class="bg-gray-100">
    <!-- Header -->
    <div class="bg-[#192f46] text-white p-4">
        <div class="flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <img alt="School Logo" class="w-10 h-10 rounded-full" height="40" src="images/logo smkn 3 cimahi.png" width="40"/>
            </div>
            <div class="flex-1 text-center">
                <div class="text-xl font-bold">Online Presence</div>
                <div class="text-lg">SMA Negeri 3 Cimahi</div>
            </div>
            <div class="flex items-center space-x-2">
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="icon" style="background: none; border: none; color: white;">
                        <i class="fas fa-sign-out-alt text-2xl"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Konten di dalam kotak biru dengan scrollbar sendiri -->
    <div class="content p-4">
    <div class="bg-[#172d44] text-white p-4 rounded-t-3xl">
            <h1 class="text-lg font-semibold">Buat Surat Izin</h1>
        </div>
        <div class="bg-[#172d44] p-4 rounded-b-3xl shadow-lg">
            <form action="{{ route('surat_izin.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="murid_id" value="{{ Auth::user()->murid->id }}"> <!-- Input tersembunyi untuk murid_id -->
                <div class="mb-4 bg-white p-4 rounded-lg">
                    <h2 class="text-gray-700 font-semibold mb-2">Informasi Diri</h2>
                    <hr class="border-gray-300 mb-4"/>
                    <div class="bg-gray-100 p-4 rounded-lg">
                        <div class="mb-2">
                            <span class="font-semibold">Nama Lengkap:</span> 
                            {{ Auth::user()->murid ? Auth::user()->murid->nama : 'Data tidak tersedia' }}
                        </div>
                        <div class="mb-2">
                            <span class="font-semibold">Alamat:</span> 
                            {{ Auth::user()->murid ? Auth::user()->murid->alamat : 'Data tidak tersedia' }}
                        </div>
                        <div>
                            <span class="font-semibold">NISN:</span> 
                            {{ Auth::user()->murid ? Auth::user()->murid->nisn : 'Data tidak tersedia' }}
                        </div>
                    </div>
                </div>
                <div class="bg-white p-4 rounded-lg">
                    <h2 class="text-gray-700 font-semibold mb-2">Alasan Izin</h2>
                    <hr class="border-gray-300 mb-4"/>
                    <div class="bg-gray-100 p-4 rounded-lg">
                        <div class="mb-2">
                            <label class="block text-gray-700 font-semibold">Tujuan Surat <span class="text-red-500">*</span></label>
                            <input class="w-full p-2 border border-gray-300 rounded-lg" name="tujuan_surat" placeholder="Tulis tujuan surat di sini" type="text" required/>
                        </div>
                        <div class="mb-2">
                            <label class="block text-gray-700 font-semibold">Alasan <span class="text-red-500">*</span></label>
                            <input class="w-full p-2 border border-gray-300 rounded-lg" name="alasan" placeholder="Wajib isi!" type="text" required/>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold">Lampiran <span class="text-red-500">*</span></label>
                            <input type="file" name="file_surat" class="w-full p-2 border border-gray-300 rounded-lg" accept=".pdf" required/>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <button type="submit" class="w-full bg-[#52bd94] text-white p-2 rounded-lg">Ajukan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <div class="footer-item">
            <a href="{{ route('dashboard') }}"> <!-- Tautan ke halaman dashboard -->
                <i class="fas fa-home home-icon"></i>
                <div>Dashboard</div>
            </a>
        </div>
        <div class="footer-item">
            <a href="{{ route('jadwal_siswa') }}"> <!-- Tautan ke halaman jadwal -->
                <i class="fas fa-calendar-alt calendar-icon"></i>
                <div>Jadwal</div>
            </a>
        </div>
        <div class="footer-item active">
            <a href="{{ route('presensi') }}"> <!-- Tautan ke halaman presensi -->
                <div class="presence-logo">
                    <i class="fas fa-camera"></i>
                </div>
                <div class="presence-logo-text" style="margin-top: 40px;">Presensi</div>
            </a>
        </div>
        
        <div class="footer-item">
            <a href="{{ route(Auth::user()->role == 'guru' ? 'akun.guru' : 'akun.siswa') }}">
                <i class="fas fa-user"></i>
                <div>Akun</div>
            </a>                
        </div>
        <div class="footer-item">
            <a href="{{ route('surat_izin.create') }}">
            <i class="fas fa-file-alt"></i>
                <div>Buat Surat</div>
            </a>
        </div>
    </div>
</body>
</html>