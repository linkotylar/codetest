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
                            <h1>Create New Permission</h1>
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
                                    <form action="{{ url('permissions') }}" method="POST">
                                        @csrf 
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="menu_id">Menu</label>
                                                    <select name="menu_id" id="menu_id" class="form-control" required>
                                                        <option value="">-- Choose Menu --</option>
                                                        @foreach($menus as $menu)
                                                        <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <div class="form-group">
                                                        <span >
                                                            <input id="index" type="checkbox" name="key[]" value="index" />Home
                                                        </span>
                                                        <span>
                                                            <input  id="create" type="checkbox" name="key[]" value="create" />Create
                                                        </span>
                                                        <span>
                                                            <input  id="show" type="checkbox" name="key[]" value="show" />Show
                                                        </span>
                                                        <span>
                                                            <input  id="edit" type="checkbox" name="key[]" value="edit" />Edit
                                                        </span>
                                                        <span>
                                                            <input  id="destroy" type="checkbox" name="key[]" value="destroy" />Destroy
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                           
                                        </div>

                                        <div class="form_group">
                                            <input type="submit" class="btn btn-primary" value="Create">
                                            <a href="{{ url('permissions') }}" class="btn btn-default">Back</a>
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
    <script>
        $("#menu_id").on('change', function(){
        var url = '{{url("/check_permissions")}}';
        m_id = this.value;
        $.ajax({
            url: url,
            type: "GET",
            dataType: "json",
            data: {menu_id : m_id,},
            success: function(data){
                $("#index").removeAttr("disabled");
                $("#create").removeAttr("disabled");
                $("#show").removeAttr("disabled");
                $("#edit").removeAttr("disabled");
                $("#destroy").removeAttr("disabled");
                if (m_id == 4) {
                    $("#edit").attr("disabled", true);
                }
                $.each(data, function(index, item){
                    switch(item.key){
                        case "index":
                        $("#index").attr("disabled", true);
                        break;
                        case "create":
                        $("#create").attr("disabled", true);
                        break;
                        case "show":
                        $("#show").attr("disabled", true);
                        break;
                        case "edit":
                        $("#edit").attr("disabled", true);
                        break;
                        case "destroy":
                        $("#destroy").attr("disabled", true);
                        break;
                    }
                });
            },
        });
    });
    </script>
    @endsection

</x-app-layout>