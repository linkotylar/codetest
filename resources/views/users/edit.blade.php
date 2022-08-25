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
                            <h1>Edit User</h1>
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
                                    <form action="{{ url('users', \Base64Url\Base64Url::encode($user->id)) }}" method="POST">
                                        @csrf 

                                        <input type="hidden" value="PUT" name="_method">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control @error('name') is-invalid @enderror" placeholder="Enter name" autofocus required>
                                                    @error('name')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control @error('email') is-invalid @enderror" placeholder="Enter email" required>
                                                    @error('email')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="role_id">Role</label>
                                                    <select name="role_id" id="role_id" class="form-control @error('role_id') is-invalid @enderror" requried>
                                                        @foreach($roles as $role)
                                                        <option value="{{ $role->id }}" @if($role->id == $user->role_id)  selected  @endif>{{ $role->display_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('role_id')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="department_id">Department</label>
                                                    <select name="department_id" id="department_id" class="form-control @error('department_id') is-invalid @enderror" requried>
                                                        @foreach($departments as $department)
                                                        <option value="{{ $department->id }}" @if($department->id == $user->department_id)  selected  @endif>{{ $department->department }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('department_id')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form_group">
                                            <input type="submit" class="btn btn-primary" value="Update">
                                            <a href="{{ url('users') }}" class="btn btn-default">Back</a>
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