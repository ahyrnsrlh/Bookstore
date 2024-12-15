<!DOCTYPE html>
<html lang="en">
<head>
    
    @include('_includes.head')

</head>
<body>

    @include('_partials.nav')

    <main class="py-12">
    <div class="container flex relative">
        
        @include('_partials.sidebar')

        <main class="flex flex-grow">
        <div class="w-full">
            
            @yield('content')

        </div>
        </main>
    </div>
    </main>

    @include('_includes.foot')

</body>
</html>