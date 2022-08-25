<x-app-layout>

    @section('style')
    <link rel="stylesheet" href="{{ Config::get('consts.SITE_DOMAIN').'assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css' }}">
    <link rel="stylesheet" href="{{ Config::get('consts.SITE_DOMAIN').'assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css' }}">
    <link rel="stylesheet" href="{{ Config::get('consts.SITE_DOMAIN').'assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css' }}">
    @endsection

    @section('body-class', 'hold-transition sidebar-mini layout-fixed')

    @section('content')
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Menu Lists</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('menus/create') }}" class="btn btn-success">Create New Menu</a></li>
                        </ol>
                    </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <table id="menuTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Icon</th>
                                                <th>order_by</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


        </div>

    @endsection 

    @section('scripts')
    <script src="{{ Config::get('consts.SITE_DOMAIN').'assets/plugins/datatables/jquery.dataTables.min.js' }}"></script>
    <script src="{{ Config::get('consts.SITE_DOMAIN').'assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js' }}"></script>
    <script src="{{ Config::get('consts.SITE_DOMAIN').'assets/plugins/datatables-responsive/js/dataTables.responsive.min.js' }}"></script>
    <script src="{{ Config::get('consts.SITE_DOMAIN').'assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js' }}"></script>
    <script src="{{ Config::get('consts.SITE_DOMAIN').'assets/plugins/datatables-buttons/js/dataTables.buttons.min.js' }}"></script>
    <script src="{{ Config::get('consts.SITE_DOMAIN').'assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js' }}"></script>
    <script src="{{ Config::get('consts.SITE_DOMAIN').'assets/plugins/jszip/jszip.min.js' }}"></script>
    <script src="{{ Config::get('consts.SITE_DOMAIN').'assets/plugins/pdfmake/pdfmake.min.js' }}"></script>
    <script src="{{ Config::get('consts.SITE_DOMAIN').'assets/plugins/pdfmake/vfs_fonts.js' }}"></script>
    <script src="{{ Config::get('consts.SITE_DOAMIN').'assets/plugins/datatables-buttons/js/buttons.html5.min.js' }}"></script>
    <script src="{{ Config::get('consts.SITE_DOMAIN').'assets/plugins/datatables-buttons/js/buttons.print.min.js' }}"></script>
    <script src="{{ Config::get('consts.SITE_DOMAIN').'assets/plugins/datatables-buttons/js/buttons.colVis.min.js' }}"></script>
    @endsection

    @section('js')
    <script>
        $(function() {
            $("#menuTable").DataTable({
            "responsive": true, 
            "lengthChange": false, 
            "autoWidth": false,
            processing: true,
            serverSide: true,
            ajax: "{{ url('get_menu') }}",
            columns: [
                {data: 'name', name: 'name'},
                {data: 'icon', name: 'icon'},
                {data: 'order_by', name: 'order_by'},
                {data: 'action', name: 'action'},
            ]
            });
        })
    </script>
    @endsection

</x-app-layout>