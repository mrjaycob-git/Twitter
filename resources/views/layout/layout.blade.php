<!DOCTYPE html>
<html lang="EN">

<head>
    {{-- tu includujeme head --}}
    @include('layout.head')
</head>

<body>
    {{-- tu includujeme nav bar --}}
    @include('_template.nav')

    <div class="container py-4">
        {{-- tu extendujeme content --}}
        @yield('content')
    </div>

    {{-- tu includujeme footer --}}
    @include('layout.footer')
</body>

</html>