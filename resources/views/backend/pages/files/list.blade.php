
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

@php
    $usr = Auth::guard('admin')->user();
@endphp
@section('admin-content')

<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">All Files</h4>
                <ul class="breadcrumbs pull-left">
                     @if(isset($usr->roles[0]) && $usr->roles[0]->name !== 'supplier')
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    @endif
                    <li><span>All Files</span></li>
                    @endif
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
                    <h4 class="header-title float-left">Uploaded File List</h4>
                    <p class="float-right mb-2">
                        @if(Auth::guard('admin')->user()->can('admin.edit'))
                            <a class="btn btn-primary text-white" href="{{ route('fileupload') }}">Upload New User</a>
                        @endif
                    </p>
                    <div class="clearfix"></div>
                    <div class="data-tables">
                        @include('backend.layouts.partials.messages')
                        <table id="dataTable" class="text-center">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th width="5%">#</th>
                                    <th width="10%">File Name</th>
                                    <th width="10%">Size</th>
                                    <th width="10%">Category</th>
                                    <th width="10%">Modified File</th>
                                    <th width="20%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($files as $key => $file)
                               <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $file->file }}</td>
                                    <td>{{ $file->file_size }}</td>
                                    <td>{{ $file->category_name }}</td>
                                    <td>{{ $file->updated_at }}</td>
                                    <td><a download="MyPdf" href="{{ Storage::url($file->file) }}" title="MyPdf"><i class="fa fa-download"></i></a></td>
                                </tr>
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
                responsive: true
            });
        }

     </script>
@endsection
