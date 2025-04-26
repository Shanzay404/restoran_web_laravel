<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Restoran</title>

   @include('Admin.includes.css-links')
</head>

<body>
    <div id="app">

        @include('Admin.includes.sidebar')

        <div id="main">


            <header class="mb-3">
                @include('Admin.includes.header')
            </header>



           <div class="content">

              @yield('content')


           </div>

            <footer>

                @include('Admin.includes.footer')

            </footer>


        </div>


    </div>


    @include('Admin.includes.scripts')
    
</body>

</html>