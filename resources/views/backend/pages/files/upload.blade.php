
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
                      <div class="form-group">
                        <label for="cars">Choose a Category:</label>
                          <select class="form-control" style="width:15%;" name="category" id="cars">
                            <option value="" selected>Select</option>
                            <option value="wheels">Wheels</option>
                            <option value="tires">Tires</option>
                            <option value="ccessories">Accessories</option>
                          </select>
                      </div>
                      <div class="form-group">
                        <input class="form-control" style="width:20%;" type="file" name="file">
                        <button type="submit" value="submit" class="btn btn-primary mt-4 pr-4 pl-4">Upload</button>
                      </div>
                    </form>
            </div>
        </div>
    </div>
  </div>
</div>
@endsection
