@php $permissionArr = App\Utility::getSidebarMenu(); @endphp
    <aside class="main-sidebar sidebar-dark-primary elevation-4">

        <!-- Sidebar -->
        <div class="sidebar">
            

            @if(isset($permissionArr) && count($permissionArr) > 0)
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    @foreach($permissionArr as $permission)
                        @php
                            $icon = App\Models\Menu::where('id', '=', $permission->menu_id)->value('icon');
                        @endphp

                        <li class="nav-item">
                            <a href="{{ url('/'.$permission->url) }}" class="nav-link @if(Request::segment(1) == $permission->url) active @endif">
                            <i class="{{ $icon }}"></i>
                            <p>
                                {{ $permission->name }}
                            </p>
                            </a>
                        </li>

                    @endforeach
                </ul>
            </nav> 
            
@endif
        </div>
    </aside>


          
          
          
              
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>