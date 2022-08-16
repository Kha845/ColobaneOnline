<!DOCTYPE html>
<html lang="en">
<x-header />
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <x-topnav />
        <x-aside />
        <div class="content-wrapper">
            <h1>La liste des utilisateurs</h1>
        </div>
       <x-sidebar />
        <x-footer />
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
        @livewireScripts
</body>
</html>


