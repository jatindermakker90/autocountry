
@extends('backend.layouts.master')

@section('title')
Dashboard Page - Admin Panel
@endsection


@section('admin-content')

<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <!-- <h4 class="page-title pull-left">Files</h4> -->
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><span>Files List</span></li>
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
    <div class="col-lg-8">
        @include('backend.layouts.partials.messages')
        <div class="row">
          <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">File Name</th>
              <th scope="col">Size</th>
              <th scope="col">Modified File</th>
            </tr>
          </thead>
          <tbody>
            @foreach($files as $key => $file)
            <tr>
              <th scope="row">{{ $key }}</th>
              <td><a download="MyPdf" href="{{ Storage::url($file->file) }}" title="MyPdf">{{ $file->file }}</a></td>
              <td>{{ $file->file_size }}</td>
              <td>{{ $file->updated_at }}</td>
            </tr>
            @endforeach
          </tbody>
          </table>
        </div>
    </div>
  </div>
</div>
@endsection
