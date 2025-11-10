<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- favicon -->
    <link rel="icon" href="{{ asset('public/admin/assets/images/favicon-32x32.png') }}" type="image/png"/>

    <!-- plugins -->
    <link href="{{ asset('public/admin/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet"/>
    <link href="{{ asset('public/admin/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet"/>
    <link href="{{ asset('public/admin/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet"/>
    <link href="{{ asset('public/admin/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('public/admin/assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet"/>


    <!-- loader -->
    <link href="{{ asset('public/admin/assets/css/pace.min.css') }}" rel="stylesheet"/>

    <!-- Bootstrap CSS -->
    <link href="{{ asset('public/admin/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/admin/assets/css/bootstrap-extended.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

    <!-- App CSS -->
    <link href="{{ asset('public/admin/assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('public/admin/assets/css/icons.css') }}" rel="stylesheet">

    <!-- favicon -->
    <link rel="icon" href="{{ asset('public/admin/assets/images/favicon-32x32.png') }}" type="image/png"/>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">


    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="{{ asset('public/admin/assets/css/dark-theme.css') }}"/>
    <link rel="stylesheet" href="{{ asset('public/admin/assets/css/semi-dark.css') }}"/>
    <link rel="stylesheet" href="{{ asset('public/admin/assets/css/header-colors.css') }}"/>

    <title>{{ $pageTitle ?? 'Syndron - Bootstrap 5 Admin Dashboard Template' }}</title>

    @yield('heads')

    <style>
        .adminblogs {
            margin-left: 242px !important;
        }
        div.dataTables_wrapper div.dataTables_length select {
            width: 65px !important;
            display: inline-block !important;
        }
    </style>
</head>
<body>
    <!--wrapper-->
    <div class="wrapper">
        <!-- Header -->
        @include('admin.includes.header')

        <!-- Sidebar and Main Content -->
        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar -->
                <div class="col-md-4">
                    @include('admin.includes.sidebar')
                </div>
                
                <!-- Main Content -->
                <div class="col-md-12">
                    @yield('content')
                </div>
            </div>
        </div>
        
        <!-- Footer -->
        @include('admin.includes.footer')
    </div>


    <!-- Bootstrap JS -->
	<script src="{{ asset('public/admin/assets/js/bootstrap.bundle.min.js') }}"></script>
	<!--plugins-->
	<script src="{{ asset('public/admin/assets/js/jquery.min.js') }}"></script>
	<script src="{{ asset('public/admin/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
	<script src="{{ asset('public/admin/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
	<script src="{{ asset('public/admin/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
	<script src="{{ asset('public/admin/assets/plugins/apexcharts-bundle/js/apexcharts.min.js') }}"></script>
	<script src="{{ asset('public/admin/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('public/admin/assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>

	<script src="{{ asset('public/admin/assets/js/index.js') }}"></script>
	<!--app JS-->
	<script src="{{ asset('public/admin/assets/js/app.js') }}"></script>
    <script src="{{ asset('public/admin/assets/js/pace.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>

    {{-- <script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script> --}}


    @yield('scripts')


<!-- CKEditor Script (secure version 4.25.1-lts) -->

<script>
  document.addEventListener('DOMContentLoaded', function () {
    ClassicEditor
      .create(document.querySelector('#description'), {
        toolbar: [
          'heading', '|',
          'bold', 'italic', 'link', '|',
          'numberedList', 'bulletedList', '|',
          'blockQuote', 'insertTable', 'mediaEmbed', '|',
          'undo', 'redo'
        ],
        heading: {
          options: [
            { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
            { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
            { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
            { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
            { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
            { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
            { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
          ]
        }
      })
      .then(editor => {
        console.log('Editor was initialized', editor);
      })
      .catch(error => {
        console.error(error);
      });
  });
</script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    ClassicEditor
      .create(document.querySelector('#description1'), {
        toolbar: [
          'heading', '|',
          'bold', 'italic', 'link', '|',
          'numberedList', 'bulletedList', '|',
          'blockQuote', 'insertTable', 'mediaEmbed', '|',
          'undo', 'redo'
        ],
        heading: {
          options: [
            { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
            { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
            { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
            { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
            { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
            { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
            { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
          ]
        }
      })
      .then(editor => {
        console.log('Editor was initialized', editor);
      })
      .catch(error => {
        console.error(error);
      });
  });
</script>
</body>
</html>

