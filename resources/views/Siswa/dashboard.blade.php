<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Presensi Online</title>
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
            color: #1a2a44; /* Ubah warna ikon kalender */
        }

        .home-icon {
            color: #306194; /* Ubah warna ikon home */
        }
    </style>
</head>
<body class="bg-gray-100 font-roboto">
    <div class="bg-[#192f46] text-white p-4">
        <div class="flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <img alt="School Logo" class="w-12 h-12 rounded-full" height="40" src="{{ asset('images/logo smkn 3 cimahi.png') }}" width="40"/>
            </div>
            <div class="flex-1 text-center">
                <div class="text-xl font-bold">Online Presence</div>
                <div class="text-lg">SMA Negeri 3 Cimahi</div>
            </div>
            <div class="flex items-center space-x-2">
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="text-2xl bg-transparent border-0">
                        <i class="fas fa-sign-out-alt"></i>
                    </button>
                </form>
            </div>
        </div>
        <div class="flex items-center mt-4">
            <div class="flex-1">
                <div class="text-sm">Siswa</div> <!-- Menampilkan label "Siswa" -->
                <div class="text-lg font-bold">{{ $murid->nama }}</div> <!-- Menampilkan nama siswa yang diambil dari database -->
            </div>
            <img alt="Profile Picture" class="w-12 h-12 rounded-full" height="50" src="https://storage.googleapis.com/a1aa/image/fImrG2DWoXXBda8JiPtUPOF63eg3bnlfziFshnji56cVCKQnA.jpg" width="50"/>
        </div>
    </div>
    <div class="p-4">
        <div class="grid grid-cols-3 gap-4 mb-4">
        <div class="bg-blue-200 text-blue-800 p-4 rounded-lg text-center">
                <div class="text-sm">Jumlah Hadir</div>
                <div class="text-lg font-bold">{{ $jumlahHadir }}/100</div> <!-- Menampilkan jumlah hadir -->
            </div>
            <div class="bg-red-200 text-red-800 p-4 rounded-lg text-center">
                <div class="text-sm">Jumlah tanpa Ket.</div>
                <div class="text-lg font-bold">{{ $jumlahTanpaKeterangan }}</div> <!-- Menampilkan jumlah tanpa keterangan -->
            </div>
            <div class="bg-green-200 text-green-800 p-4 rounded-lg text-center">
                <div class="text-sm">Jumlah Izin</div>
                <div class="text-lg font-bold">{{ $jumlahIzin }}</div> <!-- Menampilkan jumlah izin -->
            </div>
        </div>
        <div class="bg-white p-4 rounded-lg shadow flex items-center justify-between">
            <div class="flex items-center space-x-2">
                <div class="bg-red-100 p-2 rounded-full">
                    <i class="fas fa-file-alt text-red-500"></i>
                </div>
                <div>
                    <a href="{{ route('surat_izin.create') }}"> <!-- Tautan ke halaman buat surat izin -->
                        <div class="text-sm font-bold">Buat Surat Izin</div>
                        <div class="text-xs text-gray-500">Pengajuan Surat Izin</div>
                    </a>
                </div>
            </div>
            <i class="fas fa-chevron-right text-gray-500"></i>
        </div>
    </div>
    <div class="footer">
        <div class="footer-item">
            <a href="{{ route('dashboard') }}"> <!-- Tautan ke halaman dashboard -->
                <i class="fas fa-home home-icon"></i>
                <div>Dashboard</div>
            </a>
        </div>
        <div class="footer-item">
            <a href="{{ route('jadwal_siswa') }}"> <!-- Tautan ke halaman jadwal siswa -->
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
            <a href="{{ route('akun') }}"> <!-- Tautan ke halaman akun -->
                <i class="fas fa-user"></i>
                <div>Akun</div>
            </a>
        </div>
        <div class="footer-item">
            <a href="{{ route('surat_izin.create') }}"> <!-- Tautan ke halaman buat surat izin -->
                <i class="fas fa-file-alt"></i>
                <div>Buat Surat</div>
            </a>
        </div>
    </div>
</body>
</html>