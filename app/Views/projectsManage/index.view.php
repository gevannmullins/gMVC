<style>
    /* General Styles */
    body {
        font-family: 'Inter', sans-serif;
        background-color: #f4f5f7;
        color: #333;
        margin: 0;
        padding: 0;
    }

    h1 {
        font-size: 24px;
        font-weight: 600;
        color: #333;
        margin-bottom: 20px;
    }

    /* Card Styling */
    .card {
        background-color: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
        padding: 20px;
        margin-bottom: 20px;
    }

    .card h2 {
        font-size: 20px;
        font-weight: 600;
        margin-bottom: 15px;
    }

    .card p {
        font-size: 14px;
        color: #666;
    }

    /* Button Styling */
    .btn-primary {
        color: #fff;
        background-color: #6c63ff;
        border-color: #6c63ff;
        border-radius: 8px;
        padding: 10px 20px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #5848e8;
        border-color: #5848e8;
    }

    /* Input and Table Styles */
    .form-control,
    .dataTable {
        border-radius: 8px;
        border: 1px solid #ddd;
        padding: 10px;
    }

    .dataTable th,
    .dataTable td {
        vertical-align: middle;
        text-align: left;
        font-size: 14px;
        padding: 12px;
        color: #333;
    }

    .dataTable th {
        background-color: #f9fafb;
        text-transform: uppercase;
        font-size: 12px;
        color: #888;
        border-bottom: 1px solid #e3e6ea;
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
        h1 {
            font-size: 20px;
        }

        .btn {
            width: 100%;
            margin-bottom: 10px;
        }

        .card {
            padding: 15px;
        }

        .card h2 {
            font-size: 18px;
        }
    }

    /* Utility Classes */
    .text-muted {
        color: #888;
    }

    .text-right {
        text-align: right;
    }

    .margin_top_40px {
        margin-top: 40px;
    }

    .padding_top_10px {
        padding-top: 10px;
    }
    .padding_top_20px {
        padding-top: 20px;
    }


    th,
    td {
        white-space: nowrap;
    }

    div.dataTables_wrapper {
        margin: 0 auto;
    }

    div.container {
        width: 80%;
    }

    .dataTables_filter {
        display: none;
    }

    .dt-search {
        display: none;
    }

    .dt-length {
        display: none;
    }

    .dataTables_length {
        display: none;
    }

    label {
        font-weight: 500;
        margin-left: 8px;
        margin-top: 10px;
        margin-bottom: 10px;
        /* margin-right: 8px; */
    }

    #search {
        /* text-align: right; */
        /* width: 50%; */
        float: right;
        /* display: inline; */
    }

    .table-responsive::-webkit-scrollbar {
        display: none;
    }

    .sidebar .sidebar-nav.navbar-collapse {
  padding-left: 0;
  padding-right: 0;
}
.sidebar .sidebar-search {
  padding: 15px;
}
.sidebar ul li {
  border-bottom: 1px solid #e7e7e7;
}
.sidebar ul li a.active {
  background-color: #eeeeee;
}
.sidebar .arrow {
  float: right;
}
.sidebar .fa.arrow:before {
  content: "\f104";
}
.sidebar .active > a > .fa.arrow:before {
  content: "\f107";
}
.sidebar .nav-second-level li,
.sidebar .nav-third-level li {
  border-bottom: none !important;
}
.sidebar .nav-second-level li a {
  padding-left: 37px;
}
.sidebar .nav-third-level li a {
  padding-left: 52px;
}

@media (min-width: 768px) {
  .sidebar {
    z-index: 1;
    position: absolute;
    width: 250px;
    margin-top: 51px;
  }
}

</style>

<style>

.panel-default .panel-heading {
    height: 200px;
}
    /* plus glyph for showing collapsible panels */
.panel-heading .accordion-plus-toggle:before {
   font-family: FontAwesome;
   content: "\f068";
   float: right;
   color: silver;
}

.panel-heading .accordion-plus-toggle.collapsed:before {
   content: "\f067";
   color: silver;
}

/* arrow glyph for showing collapsible panels */
.panel-heading .accordion-arrow-toggle:before {
   font-family: FontAwesome;
   content: "\f078";
   float: right;
   color: silver;
}

.panel-heading .accordion-arrow-toggle.collapsed:before {
   content: "\f054";
   color: silver;
}

/* sets the link to the width of the entire panel title */
.panel-title > a {
   display: block;
}
</style>

<div class="container margin_top_40px">

    <div class="row">
        <div class="col-12 col-md-6">
            <h1>Projects Management</h1>
        </div>
        <div class="col-12 col-md-6 text-md-right text-right padding_top_10px">
            <button type="button" class="btn btn-primary mb-2" id="loadFormButton">Add Project</button>
            <button type="button" class="btn btn-primary mb-2 bulkImportModal" id="theLoadModalButton" disabled>Bulk Import</button>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-6 text-right">
            <label for="search"><input class="form-control" type="text" id="search" placeholder="Search"></label>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">


<div class="panel-group" id="accordionProjects" role="tablist" aria-multiselectable="false">

    <?php foreach($projectsData as $project){ ?>

    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="heading-<?php echo $project['id']; ?>">
         <h5 class="panel-title">
            <a role="button" data-toggle="collapse" class="accordion-plus-toggle collapsed" data-parent="#accordionProjects" href="#collapse-<?php echo $project['id']; ?>" aria-expanded="false" aria-controls="collapse-<?php echo $project['id']; ?>">
            <?php echo $project['project_name']; ?>    
            </a>
         </h5>
      </div>
      <div id="collapse-<?php echo $project['id']; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-<?php echo $project['id']; ?>">
         <div class="panel-body"><?php echo json_encode($project); ?></div>
      </div>
   </div>

    <?php } ?>


</div>

        
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){



    });
</script>