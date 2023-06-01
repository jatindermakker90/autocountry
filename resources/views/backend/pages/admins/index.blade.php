
@extends('backend.layouts.master')

@section('title')
Admin - AutoCountry
@endsection

@section('styles')
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
@endsection


@section('admin-content')

<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Users</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><span>All Users</span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            @include('backend.layouts.partials.logout')
        </div>
    </div>
</div>
<!-- page title area end -->

<div class="main-content-inner">
    <div class="row">
        <!-- data table start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title float-left">Users List</h4>
                    <p class="float-right mb-2">
                        @if (Auth::guard('admin')->user()->can('admin.edit'))
                            <a class="btn btn-primary text-white" href="{{ route('admin.admins.create') }}">Create New User</a>
                        @endif
                    </p>
                    <div class="clearfix"></div>
                    <div class="data-tables">
                        @include('backend.layouts.partials.messages')
                        <table id="dataTable" class="text-center table-responsive">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th width="5%">Sl</th>
                                    <th width="10%">Name</th>
                                    <th width="10%">Email</th>
                                    <th width="40%">Roles</th>
                                    <th width="15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($admins as $admin)
                               <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $admin->name }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td>
                                        @foreach ($admin->roles as $role)
                                            <span class="badge badge-info mr-1">
                                                {{ $role->name }}
                                            </span>
                                        @endforeach
                                    </td>
                                    <td>
                                        @if (Auth::guard('admin')->user()->can('admin.edit'))
                                            <a class="btn btn-primary text-white" href="{{ route('admin.admins.edit', $admin->id) }}" style="margin-right: 10px; padding: 3px 8px;" title="Edit"><i class="fa fa-edit"></i></a>
                                        @endif

                                        @if (Auth::guard('admin')->user()->can('admin.delete'))
                                        <!-- <a class="btn btn-danger text-white" href="{{ route('admin.admins.destroy', $admin->id) }}"
                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $admin->id }}').submit();" style="margin-right: 10px; padding: 3px 8px;" title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </a> -->
                                        <!-- <a class="btn btn-danger text-white" data-toggle="modal" data-target="#deleteconfirmation{{ $admin->id }}"
                                         style="margin-right: 10px; padding: 3px 8px;" title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </a> -->
                                        <!-- <form id="delete-form-{{ $admin->id }}" action="{{ route('admin.admins.destroy', $admin->id) }}" method="POST" style="display: none;">
                                            @method('DELETE')
                                            @csrf
                                        </form> -->
                                        @endif
                                        @if ($admin->user_status == 1)
                                            <a class="btn btn-success text-white" data-toggle="modal" data-target="#exampleModalCenter{{ $admin->id }}" style="padding: 3px 8px;" title="Active"><i class="fa fa-check" aria-hidden="true"></i></a>
                                        @else
                                            <a class="btn btn-danger text-white" data-toggle="modal" data-target="#exampleModalCenter{{ $admin->id }}" style="padding: 3px 8px;" title="InActive"><i class="fa fa-times" aria-hidden="true"></i></a>
                                        @endif
                                    </td>
                                </tr>
                                <!-- Status Modal -->
                                <div class="modal fade" id="exampleModalCenter{{ $admin->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                    <form action="{{ route('userstatus.update', $admin->id) }}" method="POST">
                                    @csrf
                                    <div class="modal-content">
                                      @if ($admin->user_status == 0)
                                      <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Active Account</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                       Are you sure you want to active this account
                                      </div>
                                      <input type="text" value="active" name="status" hidden>
                                      @else
                                      <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Inactive Account</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                       Are you sure you want to inactive this account
                                      </div>
                                      <input type="text" value="inactive" name="status" hidden>
                                      @endif
                                      <div class="modal-footer">
                                          <input type="submit" class="btn btn-primary" value='Submit'>
                                      </div>
                                    </div>
                                  </form>
                                  </div>
                                </div>
                                <!-- Delete Confirmation Modal -->
                                <div class="modal fade" id="deleteconfirmation{{ $admin->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                    <form action="{{ route('admin.admins.destroy', $admin->id) }}" method="POST">
                                      @method('DELETE')
                                    @csrf
                                    <div class="modal-content">
                                      <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLongTitle">Delete Account</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                       Are you sure you want to delete this account
                                      </div>
                                      <div class="modal-footer">
                                          <input type="submit" class="btn btn-primary" value='Submit'>
                                      </div>
                                    </div>
                                  </form>
                                  </div>
                                </div>
                               @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- data table end -->

    </div>
</div>
@endsection


@section('scripts')
     <!-- Start datatable js -->
     <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
     <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
     <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
     <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
     <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>

     <script>
         /*================================
        datatable active
        ==================================*/
        if ($('#dataTable').length) {
            $('#dataTable').DataTable({
                //responsive: true
            });
        }

     </script>
@endsection
