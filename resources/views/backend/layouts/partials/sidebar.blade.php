<!-- sidebar menu area start -->
@php
    $usr = Auth::guard('admin')->user();
@endphp
<div class="sidebar-menu" id="sidebar-menu" style="width:250px;">
   <div class="sidebar-header" style="margin-left: 30px; height:50px; margin-buttom:30px">
       <!-- <div class="sidebar"> -->
           <a href="{{ route('admin.dashboard') }}">
               <img src="{{asset('backend/assets/images/logo.png')}}" alt="location-team" style="width:70%; height:55%">
           </a>
       <!-- </div> -->
   </div>
   <div class="main-menu clearfix">
       <div class="menu-inner">
           <nav>
               <ul class="metismenu" id="menu">
                    @if(isset($usr->roles[0]) && $usr->roles[0]->name !== 'superadmin')
                        @if($usr->can('file.view'))
                            <li class="active">
                               <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-folder-open"></i><span>My Files</span></a>
                               <ul class="collapse">
                                   <li class="{{ Route::is('fileslist') ? 'active' : '' }}"><a href="{{ route('filebaseoncategory',['wheels']) }}">Wheels</a></li>
                                   <li class="{{ Route::is('fileslist') ? 'active' : '' }}"><a href="{{ route('filebaseoncategory',['tires']) }}">Tires</a></li>
                                   <li class="{{ Route::is('fileslist') ? 'active' : '' }}"><a href="{{ route('filebaseoncategory',['accessories']) }}">Accessories</a></li>
                               </ul>
                            </li>
                        @endif
                        <li class="active">
                           <a href="{{ route('profile.editView',[Auth::guard('admin')->user()->id]) }}" aria-expanded="true"><i class="fa fa-user" aria-hidden="true"></i><span>My Profile</span></a>
                        </li>
                    @endif
                    @if ($usr->can('dashboard.view'))
                        <li class="active">
                           <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                           <ul class="collapse">
                               <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                           </ul>
                        </li>
                    @endif

                   @if ($usr->can('role.create') || $usr->can('role.view') ||  $usr->can('role.edit') ||  $usr->can('role.delete'))
                   <li>
                       <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-tasks"></i><span>
                           Roles & Permissions
                       </span></a>
                       <ul class="collapse {{ Route::is('admin.roles.create') || Route::is('admin.roles.index') || Route::is('admin.roles.edit') || Route::is('admin.roles.show') ? 'in' : '' }}">
                           @if ($usr->can('role.view'))
                               <li class="{{ Route::is('admin.roles.index')  || Route::is('admin.roles.edit') ? 'active' : '' }}"><a href="{{ route('admin.roles.index') }}">All Roles</a></li>
                           @endif
                           @if ($usr->can('role.create'))
                               <li class="{{ Route::is('admin.roles.create')  ? 'active' : '' }}"><a href="{{ route('admin.roles.create') }}">Create Role</a></li>
                           @endif
                       </ul>
                   </li>
                   @endif
                   @if ($usr->can('admin.create') || $usr->can('admin.view') ||  $usr->can('admin.edit') ||  $usr->can('admin.delete'))
                   <li>
                       <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                           Users
                       </span></a>
                       <ul class="collapse {{ Route::is('admin.admins.create') || Route::is('admin.admins.index') || Route::is('admin.admins.edit') || Route::is('admin.admins.show') ? 'in' : '' }}">

                           @if ($usr->can('admin.view'))
                               <li class="{{ Route::is('admin.admins.index')  || Route::is('admin.admins.edit') ? 'active' : '' }}"><a href="{{ route('admin.admins.index') }}">All Users</a></li>
                           @endif

                           @if ($usr->can('admin.create'))
                               <li class="{{ Route::is('admin.admins.create')  ? 'active' : '' }}"><a href="{{ route('admin.admins.create') }}">Create User</a></li>
                           @endif
                       </ul>
                   </li>
                   @endif
                   @if(isset($usr->roles[0]) && $usr->roles[0]->name !== 'customer')
                   <li>
                        <a href="javascript:void(0)" aria-expanded="true">
                            <i class="fa fa-upload"></i>
                            <span>Data</span>
                        </a>
                        <ul class="collapse">
                            <li>
                                <a href="{{ route('fileslist') }}" aria-expanded="true">
                                    <i class="fa fa-upload"></i>
                                    <span>All Files</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('fileupload') }}" aria-expanded="true">
                                    <i class="fa fa-upload"></i>
                                    <span>Upload Files</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('skuupload') }}" aria-expanded="true">
                                    <i class="fa fa-upload"></i>
                                    <span>Discarded SKU's</span>
                                </a>
                            </li>
                       </ul>
                   </li>
                   @endif
               </ul>
           </nav>
       </div>
   </div>
</div>
<!-- sidebar menu area end -->
