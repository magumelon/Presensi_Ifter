<!DOCTYPE html>
<html lang="en">
<head>
    <title>Jadwal Siswa</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"/>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            overflow: hidden;
        }

        .header {
            background-color: #1a2a44;
            color: white;
            padding: 20px;
            text-align: center;
            position: relative;
        }

        .header img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            position: absolute;
            left: 20px;
            top: 20px;
        }

        .header .title {
            font-size: 18px;
            font-weight: 500;
        }

        .header .subtitle {
            font-size: 14px;
            font-weight: 400;
        }

        .header .icon {
            position: absolute;
            right: 20px;
            top: 20px;
            font-size: 24px;
        }

        .content {
            padding: 20px;
            height: calc(100vh - 80px);
            overflow: auto;
        }

        .schedule-container {
            background-color: #192f46;
            border-radius: 10px;
            padding: 20px;
            color: white;
            margin-top: 20px;
        }

        .schedule-container h2 {
            margin-top: 0;
        }

        .schedule {
            margin-top: 20px;
            max-height: 400px;
            overflow-y: auto;
        }

        .schedule::-webkit-scrollbar {
            width: 8px;
        }

        .schedule::-webkit-scrollbar-thumb {
            background-color: #888;
            border-radius: 10px;
        }

        .schedule::-webkit-scrollbar-track {
            background-color: transparent;
        }

        .schedule-item {
            background-color: white;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 10px;
            display: flex;
            justify-content: center; /* Pusatkan konten */
            align-items: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            color: #192f46;
        }

        .schedule-item .subject,
        .schedule-item .time,
        .schedule-item .day {
            flex: 1; /* Pastikan setiap kolom memiliki lebar yang sama */
            text-align: center; /* Pusatkan teks di setiap kolom */
        }

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
            color: #1a2a44; /* Pastikan semua ikon memiliki warna yang sama */
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

        .footer .calendar-icon {
            color: #306194; /* Warna untuk ikon kalender */
        }
    </style>
</head>
<body>
    <div class="header">
        <img alt="School Logo" height="40" src="images/logo smkn 3 cimahi.png" width="40"/>
        <div class="title">Presensi Online</div>
        <div class="subtitle">SMA Negeri 3 Cimahi</div>
        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="icon" style="background: none; border: none; color: white;">
                <i class="fas fa-sign-out-alt"></i>
            </button>
        </form>
    </div>

    <div class="content">
        <div class="schedule-container">
            <h2>Jadwal Minggu Ini:</h2>
            <div class="schedule">
                @if(empty($jadwal))
                    <p>Tidak ada jadwal yang tersedia.</p>
                @else
                    @foreach($jadwal as $item)
                        <div class="schedule-item">
                            <div class="subject">{{ $item->matapelajaran }}<br/>
                                <span class="teacher">{{ $item->guru->nama }}</span>
                            </div>
                            <div class="time">
                                <div style="font-weight: normal;">Waktu</div>
                                <div>{{ $item->jam }}</div>
                            </div>
                            <div class="day">
                                <div style="font-weight: normal;">Hari</div>
                                <div>{{ $item->hari }}</div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="footer-item">
            <a href="{{ route('dashboard') }}"> <!-- Tautan ke halaman dashboard -->
                <i class="fas fa-home"></i>
                <div style="margin-top: 10px;">Dashboard</div>
            </a>
        </div>
        <div class="footer-item active">
            <a href="{{ route('jadwal_siswa') }}"> <!-- Tautan ke halaman jadwal -->
                <i class="fas fa-calendar-alt calendar-icon"></i> <!-- Ikon kalender dengan warna yang sesuai -->
                <div style="margin-top: 10px;">Jadwal</div>
            </a>
        </div>
        <div class="footer-item">
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
                <div style="margin-top: 10px;">Akun</div>
            </a>
        </div>
        <div class="footer-item">
            <a href="{{ route('surat_izin.create') }}"> <!-- Tautan ke halaman buat surat izin -->
                <i class="fas fa-file-alt"></i>
                <div style="margin-top: 10px;">Buat Surat</div>
            </a>
        </div>
    </div>
</body>
</html>