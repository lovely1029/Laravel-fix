<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo $__env->yieldContent('title', 'Escort Dashboard'); ?></title>

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="<?php echo e(asset('assets/profile/css/style.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('assets/profile/style.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('assets/profile/style2.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('assets/profile/icofont/icofont.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('assets/profile/css/main.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('assets/profile/tagsinput/tagsinput.css')); ?>">
    </head>

    <body>
        
        
        <?php echo $__env->make('partials._profileHeader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Content -->
        <div id="content">
            <!-- Section 1 -->
            <section class="row-am home missed-visit-report row">

                
                <?php echo $__env->make('partials._profileSidenav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                
                <div class="col-md-9 right-content">
                    <div class="box multi_step_form">
                        <?php echo $__env->yieldContent('content'); ?>
                    </div>
                </div>

            </section>
        </div>
        <!-- Content END -->

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script> -->
        <!-- <script>window.jQuery || document.write(`<script src="<?php echo e(asset('assets/profile/js/jquery.min.js')); ?>"><\/script>`)</script> -->
<!--         <script src="<?php echo e(asset('assets/profile/js/bootstrap.min.js')); ?>"></script> -->
        <script type="text/javascript" src="<?php echo e(asset('assets/profile/tagsinput/tagsinput.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/profile/js/index.js')); ?>"></script>

        <script type="text/javascript" src="<?php echo e(asset('assets/profile/jquery.js')); ?>"></script>
        

        <script>
            var $y = jQuery.noConflict();
        </script>
        <script>
            /*$y("#addRow").click(function(){
                var html = '<input class="form-control inputFormRow" id="from inputFormRow">';
                html += '<button id="removeRow" type="button" class="btn btn-danger">Remove</button>';
                $('#newRow').append(html);
            });
            $y(document).click('#removeRow', function () {
                $y(this).closest('#inputFormRow').remove();
            });*/

            $y(document).ready(function () {
        
            $.ajax({
                type: "get",
                url: "<?php echo e(route('escort.notifications.data')); ?>",
                data: "data",
                dataType: "json",
                success: function (response) {
                    $(".notification-area span").html(response);
                }
            });
            $.ajax({
                type: "get",
                url: "<?php echo e(route('escort.frequest.data')); ?>",
                data: "data",
                dataType: "json",
                success: function (response) {
                    $(".frd-rqst-area span").html(response);
                }
            });
                if (!$y.browser.opera) {
                    // select element styling
                    $y('select.select').each(function () {
                        var title = $y(this).attr('title');
                        if ($y('option:selected', this).val() != '')
                            title = $y('option:selected', this).text();
                        $y(this)
                            .css({'z-index': 10, 'opacity': 0, '-khtml-appearance': 'none'})
                            .after('<span class="select">' + title + '</span>')
                            .change(function () {
                                val = $y('option:selected', this).text();
                                $y(this).next().text(val);
                            })
                    });
                }
                ;
            });
        </script>

        <script src="<?php echo e(asset('assets/profile/js/wow.min.js')); ?>"></script>
        <script>
            new WOW().init();
            $(document).on('click', '#availability-status', function (e) {
                var value = $('#availibility-check').is(':checked');

                if (value == false) {

                    $(this).html("<input type='checkbox' id='availibility-check'>Available Now");
                } else {


                    $(this).html("<input type='checkbox' id='availibility-check'>Not Available");
                }
            });
        </script>
    </body>
</html>
<?php /**PATH /home/honeydevealakmal/public_html/resources/views/masters/profileMaster.blade.php ENDPATH**/ ?>