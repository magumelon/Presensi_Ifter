<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presensi Online</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        .header {
            background-color: #1a2a44;
            color: white;
            padding: 20px;
            text-align: center;
            position: relative;
        }

        .header .icon {
    position: absolute;
    right: 20px;
    top: 20px;
    font-size: 24px;
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

        .container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            flex-grow: 1;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .section {
            margin-bottom: 30px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .camera-section {
            text-align: center;
        }

        .camera-btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }

        #video {
            width: 100%;
            height: auto;
            border-radius: 8px;
            border: 2px solid #ddd;
            margin-bottom: 10px;
        }

        #map {
    height: 300px; /* Set a fixed height */
    width: 100%; /* Ensure it takes full width */
    border-radius: 8px;
    margin-top: 10px;
    position: relative; /* Ensure map does not move */
}


        .location-section {
            text-align: center;
        }

        .message {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #333;
        }

        .button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }

        /* Footer Navbar */
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

        .footer a {
    text-decoration: none;
    color: inherit; /* biar warna tetap sesuai parent */
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
            color: #306194;
        }

        .footer .presence-logo {
            position: absolute;
            top: -30px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #306194;
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
    

    <div class="container">
        <h2>Presensi Online</h2>

        <!-- Camera Section -->
        <div class="section camera-section">
            <h3>Ambil Foto Untuk Absensi</h3>
            <video id="video" autoplay></video>
            <button type="button" class="camera-btn" id="captureBtn">Ambil Foto</button>
            <canvas id="canvas" style="display:none;"></canvas>
        </div>

        <!-- Location Section -->
        <div class="section location-section">
            <h3>Lokasi Anda</h3>
            <div id="map" style="height: 300px; width: 100%;"></div>

            <button type="button" class="button" id="checkLocationBtn">Cek Lokasi & Absen</button>
        </div>

        <!-- Message Section -->
        <div class="message" id="message"></div>
    </div>

    <!-- Bottom Navbar -->
    <div class="footer">
        <div class="footer-item">
            <a href="{{ route('dashboard') }}"> <!-- Tautan ke halaman dashboard -->
                <i class="fas fa-home home-icon"></i>
                <div>Dashboard</div>
            </a>
        </div>
        <div class="footer-item">
            <a href="{{ route('jadwal_siswa') }}"> <!-- Tautan ke halaman jadwal -->
                <i class="fas fa-calendar-alt calendar-icon"></i> <!-- Ikon kalender dengan warna yang sesuai -->
                <div style="margin-top: 10px;">Jadwal</div>
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
            <a href="{{ route('surat_izin.create') }}"> <!-- Tautan ke halaman buat surat izin -->
                <i class="fas fa-file-alt"></i>
                <div>Buat Surat</div>
            </a>
        </div>
    </div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        let video = document.getElementById('video');
        let canvas = document.getElementById('canvas');
        let captureBtn = document.getElementById('captureBtn');
        let message = document.getElementById('message');
        let checkLocationBtn = document.getElementById('checkLocationBtn');

        // Initialize camera
        if (navigator.mediaDevices.getUserMedia) {
            navigator.mediaDevices.getUserMedia({ video: true })
                .then(function (stream) {
                    video.srcObject = stream;
                })
                .catch(function (err) {
                    message.innerHTML = 'Gagal mengakses kamera';
                });
        }

        // Capture the photo from the camera
        captureBtn.onclick = function() {
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            canvas.getContext('2d').drawImage(video, 0, 0);
            let photoData = canvas.toDataURL('image/png');
            console.log(photoData); // Kirim foto ke server atau proses sesuai kebutuhan
        };

        // Get user's location and check against the radius
        checkLocationBtn.onclick = function() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    let latitude = position.coords.latitude;
                    let longitude = position.coords.longitude;

                    // Call backend to check if location is within radius
                    fetch('/presensi/check-location', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            latitude: latitude,
                            longitude: longitude
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        message.innerHTML = data.message;
                    })
                    .catch(error => {
                        message.innerHTML = 'Error: ' + error.message;
                    });
                });
            } else {
                message.innerHTML = 'Geolocation tidak didukung di browser ini';
            }
        };

        // Initialize map
        let map = L.map('map').setView([-6.863292, 107.589597], 13); // Initial coordinates (SMKN 3 Cimahi)

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

let userMarker; // To store the user's current marker

// Get user's location and update the map
navigator.geolocation.getCurrentPosition(function(position) {
    let userLatitude = position.coords.latitude;
    let userLongitude = position.coords.longitude;

    // Center map on user's location
    map.setView([userLatitude, userLongitude], 13);

    // Remove any old markers
    if (userMarker) {
        map.removeLayer(userMarker);
    }

    // Add a marker for the user's current location
    userMarker = L.marker([userLatitude, userLongitude]).addTo(map).bindPopup('Your Location').openPopup();
}, function(error) {
    console.log("Error getting location: ", error);
    // Default to SMKN 3 Cimahi if location is not available
    map.setView([-6.863292, 107.589597], 13);
});

// Ensure map size is recalculated when window is resized
window.addEventListener('resize', function () {
    map.invalidateSize(); // Forces a re-calculation of the map size
});


    </script>
</body>
</html>
