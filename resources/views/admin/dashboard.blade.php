{{-- <x-app-layout>

</x-app-layout> --}}


<!DOCTYPE html>
<html lang="en">

<head>

    {{-- css files --}}
    @include('admin.css')

</head>

<body>



    <!-- partial -->

    {{-- sidebar panel --}}
    @include('admin.sidebar')

    {{-- navigationbar --}}
    @include('admin.navbar')



    <!-- partial -->

    @include('admin.body')
    <!-- partial -->

    @include('admin.script')

</body>

</html>
