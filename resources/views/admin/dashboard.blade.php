{{-- <x-app-layout>

</x-app-layout> --}}


<!DOCTYPE html>
<html lang="en">

<head>

    {{-- css files --}}
    @include('admin.css')

</head>

<body>





    {{-- sidebar panel --}}
    @include('admin.sidebar')

    {{-- navigationbar --}}
    @include('admin.navbar')





    @include('admin.body')
   

    @include('admin.script')

</body>

</html>
