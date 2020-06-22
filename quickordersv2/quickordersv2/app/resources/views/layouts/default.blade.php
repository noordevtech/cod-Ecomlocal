@include ('includes.head')
<body>
    <body class="m-page--wide m-header--fixed m-header--fixed-mobile m-footer--push m-aside--offcanvas-default"  >
		<!-- begin:: Page -->
		<div class="m-grid m-grid--hor m-grid--root m-page">
            @include('includes.header')
            <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor-desktop m-grid--desktop m-body">
                <div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver	m-container m-container--responsive m-container--xxl m-page__container">
                   <div class="m-grid__item m-grid__item--fluid m-wrapper">
                    <!-- BEGIN: Subheader -->
                    @include('includes.subheader')
                     <!-- END: Subheader -->
                    <div class="m-content">
                        @yield('content')
                    </div>
                   </div>
                </div>
            </div>
        </div>
        @include('includes.footer')

    </body>
</html>
