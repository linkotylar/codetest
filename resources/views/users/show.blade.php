<x-app-layout>

    @section('style')
    @endsection

    @section('body-class', 'hold-transition sidebar-mini layout-fixed')

    @section('content')
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>User Detail</h1>
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
                                    <div class="form-group">
                                        <label for="">Name :</label>
                                        <span>{{ $user->name }}</span>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Email :</label>
                                        <span>{{ $user->email }}</span>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Role :</label>
                                        <span>{{ $user->role->display_name }}</span>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Department :</label>
                                        <span>{{ $user->department->department }}</span>
                                    </div>

                                    <div class="form-group">
                                        <a href="{{ url('/users/'.Base64Url\Base64Url::encode($user->id).'/edit',) }}" class="btn btn-success">Edit</a>
                                        <a href="{{ url('/users') }}" class="btn btn-default">Back</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


        </div>

    @endsection 

    @section('scripts')
    @endsection

    @section('js')
    @endsection

</x-app-layout>