
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f3f5;
            margin: 0;
            padding: 0;
        }

        .content-container {
            display: flex;
            justify-content: space-between;
            padding: 20px;
            height: 100vh;
            flex-wrap: wrap; /* Allows flex items to wrap on smaller screens */
        }

        .sidebar {
            width: 30%;
            padding: 26px;
            background-color: #f1f3f5;
            order: 1; /* Default order for desktop */
        }

        .sidebar h2 {
            font-size: 26px;
            margin-bottom: 20px;
            color: #333;
        }

        .sidebar .link-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            color: #2b2e3b;
            text-decoration: none;
        }

        .sidebar .link-item:hover {
            background-color: #e0e0e0;
        }

        .sidebar .link-item.active {
            background-color: #2b2e3b;
            color: white;
        }

        .main-content {
            width: 65%;
            padding: 20px;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            order: 2; /* Default order for desktop */
        }

        .card {
            width: 100%;
            background-color: #4b6240;
            color: white;
            border-radius: 10px;
            padding: 20px;
        }

        .card img {
            width: 100%;
            border-radius: 5px;
        }

        .card-title {
            font-size: 18px;
            margin-top: 10px;
        }

        .card-text {
            font-size: 14px;
            margin-top: 10px;
        }

        .btn-visit {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 15px;
            border: 1px solid white;
            border-radius: 5px;
            text-decoration: none;
            color: white;
        }

        .btn-visit:hover {
            background-color: #3a4b35;
        }

        /* Media Query for Mobile Devices */
        @media (max-width: 768px) {
            .content-container {
                flex-direction: column; /* Stack elements vertically */
                height: auto; /* Remove fixed height */
            }

            .sidebar {
                width: 100%; /* Full width on mobile */
                padding: 15px;
                order: 3; /* Move the sidebar below the main content */
            }

            .sidebar h2 {
                font-size: 22px;
                margin-bottom: 15px;
            }

            .sidebar .link-item {
                font-size: 16px;
                padding: 12px;
            }

            .main-content {
                width: 100%; /* Full width on mobile */
                margin-top: 10px;
                padding: 15px;
                order: 2; /* Keep main content in the middle */
            }

            .card-title {
                font-size: 16px;
            }

            .card-text {
                font-size: 13px;
            }

            .btn-visit {
                font-size: 14px;
                padding: 8px 12px;
            }
        }
    </style>
</head>
<body>
    <div class="content-container">
        <div class="sidebar">
            <h2>Company Links</h2>
            <a href="#" class="link-item" data-link="https://emergedigital.co.za" data-title="Emerge Digital" data-type="Hosting" data-img="https://riseims.emergetwo.co.za/assets/images/link-banners/emergedigital-banner.jpg" data-desc="We resell hosting to all startups, local and international.">
                Emerge Digital <span>Hosting</span>
            </a>
            <a href="#" class="link-item" data-link="https://emergestudio.co.za" data-title="Emerge Studio" data-type="Creative" data-img="https://riseims.emergetwo.co.za/assets/images/link-banners/emergedigital-banner.jpg" data-desc="We are a Brand, Develop and Marketing Agency">
                Emerge Studio <span>Creative</span>
            </a>
            <a href="#" class="link-item" data-link="https://afrihost.com" data-title="Afrihost" data-type="Hosting" data-img="https://riseims.emergetwo.co.za/assets/images/link-banners/afrihost-banner.jpg" data-desc="Afrihost South African Internet Service Provider providing a number of services, including web hosting.">
                Afrihost <span>Hosting</span>
            </a>
            <a href="#" class="link-item" data-link="https://20i.com" data-title="20i" data-type="Hosting" data-img="https://riseims.emergetwo.co.za/assets/images/link-banners/20i-banner.jpg" data-desc="High-performance Reseller Hosting.">
                20i <span>Hosting</span>
            </a>
            <!-- Add more link items as needed -->
        </div>

        <div class="main-content">
            <div class="card">
                <img src="https://riseims.emergetwo.co.za/assets/images/link-banners/emergedigital-banner.jpg" alt="Course Image" id="card-image">
                <h3 class="card-title" id="card-title">Emerge Digital</h3>
                <p class="card-text" id="card-text">Startup Solutions for All Businesses.</p>
                <a href="https://emergedigital.co.za" class="btn-visit" id="visit-website">Visit Website</a>
            </div>
        </div>
    </div>

    <!-- jQuery for interactivity -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function () {
            // Function to handle link item click
            $('.link-item').click(function (e) {
                e.preventDefault();
                // Remove active class from all items
                $('.link-item').removeClass('active');
                // Add active class to the clicked item
                $(this).addClass('active');

                // Get the data attributes
                const title = $(this).data('title');
                const type = $(this).data('type');
                const img = $(this).data('img');
                const desc = $(this).data('desc');
                const link = $(this).data('link'); // Get the URL from the data-link attribute

                // Update the main content
                $('#card-title').text(title);
                $('#card-image').attr('src', img);
                $('#card-text').text(desc);
                $('#visit-website').attr('href', link); // Set the correct link for the button
            });

            // Trigger click on the first item by default to set the initial view
            $('.link-item').first().click();
        });
    </script>
</body>
</html>
