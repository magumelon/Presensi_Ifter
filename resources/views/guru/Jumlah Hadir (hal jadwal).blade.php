<html>
<head>
    <title>Presensi Online</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"/>
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            overflow: hidden;
        }

        .content {
            padding: 20px;
            height: calc(100vh - 140px);
            overflow: auto;
        }

        .schedule-container {
            background-color: #192f46;
            border-radius: 15px;
            padding: 20px;
            color: white;
            text-align: center;
        }

        .schedule-container h2 {
            margin-top: 0;
            font-size: 20px;
        }

        .schedule-item {
            background-color: white;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 10px;
            display: flex;
            flex-direction: column;
            color: #192f46;
            cursor: pointer;
            transition: max-height 0.3s ease;
            overflow: hidden;
        }

        .schedule-item .details {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .schedule-item .subject {
            font-weight: 500;
            flex: 1;
            text-align: left;
        }

        .schedule-item .teacher, .schedule-item .time, .schedule-item .day {
            flex: 1;
            text-align: center;
        }

        .schedule-item .day {
            text-align: right;
        }

        .expanded-content {
            display: none;
            width: 100%;
            margin-top: 10px;
            text-align: left;
            padding-top: 10px;
            border-top: 1px solid #ddd;
        }

        .schedule-item.expanded .expanded-content {
            display: block;
        }

        .attendance-count {
            font-size: 16px;
            margin: 10px 0;
            color: #1a2a44;
        }

        .register-button {
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            display: block;
            margin-top: 10px;
            text-align: center;
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
            color: #306194;
        }
    </style>
</head>
<body class="bg-gray-100 font-roboto">
    <!-- Header -->
    <div class="w-full bg-[#192f46] text-white p-4">
        <div class="flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <img alt="School Logo" class="w-10 h-10 rounded-full" height="40" src="images/logo smkn 3 cimahi.png" width="40"/>
            </div>
            <div class="flex-1 text-center">
                <div class="text-xl font-bold">Presensi Online</div>
                <div class="text-lg">SMK Negeri 3 Cimahi</div>
            </div>
            <div class="flex items-center space-x-2">
                <i class="fas fa-sign-out-alt text-2xl"></i>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="content">
        <div class="schedule-container">
            <h2>Jadwal :</h2>
            <div class="schedule">
                <div class="schedule-item" onclick="toggleDetails(this)">
                    <div class="details">
                        <div class="subject">12 DKV 1<br/>
                            <span class="teacher">Ibu Marisa</span>
                        </div>
                        <div class="time">
                            <div>Waktu</div>
                            <div>07.00</div>
                        </div>
                        <div class="day">
                            <div>Hari</div>
                            <div>Senin</div>
                        </div>
                    </div>
                    <div class="expanded-content">
                        <div class="attendance-count">Jumlah Siswa Hadir : 30</div>
                        <button class="register-button">Daftar hadir</button>
                    </div>
                </div>
                
                <div class="schedule-item" onclick="toggleDetails(this)">
                    <div class="details">
                        <div class="subject">10 DKV 2<br/>
                            <span class="teacher">Bapak Wawan</span>
                        </div>
                        <div class="time">
                            <div>Waktu</div>
                            <div>10.00</div>
                        </div>
                        <div class="day">
                            <div>Hari</div>
                            <div>Senin</div>
                        </div>
                    </div>
                    <div class="expanded-content">
                        <div class="attendance-count">Jumlah Siswa Hadir : 28</div>
                        <button class="register-button">Daftar hadir</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <div class="footer-item">
            <a href="/dashboard">
                <i class="fas fa-home home-icon"></i>
                <div>Dashboard</div>
            </a>
        </div>
        <div class="footer-item">
            <a href="/schedule">
                <i class="fas fa-calendar-alt calendar-icon"></i>
                <div>Jadwal</div>
            </a>
        </div>
        <div class="footer-item active">
            <a href="/presensi">
                <div class="presence-logo">
                    <i class="fas fa-users"></i>
                </div>
                <div class="presence-logo-text" style="margin-top: 40px;">Cek Presensi</div>
            </a>
        </div>
        <div class="footer-item">
            <a href="/akun">
                <i class="fas fa-user user-icon"></i>
                <div>Akun</div>
            </a>
        </div>
        <div class="footer-item">
            <a href="/surat-izin/create">
                <i class="fas fa-envelope"></i>
                <div>Surat Masuk</div>
            </a>
        </div>
    </div>
    

    <script>
        function toggleDetails(item) {
            item.classList.toggle("expanded");
        }
    </script>
</body>
</html>
