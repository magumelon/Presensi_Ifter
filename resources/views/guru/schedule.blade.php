<html>
    <head>
        <!-- Title for the webpage -->
        <title>Presensi Online</title>

        <!-- External CSS library for font awesome icons -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>

        <!-- External CSS for importing the 'Roboto' font -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"/>

        <!-- Internal CSS styling for the page -->
        <style>
            /* General body styles: set font, remove margins/padding, set background color, and prevent scrolling */
            body {
                font-family: 'Roboto', sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f5f5f5;
                overflow: hidden; /* Prevent page scrolling */
            }

            /* Header styling: background color, text styles, and padding */
            .header {
                background-color: #1a2a44;
                color: white;
                padding: 20px;
                text-align: center;
                position: relative;
            }

            /* Styling for the school logo in the header */
            .header img {
                width: 40px;
                height: 40px;
                border-radius: 50%;
                position: absolute;
                left: 20px;
                top: 20px;
            }

            /* Styling for the title text in the header */
            .header .title {
                font-size: 18px;
                font-weight: 500;
            }

            /* Styling for the subtitle (school name) in the header */
            .header .subtitle {
                font-size: 14px;
                font-weight: 400;
            }

            /* Position and styling for the logout icon in the header */
            .header .icon {
                position: absolute;
                right: 20px;
                top: 20px;
                font-size: 24px;
            }

            /* Content area styling */
            .content {
                padding: 20px;
                height: calc(100vh - 80px); /* Adjust height to fit within the viewport */
                overflow: auto; /* Enable scrolling for the content */
            }

            /* Schedule container styling: background color, border radius, padding, and margin */
            .schedule-container {
                background-color: #192f46;
                border-radius: 10px;
                padding: 20px;
                color: white;
                margin: 30px; /* Make the schedule box position lower */
            }

            /* Styling for the header of the schedule container */
            .schedule-container h2 {
                margin-top: 0;
            }

            /* Schedule area: add margin, set max height and enable vertical scrolling */
            .schedule {
                margin-top: 20px;
                max-height: 400px; /* Set a max height for the schedule */
                overflow-y: auto; /* Enable vertical scrolling */
            }

            /* Customize the scrollbar for the schedule area */
            .schedule::-webkit-scrollbar {
                width: 8px; /* Slimmer scrollbar width */
            }

            /* Styling for the scrollbar thumb */
            .schedule::-webkit-scrollbar-thumb {
                background-color: #888; /* Scrollbar thumb color */
                border-radius: 10px; /* Rounded scrollbar thumb */
            }

            /* Styling for the scrollbar track */
            .schedule::-webkit-scrollbar-track {
                background-color: transparent; /* Scrollbar track color */
            }

            /* Individual schedule item styling: background, padding, margin, shadow, and layout */
            .schedule-item {
                background-color: white;
                border-radius: 10px;
                padding: 15px;
                margin: 10px 15px; /* ⬅️ Tambahkan ini supaya ada jarak kiri & kanan */
                display: flex;
                justify-content: space-between;
                align-items: center;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                color: #192f46;
            }

            /* Subject column within the schedule item */
            .schedule-item .subject {
                font-weight: 500;
                text-align: left;
                flex: 1;
            }

            /* Styling for the teacher name under each subject */
            .schedule-item .teacher {
                font-weight: normal; /* Make teacher names not bold */
            }

            /* Time column within the schedule item */
            .schedule-item .time {
                text-align: center;
                flex: 1;
            }

            /* Styling for the 'Waktu' label */
            .schedule-item .time div:first-child {
                font-weight: normal; /* Make 'Waktu' not bold */
            }

            /* Day column within the schedule item */
            .schedule-item .day {
                text-align: right;
                flex: 1;
            }

            /* Styling for the 'Hari' label */
            .schedule-item .day div:first-child {
                font-weight: normal; /* Make 'Hari' not bold */
            }

            /* Footer styling: background, padding, layout, and shadow */
            .footer {
                background-color: white;
                padding: 10px 0;
                position: fixed;
                bottom: 0; /* Adjusted to make it at the bottom */
                width: 100%;
                display: flex;
                justify-content: space-around;
                box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.1);
            }

            /* Styling for individual items in the footer */
            .footer .footer-item {
                text-align: center;
                color: #1a2a44;
                position: relative;
                flex: 1; /* Make each footer item take equal space */
            }

            /* Icon styling for footer items */
            .footer .footer-item i {
                display: block;
                font-size: 24px; /* Made the icons bigger */
            }

            /* Text styling for footer items */
            .footer .footer-item div {
                font-size: 12px; /* Adjusted text size to match icon size */
                margin-top: 10px; /* Made the position lower */
            }

            /* Highlight styling for the active footer item */
            .footer .footer-item.active {
                color: #1a2a44;
            }

            /* Styling for the presence logo in the center of the footer */
            .footer .presence-logo {
                position: absolute;
                top: -30px; /* Moved up a little */
                left: 50%;
                transform: translateX(-50%);
                background-color: #1a2a44;
                border-radius: 50%;
                padding: 15px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                text-align: center;
            }

            /* Styling for the camera icon inside the presence logo */
            .footer .presence-logo i {
                font-size: 24px; /* Made the icon bigger */
                color: white;
            }

            /* Styling for the text under the presence logo */
            .footer .presence-logo-text {
                margin-top: 40px; /* Adjusted to position the text a little higher */
                font-size: 12px; /* Adjusted text size to match icon size */
                color: #1a2a44; /* Match the text color with the footer item color */
            }

            /* Change color of the calendar icon in the footer */
            .footer .calendar-icon {
                color: #306194; /* Changed calendar icon color */
            }
        </style>
    </head>
    <body>
        <!-- Header section containing school logo, title, and logout icon -->
        <div class="header">
            <!-- School logo image -->
            <img alt="School Logo" height="40" src="images/logo smkn 3 cimahi.png" width="40"/>
            <!-- Main title of the page -->
            <div class="title">Presensi Online</div>
            <!-- Subtitle containing the school's name -->
            <div class="subtitle">SMA Negeri 3 Cimahi</div>
            <!-- Logout icon -->
            <i class="fas fa-sign-out-alt icon"></i>
        </div>

        <!-- Main content area for displaying the schedule -->
        <div class="schedule-container">
            <h2>Jadwal Minggu Ini :</h2>
            <div class="schedule">
                <!-- Loop through the schedule data -->
                @foreach ($schedule as $item)
                <div class="schedule-item">
                    
                    <div class="subject">
                        <span class="teacher"> {{ $item->nama_guru }}</span>
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
            </div>
        </div>
    </div>       

        <!-- Footer section containing navigation links and camera icon for presensi -->
        <div class="footer">
            <div class="footer-item">
                <a href="/dashboard">  <!-- Tambahkan tag <a> dengan href menuju ke halaman dashboard -->
                    <i class="fas fa-home home-icon"></i> <!-- Tambahkan class home-icon -->
                    <div>Dashboard</div>
                </a>
            </div>
            
            <div class="footer-item">
                <i class="fas fa-calendar-alt calendar-icon"></i>
                <div style="margin-top: 10px;">Jadwal</div>
            </div>
            <div class="footer-item active">
                <div class="presence-logo">
                    <i class="fas fa-users"></i>
                </div>
                <div class="presence-logo-text" style="margin-top: 40px;">Cek Presensi</div>
            </div>
            <div class="footer-item">
                <i class="fas fa-user"></i>
                <div style="margin-top: 10px;">Akun</div>
            </div>
            <div class="footer-item">
                <i class="fas fa-envelope"></i>
                <div>Surat Masuk</div>
            </div>
        </div>
    </body>
</html>
