
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
                <!-- <h4 class="page-title pull-left">Uploads</h4> -->
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><span>File Uploads</span></li>
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
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">File Upload</h4>
                @include('backend.layouts.partials.messages')
                <div class="seofct-icon">File Upload</div>
                    <form method="post" action="{{route('store')}}" enctype="multipart/form-data">
                      {{ csrf_field() }}
                    <div class="file-upload">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <select class="form-control" style="padding: 8px 13px; margin: 4px;" name="category">
                              <option value="" selected>Select Category</option>
                              <option value="wheels">Wheels</option>
                              <option value="tires">Tires</option>
                              <option value="accessories">Accessories</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                            <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add File</button>
                        </div>
                      </div>

                      <div class="image-upload-wrap">
                        <input class="file-upload-input" type='file' name="file" onchange="readURL(this);" accept="image/*" />
                        <div class="drag-text">
                          <h3>Drag and drop a file or select add Image</h3>
                        </div>
                      </div>
                      <div class="file-upload-content">
                        <img class="file-upload-image" src="#" alt="your image" onerror="this.src='{{asset('backend/assets/images/default-file.jpeg')}}'" />
                        <div class="image-title-wrap">
                          <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded File</span></button>
                        </div>
                        <div class="image-title-wrap">
                          <button type="submit" value="submit" class="btn btn-primary" style="width:100%; font-size: 18px;">Upload File <i class="fa fa-upload"></i></button>
                        </div>
                      </div>
                  </div>
                </form>
            </div>
        </div>
    </div>
  </div>
</div>
<script src="{{ asset('backend/assets/js/ajax-lib.js') }}"></script>
<script src="{{ asset('backend/assets/js/file-upload.js') }}"></script>
@endsection
