<!DOCTYPE html>
<html lang="pt-br">

<head>

    @include('dashboard.header')

</head>

<body id="page-top">

    <div id="wrapper">

        @include('dashboard.sibebar')

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                @include('dashboard.navbar')

                <div class="container-fluid">

                    @yield('breadcrumb')

                    @yield('content')

                </div>

            </div>

            @include('dashboard.footer')

        </div>

    </div>

    @include('dashboard.footer-scripts')

    @yield('footer-extras')

</body>

</html>
