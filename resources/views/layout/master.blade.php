<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Sunshine | @yield('title')</title>

  </head>
  <body>
    <!-- Main content -->
    <div class="container-fluid">
        <div class="row">
             <!-- Sidebar -->
             <!-- @include('layouts.partials.sidebar') -->
            <!-- End sidebar -->
            <!-- Content -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

                @yield('content')
                
            </main>
            <!-- End content -->
        </div>
    </div>
    <!-- End main content -->
  </body>
</html>