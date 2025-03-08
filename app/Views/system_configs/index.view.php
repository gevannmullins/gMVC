<style>
    .config_container {
        margin-top: 25px;
        padding: 15px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: #9b9b9b 0px 0px 12px -1px;

    }
    .float-label-control { position: relative; margin-bottom: 1.5em; }
    .float-label-control ::-webkit-input-placeholder { color: transparent; }
    .float-label-control :-moz-placeholder { color: transparent; }
    .float-label-control ::-moz-placeholder { color: transparent; }
    .float-label-control :-ms-input-placeholder { color: transparent; }
    .float-label-control input:-webkit-autofill,
    .float-label-control textarea:-webkit-autofill { background-color: transparent !important; -webkit-box-shadow: 0 0 0 1000px white inset !important; -moz-box-shadow: 0 0 0 1000px white inset !important; box-shadow: 0 0 0 1000px white inset !important; }
    .float-label-control input, .float-label-control textarea, .float-label-control label { font-size: 1.3em; box-shadow: none; -webkit-box-shadow: none; }
        .float-label-control input:focus,
        .float-label-control textarea:focus { box-shadow: none; -webkit-box-shadow: none; border-bottom-width: 2px; padding-bottom: 0; }
        .float-label-control textarea:focus { padding-bottom: 4px; }
    .float-label-control input, .float-label-control textarea { display: block; width: 100%; padding: 0.1em 0em 1px 0em; border: none; border-radius: 0px; border-bottom: 1px solid #aaa; outline: none; margin: 0px; background: none; }
    .float-label-control textarea { padding: 0.1em 0em 5px 0em; }
    .float-label-control label { position: absolute; font-weight: normal; top: -1.0em; left: 0.08em; color: #aaaaaa; z-index: -1; font-size: 0.85em; -moz-animation: float-labels 300ms none ease-out; -webkit-animation: float-labels 300ms none ease-out; -o-animation: float-labels 300ms none ease-out; -ms-animation: float-labels 300ms none ease-out; -khtml-animation: float-labels 300ms none ease-out; animation: float-labels 300ms none ease-out; /* There is a bug sometimes pausing the animation. This avoids that.*/ animation-play-state: running !important; -webkit-animation-play-state: running !important; }
    .float-label-control input.empty + label,
    .float-label-control textarea.empty + label { top: 0.1em; font-size: 1.5em; animation: none; -webkit-animation: none; }
    .float-label-control input:not(.empty) + label,
    .float-label-control textarea:not(.empty) + label { z-index: 1; }
    .float-label-control input:not(.empty):focus + label,
    .float-label-control textarea:not(.empty):focus + label { color: #aaaaaa; }
    .float-label-control.label-bottom label { -moz-animation: float-labels-bottom 300ms none ease-out; -webkit-animation: float-labels-bottom 300ms none ease-out; -o-animation: float-labels-bottom 300ms none ease-out; -ms-animation: float-labels-bottom 300ms none ease-out; -khtml-animation: float-labels-bottom 300ms none ease-out; animation: float-labels-bottom 300ms none ease-out; }
    .float-label-control.label-bottom input:not(.empty) + label,
    .float-label-control.label-bottom textarea:not(.empty) + label { top: 3em; }


@keyframes float-labels {
    0% { opacity: 1; color: #aaa; top: 0.1em; font-size: 1.5em; }
    20% { font-size: 1.5em; opacity: 0; }
    30% { top: 0.1em; }
    50% { opacity: 0; font-size: 0.85em; }
    100% { top: -1em; opacity: 1; }
}

@-webkit-keyframes float-labels {
    0% { opacity: 1; color: #aaa; top: 0.1em; font-size: 1.5em; }
    20% { font-size: 1.5em; opacity: 0; }
    30% { top: 0.1em; }
    50% { opacity: 0; font-size: 0.85em; }
    100% { top: -1em; opacity: 1; }
}

@keyframes float-labels-bottom {
    0% { opacity: 1; color: #aaa; top: 0.1em; font-size: 1.5em; }
    20% { font-size: 1.5em; opacity: 0; }
    30% { top: 0.1em; }
    50% { opacity: 0; font-size: 0.85em; }
    100% { top: 3em; opacity: 1; }
}

@-webkit-keyframes float-labels-bottom {
    0% { opacity: 1; color: #aaa; top: 0.1em; font-size: 1.5em; }
    20% { font-size: 1.5em; opacity: 0; }
    30% { top: 0.1em; }
    50% { opacity: 0; font-size: 0.85em; }
    100% { top: 3em; opacity: 1; }
}
</style>

<div class="container">

    <div class="row">
        <div class="col-md-12">
            <h2>Domain Configurations</h2>
        </div>
    </div>

    <!-- Domain Locations -->
    <div class="row">
        <div class="col-md-12 config_container">
            <div class="container" id="configs_domain_locations">
            <!-- domain_locations populated using ajax -->
            </div>
        </div>
    </div>

    <!-- Ownership -->
    <div class="row">
        <div class="col-md-12 config_container">
            <div class="container" id="configs_ownerships">
            <!-- domain_locations populated using ajax -->
            </div>
        </div>
    </div>

    <!-- Domain Extensions -->
    <div class="row">
        <div class="col-md-12 config_container">
            <div class="container" id="configs_domain_extensions">
            <!-- domain_locations populated using ajax -->
            </div>
        </div>
    </div>

    <!-- Hosting Locations -->
    <div class="row">
        <div class="col-md-12 config_container">
            <div class="container" id="configs_hosting_locations">
            <!-- domain_extensions populated using ajax -->
            </div>
        </div>
    </div>

    <!-- Hosting Packages -->
    <div class="row">
        <div class="col-md-12 config_container">
            <div class="container" id="configs_hosting_packages">
            <!-- domain_extensions populated using ajax -->
            </div>
        </div>
    </div>

    <!-- Email Packages -->
    <div class="row">
        <div class="col-md-12 config_container">
            <div class="container" id="configs_email_packages">
            <!-- domain_extensions populated using ajax -->
            </div>
        </div>
    </div>

</div>


<!-- Server Configurations -->
<div class="container">

    <div class="row">
        <div class="col-md-12">

            <h2>Server Configurations</h2>

        </div>
    </div>

    <div class="row">
        <div class="col-md-12 config_container">

            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <h4>Domain Locations</h4>

                    </div>
                </div>


                <div class="row">
                    <div class="col-md-3">

                        <form>
                            <input type="text">
                            <a href="#">Submit</a>
                        </form>

                    </div>

                    <div class="col-md-9">

                        <?php foreach ($domainLocations as $domainLocation) { ?>

                            <label>
                                <?php echo $domainLocation['location_name']; ?>
                                <a href="#">x</a>
                            </label>
                            <br />

                        <?php } ?>

                    </div>
                </div>

            </div>

        </div>


    </div>

</div>


<script>
    $(document).ready(function(){

        // Domain Locations
        $.ajax({
            url: '/system_configs/domain_locations',
            type: 'POST',
            data: {},
            success: function (result) {
                $("#configs_domain_locations").html(result);
            },
            error: function () {
                console.log('error');
            }
        });

        

        // Ownerships
        $.ajax({
            url: '/system_configs/ownerships',
            type: 'POST',
            data: {},
            success: function (result) {
                $("#configs_ownerships").html(result);
            },
            error: function () {
                console.log('error');
            }
        });

        // Domain Extensions
        $.ajax({
            url: '/system_configs/domain_extensions',
            type: 'POST',
            data: {},
            success: function (result) {
                $("#configs_domain_extensions").html(result);
            },
            error: function () {
                console.log('error');
            }
        });

        // Hosting Locations
        $.ajax({
            url: '/system_configs/hosting_locations',
            type: 'POST',
            data: {},
            success: function (result) {
                $("#configs_hosting_locations").html(result);
            },
            error: function () {
                console.log('error');
            }
        });

        // Hosting Packages
        $.ajax({
            url: '/system_configs/hosting_packages',
            type: 'POST',
            data: {},
            success: function (result) {
                $("#configs_hosting_packages").html(result);
            },
            error: function () {
                console.log('error');
            }
        });

        // Email Packages
        $.ajax({
            url: '/system_configs/email_packages',
            type: 'POST',
            data: {},
            success: function (result) {
                $("#configs_email_packages").html(result);
            },
            error: function () {
                console.log('error');
            }
        });




    });
</script>

<script>
    (function ($) {
    $.fn.floatLabels = function (options) {

        // Settings
        var self = this;
        var settings = $.extend({}, options);


        // Event Handlers
        function registerEventHandlers() {
            self.on('input keyup change', 'input, textarea', function () {
                actions.swapLabels(this);
            });
        }


        // Actions
        var actions = {
            initialize: function() {
                self.each(function () {
                    var $this = $(this);
                    var $label = $this.children('label');
                    var $field = $this.find('input,textarea').first();

                    if ($this.children().first().is('label')) {
                        $this.children().first().remove();
                        $this.append($label);
                    }

                    var placeholderText = ($field.attr('placeholder') && $field.attr('placeholder') != $label.text()) ? $field.attr('placeholder') : $label.text();

                    $label.data('placeholder-text', placeholderText);
                    $label.data('original-text', $label.text());

                    if ($field.val() == '') {
                        $field.addClass('empty')
                    }
                });
            },
            swapLabels: function (field) {
                var $field = $(field);
                var $label = $(field).siblings('label').first();
                var isEmpty = Boolean($field.val());

                if (isEmpty) {
                    $field.removeClass('empty');
                    $label.text($label.data('original-text'));
                }
                else {
                    $field.addClass('empty');
                    $label.text($label.data('placeholder-text'));
                }
            }
        }


        // Initialization
        function init() {
            registerEventHandlers();

            actions.initialize();
            self.each(function () {
                actions.swapLabels($(this).find('input,textarea').first());
            });
        }
        init();


        return this;
    };

    $(function () {
        $('.float-label-control').floatLabels();
    });
})(jQuery);
</script>