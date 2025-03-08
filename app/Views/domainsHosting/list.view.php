<div class="container" style="margin-top: 20px; margin-bottom:20px;">
    <div class="row">
        <div class="col-md-6">
            <h1 style="margin-top:0px;margin-bottom:0px;">Domain & Hosting Management</h1>
        </div>
        <div class="col-md-6 text-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addDomainModal">
                Add Domain
            </button>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">

            <table id="domainsHosting" class="display" width="100%"
                style="display:block;overflow-x:auto;white-space:nowrap;margin:0 auto;"></table>

        </div>
    </div>
</div>


<!-- Add Domain Modal -->
<div class="modal fade" id="addDomainModal" tabindex="-1" role="dialog" aria-labelledby="addDomainModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDomainModalLabel">Add New Domain</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Domain Hosting Entry Form -->
                <form id="domainHostingForm" action="/domainsHosting/add" method="POST">
                    <div class="form-group">
                        <label for="domain">Domain</label>
                        <input type="text" class="form-control" id="domain" name="domain" required>
                    </div>
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" class="form-control" id="location" name="location" required>
                    </div>
                    <div class="form-group">
                        <label for="hosted">Hosted</label>
                        <input type="text" class="form-control" id="hosted" name="hosted" required>
                    </div>
                    <div class="form-group">
                        <label for="company">Company</label>
                        <input type="text" class="form-control" id="company" name="company" required>
                    </div>
                    <div class="form-group">
                        <label for="reg_date">Registration Date</label>
                        <input type="date" class="form-control" id="reg_date" name="reg_date" required>
                    </div>
                    <div class="form-group">
                        <label for="renewal_date">Renewal Date</label>
                        <input type="date" class="form-control" id="renewal_date" name="renewal_date" required>
                    </div>
                    <div class="form-group">
                        <label for="package">Package</label>
                        <input type="text" class="form-control" id="package" name="package" required>
                    </div>
                    <div class="form-group">
                        <label for="package_cost">Package Cost</label>
                        <input type="number" step="0.01" class="form-control" id="package_cost" name="package_cost"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="domain_cost">Domain Cost</label>
                        <input type="number" step="0.01" class="form-control" id="domain_cost" name="domain_cost"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="retail">Retail</label>
                        <input type="number" step="0.01" class="form-control" id="retail" name="retail" required>
                    </div>
                    <div class="form-group">
                        <label for="website">Website</label>
                        <input type="text" class="form-control" id="website" name="website">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="years_active">Years Active</label>
                        <input type="number" class="form-control" id="years_active" name="years_active" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function () {

        let dataSet = <?php echo json_encode($data); ?>


        let table = new DataTable('#domainsHosting', {
            columns: [
                { data: 'id', title: 'ID' },
                {
                    data: 'domain',
                    title: 'DOMAIN',
                    render: function (data, type, row) {
                        return data;
                    }
                },
                {
                    data: 'location',
                    title: 'Location',
                    render: function (data, type, row) {
                        return data;
                    }
                },
                { data: 'hosted', title: 'HOSTED' },
                { data: 'company', title: 'COMPANY' },
                { data: 'reg_date', title: 'REG DATE' },
                { data: 'renewal_date', title: 'RENEWAL DATE' },
                {
                    data: 'package',
                    title: 'PACKAGE',
                    render: function (data, type, row) {
                        return data;
                    }
                },
                { data: 'package_cost', title: 'COST' },
                { data: 'domain_cost', title: 'COST' },
                { data: 'retail', title: 'RETAIL' },
                { data: 'website', title: 'WEBSITE' },
                { data: 'email', title: 'EMAIL' },
                { data: 'years_active', title: 'YEARS ACTIVE' }
            ],
            data: dataSet
        });



    });
</script>