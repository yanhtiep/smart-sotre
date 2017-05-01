<?php $path = Config::get('constants.assets.backendTemplate'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        {{-- <link rel="shortcut icon" href="<?=$path?>img/favicon_1.ico"> --}}

        <title>Online store</title>

        <!-- Google-Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:100,300,400,600,700,900,400italic' rel='stylesheet'>
        <!-- ============================link uploade images ====================== -->
         <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
         {!! Html::style('assets/backEnd/template/css/imageuploadify.min.css') !!}
        <!-- ============================ end ====================================== -->
        
        {!! Html::style('assets/backEnd/template/css/app.css') !!}
        
        
          @stack('css')
          @stack('js')
    </head>
    <body>
        <!-- Aside Start-->
        <aside class="left-panel">
             @include('layouts.backend.partials.left_sidebar_nav')    
        </aside>
        <!-- Aside Ends-->
        <!--Main Content Start -->
        <section class="content">
            <!-- Header -->
            <header class="top-head container-fluid">
                @include('layouts.backend.partials.header')
            </header>
            <!-- Header Ends -->

            <!-- Page Content Start -->
            <!-- ================== -->
            <!-- ================alert massage -=-==========-->
            <div class="col-lg-12" >
                @if (Session::has('flash_message'))
                    <div style="background-color: #2eb82e; color: #fff;" class="alert alert-{!! Session::get('flash_level') !!}">
                        {!! Session::get('flash_message') !!}
                    </div>
                @endif
            </div>
            <!-- ================end ===================-->
            <div class="wraper container-fluid">
                 @yield('content')
            </div>
            <!-- Page Content Ends -->
            <!-- ================== -->
            
            <!-- Footer Start -->
            <footer class="footer">
                 @include('layouts.backend.partials.footer')
            </footer>
            <!-- Footer Ends -->



        </section>
        <!-- Main Content Ends -->
        {!! Html::script('assets/backEnd/template/js/app.js') !!}
        
       <!-- ============================link uploade images ====================== -->
        {!! Html::script('assets/backEnd/template/js/imageuploadify.min.js') !!}
        <!-- ============================ end ====================================== -->
        <script>
            $(document).ready(function() {
                    $('#dataTables-example').DataTable({
                        responsive: true
                    });
                });

                $("div.alert").delay(3000).slideUp();

                function youwantdelete (msg) {
                    if (window.confirm(msg)) {
                        return true;
                    }
                    return false;
                }
               
        </script>
       <script>
            $(document).ready(function() {
               
            

            // function youwantdelete (msg) {
            //     if (window.confirm(msg)) {
            //         return true;
            //     }
            //     return false;
            // },
            jQuery(document).ready(function() {
                    
                // Tags Input
                jQuery('#tags').tagsInput({width:'auto'});

                // Form Toggles
                jQuery('.toggle').toggles({on: true});

                // Time Picker
                jQuery('#timepicker').timepicker({defaultTIme: false});
                jQuery('#timepicker2').timepicker({showMeridian: false});
                jQuery('#timepicker3').timepicker({minuteStep: 15});

                // Date Picker
                jQuery('#datepicker').datepicker();
                jQuery('#datepicker-inline').datepicker();
                jQuery('#datepicker-multiple').datepicker({
                    numberOfMonths: 3,
                    showButtonPanel: true
                });
                
                //colorpicker start

                $('.colorpicker-default').colorpicker({
                    format: 'hex'
                });
                $('.colorpicker-rgba').colorpicker();


                //multiselect start

                $('#my_multi_select1').multiSelect();
                $('#my_multi_select2').multiSelect({
                    selectableOptgroup: true
                });

                $('#my_multi_select3').multiSelect({
                    selectableHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
                    selectionHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
                    afterInit: function (ms) {
                        var that = this,
                            $selectableSearch = that.$selectableUl.prev(),
                            $selectionSearch = that.$selectionUl.prev(),
                            selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
                            selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

                        that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                            .on('keydown', function (e) {
                                if (e.which === 40) {
                                    that.$selectableUl.focus();
                                    return false;
                                }
                            });

                        that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                            .on('keydown', function (e) {
                                if (e.which == 40) {
                                    that.$selectionUl.focus();
                                    return false;
                                }
                            });
                    },
                    afterSelect: function () {
                        this.qs1.cache();
                        this.qs2.cache();
                    },
                    afterDeselect: function () {
                        this.qs1.cache();
                        this.qs2.cache();
                    }
                });

                //spinner start
                $('#spinner1').spinner();
                $('#spinner2').spinner({disabled: true});
                $('#spinner3').spinner({value:0, min: 0, max: 10});
                $('#spinner4').spinner({value:0, step: 5, min: 0, max: 200});
                //spinner end

                // Select2
                jQuery(".select2").select2({
                    width: '100%'
                });
            });
    </script>
   {{--  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> --}}

    </body>
</html>
