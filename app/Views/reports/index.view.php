<div class="container" style="margin-top: 20px;margin-bottom:20px;">
    <div class="row">
        <div class="col-md-6">
            <h1 style="margin-top:0px;margin-bottom:0px;">Reports</h1>
        </div>

        <div class="col-md-6 text-right">

        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8 text-center">

            <!-- Graph to be implemented here -->
            <canvas id="locationsChart" style="width:100%;"></canvas>


        </div>
        <div class="col-md-4 text-center">

            <!-- Graph to be implemented here -->
            <canvas id="hostsChart" style="width:100%;"></canvas>


        </div>
        <div class="col-md-12 text-center">

            <!-- Graph to be implemented here -->
            <canvas id="extChart" style="width:100%;"></canvas>


        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">

            <?php //echo json_encode($data); ?>

        </div>
    </div>
</div>





<script>
    let dataSet = <?php echo json_encode($data); ?>;

    console.log(dataSet);

    let locationsList = dataSet["locationsList"];
    let hostsList = dataSet["hostsList"];
    let extList = dataSet["domainExtsList"];
    const locationKeys = locationsList.map(location => Object.keys(location)[0]);
    const locationValues = locationsList.map(location => Object.values(location)[0]);
    const hostKeys = hostsList.map(location => Object.keys(location)[0]);
    const hostValues = hostsList.map(location => Object.values(location)[0]);
    const extKeys = extList.map(location => Object.keys(location)[0]);
    const extValues = extList.map(location => Object.values(location)[0]);

    const xLocationsValues = locationKeys;
    const yLocationsValues = locationValues;

    const xHostsValues = hostKeys;
    const yHostsValues = hostValues;

    const xExtValues = extKeys;
    const yExtValues = extValues;

    const barColors = ["red", "green", "blue"];

    new Chart("locationsChart", {
        type: "bar",
        data: {
            labels: xLocationsValues,
            datasets: [{
                backgroundColor: barColors,
                data: yLocationsValues
            }]
        },
        options: {
            legend: { display: false },
            title: {
                display: true,
                text: "Locations"
            }
        }
    });

    new Chart("hostsChart", {
        type: "bar",
        data: {
            labels: xHostsValues,
            datasets: [{
                backgroundColor: barColors,
                data: yHostsValues
            }]
        },
        options: {
            legend: { display: false },
            title: {
                display: true,
                text: "Hosts"
            }
        }
    });

    new Chart("extChart", {
        type: "bar",
        data: {
            labels: xExtValues,
            datasets: [{
                backgroundColor: barColors,
                data: yExtValues
            }]
        },
        options: {
            legend: { display: false },
            title: {
                display: true,
                text: "Domain Extensions"
            }
        }
    });
</script>