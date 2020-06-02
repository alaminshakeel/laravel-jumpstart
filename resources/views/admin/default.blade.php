<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
	<link href="{{ mix('/css/app.css') }}" rel="stylesheet">

	<link href="{{ asset('/css/bootstrap-datepicker.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/dropify.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/dropzone.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/custom.css') }}" rel="stylesheet">


    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">--}}

    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.css" rel="stylesheet">


    {{-- select2 --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

    {{-- datepicker --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" rel="stylesheet" />

    {{-- data tables --}}
    <link href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />

	@yield('css')

</head>

<body class="app is-collapsed">

    @include('admin.partials.spinner')

    <div>
        <!-- #Left Sidebar ==================== -->
        @include('admin.partials.sidebar')

        <!-- #Main ============================ -->
        <div class="page-container">
            <!-- ### $Topbar ### -->
            @include('admin.partials.topbar')

            <!-- ### $App Screen Content ### -->
            <main class='main-content bgc-grey-100'>
                <div id='mainContent'>
                    <div class="container-fluid">

                        <h4 class="c-grey-900 mT-10 mB-30">@yield('page-header')</h4>

						@include('admin.partials.messages')
						@yield('content')

                    </div>
                </div>
            </main>

            <!-- ### $App Screen Footer ### -->
            <footer class="bdT ta-c p-30 lh-0 fsz-sm c-grey-600">
                <span>Copyright © 2017 Designed by
                    <a href="https://colorlib.com" target='_blank' title="Colorlib">Colorlib</a>. All rights reserved.</span>
            </footer>
        </div>
    </div>

    {{ csrf_field() }}

    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.js"></script>--}}

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>

    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <script src="{{ asset('/js/dropify.js') }}"></script>

    <script src="{{ asset('/js/dropzone.js') }}"></script>


    <script>

    var j = jQuery.noConflict();
        // (function( $ ) {
        //     $(function() {
                // More code using $ as alias to jQuery

        j('textarea').not('[name="remarks"]').not('[name="others"]').summernote({
            placeholder: 'Hello bootstrap 4',
            // tabsize: 2,
            height: 500
        });

        j('#days_before_expire').select2({
            tags: true,
            tokenSeparators: [",", " "]
        });

        j('.datepicke').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
        });

        j('.datepicker-select2').select2({
            tags: true,
            tokenSeparators: [",", " "]
        });

        //     });

        j(".sidebar-menu .dropdown-toggle").on("click",function(){
            j(this).next().toggle();
        });

        j("#sidebar-toggle").on("click",function(){
            if(j("body").hasClass('is-collapsed')){
                j("body").removeClass('is-collapsed')
            }
            else {
                j("body").addClass('is-collapsed')
            }
        });

        j("input[type='file']").dropify();


        j(document).ready( function () {
            j('#ListTable').DataTable();
        } );

    j(".dltDoc").on("click",function(e){

        e.preventDefault();

        var r = confirm('Are you sure want to delete this file?');

        if (r){
            j.ajax({
                type: "POST",
                url: '/admin/delete-current-doc',
                cache: false,

                data: {
                    id: j(this).data('id'),
                    _token : j("[name='_token']").val()
                },
                success: function(response){

                    location.reload();

                },
            });
        }
    });

        // })(jQuery);

    </script>


    @yield('js')

</body>

</html>
