<style>
    /* SEAN PLAYING WITH DASHBOARD HEADINGS */

    .h1,
    h1 {
        font-size: 30px;
        font-weight: 400;
    }

    .h3,
    h3 {
        font-size: 16px;
    }

    .dashboard_container_left_content {
        margin-top: 20px !important;
    }
</style>


<style>
    /* SEAN PLAYING WITH WEATHER STYLING */


    #weather-status {
        display: none !important;
    }

    #city {
        display: none !important;
    }

    .widget-container {
        border: 0px none #263238 !important;
        bottom: none !important;
        top: 20px !important;
        right: 20px !important;
        background-color: rgba(0, 0, 0, 0.5) !important;
    }

    .vertical-half-divider {
        width: 0px !important;
    }

    .horizontal-half-divider {
        height: 1px !important;
    }
</style>









<style>
    .widget-container {
        position: absolute;
        right: 10px;
        bottom: 10px;
        width: 325px;
        height: 220px;
        display: block;
        background-color: rgba(49, 85, 105, 0.8);
        border-radius: 25px;
        border: 3px solid #263238;
        margin: 0 auto;
        color: #ffffff;
    }


    /* Widget 4 Quarter Division here */

    .top-left {
        height: 60%;
        width: 50%;
        /*   background-color:red; */
        padding: 20px 0 0 20px;
        display: inline-block;
    }

    .top-right {
        height: 60%;
        width: 50%;
        /*   background-color: blue; */
        float: right;
        padding: 20px 0 0 0;
    }

    .bottom-left {
        height: 40%;
        width: 45%;
        /*   background-color:orange; */
        float: left;
        margin: 0;
        padding: 10px 0 0 10px;
    }

    .bottom-right {
        height: 40%;
        width: 55%;
        /*   background-color: brown; */
        float: right;
        padding: 6px 0 0 20px;
    }

    h1,
    h2,
    h3,
    p {
        margin: 0;
        padding: 0;
    }


    /* Top-left Div CSS */

    #city {
        font-weight: 900;
        font-size: 15px;
    }

    #day {
        font-weight: 700;
        font-size: 15px;
        margin-top: 18px;
    }

    #date {
        font-weight: 500;
        font-size: 10px;
        margin-top: 4px;
    }

    #time {
        font-weight: 400;
        font-size: 8px;
        margin-top: 8px;
    }

    #codepen-link {
        font-weight: 400;
        font-size: 12px;
        margin-top: 20px;
    }

    .top-left>a {
        text-decoration: none;
        color: white;
    }

    .top-left>a:hover {
        color: #b0bec5;
    }


    /* Top-Right Div CSS */

    #weather-status {
        font-size: 18px;
        font-weight: 300;
        text-align: center;
        margin: 0 auto;
    }

    .top-right>img {
        width: 50px;
        height: 50px;
        display: block;
        margin: 15px auto 0 auto;
    }


    /* Horizontal-Half-divider */

    .horizontal-half-divider {
        width: 100%;
        height: 3px;
        margin-top: -5px;
        background-color: #263238;
    }

    .vertical-half-divider {
        width: 3px;
        position: absolute;
        height: 90px;
        background-color: #263238;
        float: right;
        display: inline-block;
        padding: 0;
    }


    /* Bottom-left CSS */

    #temperature,
    #celsius,
    #temp-divider,
    #fahrenheit {
        display: inline;
        vertical-align: middle;
    }

    #temperature {
        font-size: 56px;
        font-weight: 800;
        margin-right: 5px;
    }

    #celsius {
        margin-right: 10px;
    }

    #fahrenheit {
        margin-right: 5px;
        color: #b0bec5;
    }

    #celsius,
    #temp-divider,
    #fahrenheit {
        font-size: 30px;
        font-weight: 800;
    }

    #celsius:hover,
    #fahrenheit:hover {
        cursor: pointer;
    }




    /* Bottom-Right CSS */

    .other-details-key {
        float: left;
        font-size: 10px;
        font-weight: 300;
    }

    .other-details-values {
        float: left;
        font-size: 10px;
        font-weight: 400;
        margin-left: 40px;
    }

    .watermark-link {
        text-decoration: none;
        color: #b0bec5;
    }

    .watermark-link:hover {
        color: white;
        text-decoration: none;
    }

    .watermark {
        margin-top: 10px;
        text-align: center;
        font-weight: 400;
    }
</style>

<style>
    .dashboard_container_left_content {
        width: 70%;
        margin: 0 auto;
    }

    .content-fill-height {
        height: calc(100vh - 74px);
    }

    .dashboard_icons {
        padding: 10px;
        padding-bottom: 20px;
        margin-bottom: 15px;
        border-radius: 15px;
        flex: 0 0 33.333%;
        /* 3 columns by default */
        max-width: 33.333%;
        background-color: rgba(0, 0, 0, 0.0);
        transition: all 0.4s ease;
    }

    .dashboard_icons:hover {
        box-shadow: 0 8px 10px rgba(0, 0, 0, 0.2);
        /* background: #fff; */
        /* transition: background-color #fff; , width 2s, height 4s; */
        background-color: #ffffff;
        transition: all 0.4s linear;
        -webkit-transition: all 0.4s linear;
        -ms-transition: all 0.4s linear;

        /* -webkit-transition: box-shadow 300ms linear;
        -ms-transition: box-shadow 300ms linear;
        transition: box-shadow 300ms linear;
        -webkit-transition: background-color 300ms linear;
        -ms-transition: background-color 300ms linear;
        transition: background-color 300ms linear; */


    }

    /* Container to enable Flexbox layout */
    .dashboard_row {
        display: flex;
        flex-wrap: wrap;
    }

    .dashboard_right_bg {
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
    }


    /* PREVIOUS CODE
    
        .dashboard_right_bg {
        background-image: url('../../assets/images/dashboard_right_bg.png');
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    */



    /* Media query for mobile screens */
    @media (max-width: 576px) {
        .dashboard_icons {
            flex: 0 0 50%;
            /* 2 columns on mobile */
            max-width: 50%;
        }

        .hidden_mobile {
            display: none;
        }

    }
</style>


<style>
    .welcome_container {
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .user_role_container {
        margin-bottom: 20px;
        ;
    }
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 text-center content-fill-height">

            <div class="container-fluid dashboard_container_left_content">
                <div class="row">
                    <div class="col-md-12 text-left welcome_container">
                        <h1>Welcome <?php echo ucfirst($data['name']); ?>
                            <?php echo ucfirst($data['surname']); ?><?php //echo ucfirst($_SESSION['name']); ?>
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-left user_role_container">
                        <h3><?php echo $userRole; ?></h3>
                    </div>
                </div>

                <!-- Dashboard Icons -->
                <div class="row">

                    <!-- DOMAINS -->
                    <a href="/domains/list">
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 text-center dashboard_icons">
                            <img src="/assets/images/icons/ims-transparent-icons_domains.png" class="img-responsive" />
                            Domains
                        </div>
                    </a>
                    <!-- DOMAINS -->
                    <a href="/domainManage/list">
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 text-center dashboard_icons">
                            <img src="/assets/images/icons/ims-transparent-icons_domains.png" class="img-responsive" />
                            Domains
                        </div>
                    </a>
    
                    <!-- DOMAINS -->
                    <a href="/domainManagement/list">
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 text-center dashboard_icons">
                            <img src="/assets/images/icons/ims-transparent-icons_domains.png" class="img-responsive" />
                            Manage Domains
                        </div>
                    </a>

                    <!-- CLIENTS -->
                    <a href="/clientManage/list">
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 text-center dashboard_icons">
                            <img src="/assets/images/icons/ims-transparent-icons_client management.png"
                                class="img-responsive" />
                            Clients
                        </div>
                    </a>

                    <!-- DISK USAGE -->
                    <a href="/domainInfo/list">
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 text-center dashboard_icons">
                            <img src="/assets/images/icons/ims-transparent-icons_disk-usage.png"
                                class="img-responsive" />
                            Disk Usage
                        </div>
                    </a>

                    <!-- COMPANY LINKS -->
                    <a href="/companyLinks/list">
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 text-center dashboard_icons">
                            <img src="../../assets/images/icons/ims-transparent-icons_company links.png"
                                class="img-responsive" />
                            Company Links
                        </div>
                    </a>

                    <!-- PACKAGES -->
                    <a href="/packages/list">
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 text-center dashboard_icons">
                            <img src="../../assets/images/icons/ims-transparent-icons_inventory-07.png"
                                class="img-responsive" />
                            Packages
                        </div>
                    </a>


                    <!-- REPORTS -->
                    <a href="/reports/list">
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 text-center dashboard_icons">
                            <img src="../../assets/images/icons/ims-transparent-icons_reports.png"
                                class="img-responsive" />
                            Reports
                        </div>
                    </a>


                    <!-- FORECASTING -->
                    <!--
                    <a href="/forecasting/index">
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 text-center dashboard_icons">
                            <img src="/assets/images/icons/ims-transparent-icons_forcasting-23.png" width="100%"
                                class="img-responsive" />
                            Forecasting
                        </div>
                    </a>
                    -->

                    <!-- USER PROFILE -->
                    <a href="/user/profile">
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 text-center dashboard_icons">
                            <img src="../../assets/images/icons/ims-transparent-icons_my-profile.png"
                                class="img-responsive" />
                            My Profile
                        </div>
                    </a>

                    <!-- USERS -->
                    <a href="/users/list">
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 text-center dashboard_icons">
                            <img src="/assets/images/icons/ims-transparent-icons_user permissions.png"
                                class="img-responsive" />
                            Users
                        </div>
                    </a>


                    <!-- PROJECTS -->
                    <a href="/projects/list">
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 text-center dashboard_icons">
                            <img src="../../assets/images/icons/ims-transparent-icons_task managment.png"
                                class="img-responsive" />
                            Projects
                        </div>
                    </a>

                    <!-- Configurations Manager -->
                    <a href="/system_configs/index">
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 text-center dashboard_icons">
                            <img src="../../assets/images/icons/ims-transparent-icons_client-management_cloud.png"
                                class="img-responsive" />
                            Configurations
                        </div>
                    </a>


                    <!-- PROJECTS MANAGE -->
                    <!--
                    <a href="/projectsManagement/list">
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 text-center dashboard_icons">
                            <img src="../../assets/images/icons/ims-transparent-icons_task managment.png"
                                class="img-responsive" />
                            Proj Man
                        </div>
                    </a>
                    -->
                    
                    <!-- CLIENTS -->
                    <!--
                    <a href="/clients/list">
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 text-center dashboard_icons">
                            <img src="../../assets/images/icons/ims-transparent-icons_clients.png"
                                class="img-responsive" />
                            Clients
                        </div>
                    </a>
                    -->
                    
                    <!-- DOMAINHOSTING -->
                    <!--
                    <a href="/domainsHosting/list">
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 text-center dashboard_icons">
                            <img src="../../assets/images/icons/ims-transparent-icons_domain management.png"
                                class="img-responsive" />
                            Domain & Hosting
                        </div>
                    </a>
                    -->

                    <!-- CLIENTS MANAGE -->
                    <!--
                    <a href="/clients/manage">
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 text-center dashboard_icons">
                            <img src="../../assets/images/icons/ims-transparent-icons_client-management_cloud.png"
                                class="img-responsive" />
                            Manage Clients
                        </div>
                    </a>
                    -->
                    
                    <!-- CLIENTS MANAGE -->
                    <!--
                    <a href="/configurations/index">
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 text-center dashboard_icons">
                            <img src="../../assets/images/icons/ims-transparent-icons_client-management_cloud.png"
                                class="img-responsive" />
                            Configurations
                        </div>
                    </a>
                    -->
                    
                </div>
            </div>
            

        </div>
        <div class="col-md-6 text-center content-fill-height dashboard_right_bg">


            <!-- . -->
            <div class="wrapper">
                <div class="widget-container">
                    <div class="top-left">
                        <h1 class="city" id="city">Weather Widget App</h1>
                        <h2 id="day">Day</h2>
                        <h3 id="date">Month, Day Year</h3>
                        <h3 id="time">Time</h3>
                        <p class="geo"></p>
                    </div>
                    <div class="top-right">
                        <h1 id="weather-status">Weather / Weather Status</h1>
                        <img class="weather-icon" src="https://myleschuahiock.files.wordpress.com/2016/02/sunny2.png">
                    </div>
                    <div class="horizontal-half-divider"></div>
                    <div class="bottom-left">
                        <h1 id="temperature">0</h1>
                        <h2 id="celsius">&degC</h2>
                        <!-- <h2 id="temp-divider">/</h2> -->
                        <!-- <h2 id="fahrenheit">&degF</h2> -->
                    </div>
                    <div class="vertical-half-divider"></div>
                    <div class="bottom-right">
                        <div class="other-details-key">
                            <p>Wind Speed</p>
                            <p>Humidity</p>
                            <p>Pressure</p>
                            <p>Sunrise Time</p>
                            <p>Sunset Time</p>
                        </div>
                        <div class="other-details-values">
                            <p class="windspeed">0 Km/h</p>
                            <p class="humidity">0 %</p>
                            <p class="pressure">0 hPa</p>
                            <p class="sunrise-time">0:00 am</p>
                            <p class="sunset-time">0:00 pm</p>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $(".wrapper").css("margin-top", ($(window).height()) / 5);
        //DATE AND TIME//
        //Converted into days, months, hours, day-name, AM/PM
        var dt = new Date()
        var days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
        $('#day').html(days[dt.getDay()]);
        var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"]
        $('#date').html(months[dt.getMonth()] + " " + dt.getDate() + ", " + dt.getFullYear());
        $('#time').html((dt.getHours() > 12 ? (dt.getHours() - 12) : dt.getHours()).toString() + ":" + ((dt.getMinutes() < 10 ? '0' : '').toString() + dt.getMinutes().toString()) + (dt.getHours() < 12 ? ' AM' : ' PM').toString());

        //CELSIUS TO FAHRENHEIT CONVERTER on Click
        var temp = 0;
        $('#fahrenheit').click(function () {
            $(this).css("color", "white");
            $('#celsius').css("color", "#b0bec5");
            $('#temperature').html(Math.round(temp * 1.8 + 32));
        });

        $('#celsius').click(function () {
            $(this).css("color", "white");
            $('#fahrenheit').css("color", "#b0bec5");
            $('#temperature').html(Math.round(temp));
        });

        //GEOLOCATION and WEATHER API//
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                var myLatitude = parseFloat(Math.round(position.coords.latitude * 100) / 100).toFixed(2);
                var myLongitude = parseFloat(Math.round(position.coords.longitude * 100) / 100).toFixed(2);
                //var utcTime = Math.round(new Date().getTime()/1000.0);

                // $('.geo').html(position.coords.latitude + " " + position.coords.longitude);
                $.getJSON("http://api.openweathermap.org/data/2.5/weather?lat=" + myLatitude + "&lon=" + myLongitude + "&id=524901&appid=ca8c2c7970a09dc296d9b3cfc4d06940", function (json) {
                    $('#city').html(json.name + ", " + json.sys.country);
                    $('#weather-status').html(json.weather[0].main + " / " + json.weather[0].description);

                    //WEATHER CONDITIONS FOUND HERE: http://openweathermap.org/weather-conditions
                    switch (json.weather[0].main) {
                        case "Clouds":
                            $('.weather-icon').attr("src", "/assets/images/weather_widget/cloudy.png");
                            break;
                        case "Clear":
                            $('.weather-icon').attr("src", "/assets/images/weather_widget/sunny2.png");
                            break;
                        case "Thunderstorm":
                            $('.weather-icon').attr("src", "/assets/images/weather_widget/thunderstorm.png");
                            break;
                        case "Drizzle":
                            $('.weather-icon').attr("src", "/assets/images/weather_widget/drizzle.png");
                            break;
                        case "Rain":
                            $('.weather-icon').attr("src", "/assets/images/weather_widget/rain.png");
                            break;
                        case "Snow":
                            $('.weather-icon').attr("src", "/assets/images/weather_widget/snow.png");
                            break;
                        case "Extreme":
                            $('.weather-icon').attr("src", "/assets/images/weather_widget/warning.png");
                            break;
                    }
                    temp = (json.main.temp - 273);
                    $('#temperature').html(Math.round(temp));
                    $('.windspeed').html(json.wind.speed + " Km/h")
                    $('.humidity').html(json.main.humidity + " %");
                    $('.pressure').html(json.main.pressure + " hPa");
                    var sunriseUTC = json.sys.sunrise * 1000;
                    var sunsetUTC = json.sys.sunset * 1000;
                    var sunriseDt = new Date(sunriseUTC);
                    var sunsetDt = new Date(sunsetUTC);
                    $('.sunrise-time').html((sunriseDt.getHours() > 12 ? (sunriseDt.getHours() - 12) : sunriseDt.getHours()).toString() + ":" + ((sunriseDt.getMinutes() < 10 ? '0' : '').toString() + sunriseDt.getMinutes().toString()) + (sunriseDt.getHours() < 12 ? ' AM' : ' PM').toString());
                    $('.sunset-time').html((sunsetDt.getHours() > 12 ? (sunsetDt.getHours() - 12) : sunsetDt.getHours()).toString() + ":" + ((sunsetDt.getMinutes() < 10 ? '0' : '').toString() + sunsetDt.getMinutes().toString()) + (sunsetDt.getHours() < 12 ? ' AM' : ' PM').toString());
                    // $('.sunrise-time').html(json.sys.sunrise);
                    // $('.sunset-time').html(json.sys.sunset);
                });

            });
        } else {
            $("#city").html("Please turn on Geolocator on Browser.")
        }
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Array of image file names - add as many as you have
        const images = [
            'background1.jpg',
            'background2.jpg',
            'background3.jpg',
            'background4.jpg',
            'background5.jpg',
            'background6.jpg',
            'background7.jpg',
            'background8.jpg',
            'background9.jpg',
            'background10.jpg',
            'background11.jpg',
            'background12.jpg'
            // Add more as needed
        ];

        // Get a random image from the array
        const randomImage = images[Math.floor(Math.random() * images.length)];

        // Construct the full path to the image
        const imagePath = `/assets/images/dashboard-background/${randomImage}`;

        // Log the image path for debugging
        console.log(`Selected image path: ${imagePath}`);

        // Apply the random background image to the element
        const dashboardBg = document.querySelector('.dashboard_right_bg');
        if (dashboardBg) {
            dashboardBg.style.backgroundImage = `url(${imagePath})`;
        }
    });
</script>