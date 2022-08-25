    <script src="{{ Config::get('consts.SITE_DOMAIN').'assets/plugins/jquery/jquery.min.js' }}"></script>
    <script src="{{ Config::get('consts.SITE_DOMAIN').'assets/plugins/jquery-ui/jquery-ui.min.js' }}"></script>
    <script src="{{ Config::get('consts.SITE_DOMAIN').'assets/plugins/bootstrap/js/bootstrap.bundle.min.js' }}"></script>
    <script src="{{ Config::get('consts.SITE_DOMAIN').'assets/plugins/moment/moment.min.js' }}"></script>
    <script src="{{ Config::get('consts.SITE_DOMAIN').'assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js' }}"></script>    
    <script src="{{ Config::get('consts.SITE_DOMAIN').'assets/dist/js/adminlte.js' }}"></script>
    @yield('scripts')

    @yield('js')
</body>
</html>