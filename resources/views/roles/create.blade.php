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
                            <h1>Create New Role</h1>
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
                                    <form action="{{ url('roles') }}" method="POST">
                                        @csrf 
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Enter name" autofocus required>
                                                    @error('name')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="display_name">Display Name</label>
                                                    <input type="text" name="display_name" id="display_name" value="{{ old('display_name') }}" class="form-control @error('display_name') is-invalid @enderror" placeholder="Enter display name" required>
                                                    @error('display_name')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <div class="row">
                                                    <div class="col-md-12"> 
                                                        @foreach( $permissions as $perKey=>$perVal)
                                                        @if( $perKey !== null )
                                                        <div class="box-body">
                                                            <div class="box-group" id="accordion">
                                                                <div class="panel box box-primary">
                                                                    <div class="box-header with-border">
                                                                        <h4 class="box-title">
                                                                            <a data-toggle="collapse" data-parent="#accordion" href="#{{$perKey}}">
                                                                                {{$perKey}}
                                                                            </a>
                                                                        </h4>
                                                                    </div>     
                                                                    <div id="{{$perKey}}" class="panel-collapse collapse off">
                                                                        <div class="box-body">
                                                                            @foreach($perVal as $per)  
                                                                            <input type="checkbox" class="js-switch" name="permission[]" value="{{$per->id}}"/>{{ $per->key }}
                                                                            @endforeach
                                                                        </div>
                                                                    </div>                       
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form_group">
                                            <input type="submit" class="btn btn-primary" value="Create">
                                            <a href="{{ url('roles') }}" class="btn btn-default">Back</a>
                                        </div>
                                    </form>
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