<x-app-layout>
    @section('body-class', 'hold-transition sidebar-mini layout-fixed')    

    @section('content')
    


    @endsection

    @section('scripts')
    <script src="{{ Config::get('consts.SITE_DOMAIN').'assets/dist/js/pages/dashboard.js' }}"></script>
    @endsection

</x-app-layout>
