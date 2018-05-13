@extends('layout') @section('title','Thay Đổi Thông Tin | Quản Lý Cây Gia Phả') @section('content') 
<div class="panel-body">
                
                @if(count($errors)>0)
                <div class="alert alert-danger">
                  @foreach($errors->all() as $err)
                  <strong>Cảnh Báo !</strong>{{$err}}</br>
                  @endforeach
                    </div>
                @endif
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                    {{Session::get('success')}}
                    </div>
                @endif
                @if(Session::has('error'))
                    <div class="alert alert-danger">
                    {{Session::get('error')}}
                    </div>
                @endif
<form action="{{route('ho-so-thanh-vien')}}" method="POST" role="form" enctype="multipart/form-data">
  {{@csrf_field()}}
  <h1>Thêm Thành Viên</h1>
  <div class="box-body">
    <div class="row">
      <div class="col-md-6">
        <input type="hidden" value="logo.png" name="old_logo">
        <label>Thành Viên Cũ </label>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-user"></i></span>
          <input type="text" class="form-control" placeholder="Thành Viên Cũ" name="thanviencu" value="" >
        </div>

        <label>Đời</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
          <input type="text" class="form-control" placeholder="Đời" name="doi" value="" >
        </div>

        <label>Loại Quan Hệ</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-user"></i></span>
          <input type="text" class="form-control" placeholder="Loại Quan Hệ" name="loaiquanhe" value="" >
        </div>
        <label>Ngày Phát Sinh</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-birthday-cake"></i></span>
          <input type="date" class="form-control" placeholder="Date" name="ngayphatsinh" value="" >
        </div>

        <label>Họ Và Tên</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-user"></i></span>
          <input type="text" class="form-control" placeholder="Name" name="hovaten" value="" >
        </div>
        <label>Cha</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-user"></i></span>
          <input type="text" class="form-control" placeholder="Name" name="cha" value="" >
        </div>

      </div>
      <div class="row">
        <div class="col-md-6">
          <label>Mẹ</label>
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input type="text" class="form-control" placeholder="Name" name="me" value="" >
          </div>

          <label>Giới Tính</label>
          <div class="input-group" style="height:45px;" >
            <span class="input-group-addon"><i class="fa fa-map"></i></span>
            {{-- <label><input  type="radio"  name="gioitinh" value="Nam"> Nam</label>
            <label><input type="radio" name="gioitinh" value="Nữ"> Nữ</label> --}}
            <select name="gioitinh" id="" class="form-control" style="height:45px;">
              <option value="Nam">Nam</option>
              <option value="Nữ">Nữ</option>
            </select>
          </div>
          <label>Ngày Sinh</label>
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-birthday-cake"></i></span>
            <input type="date" class="form-control" placeholder="Date" name="ngaygiosinh" value="" >
          </div>

          <label>Quê Quán </label>
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
            <input type="text" class="form-control" placeholder="Quê Quán" name="quequan" value="" >
          </div>

          <label>Nghề Nghiệp</label>
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user-md"></i></span>
            <input type="text" class="form-control" placeholder="Nghề Nghiệp" name="nghenghiep" value="" >
          </div>

          <label>Địa Chỉ</label>
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
            <input type="text" class="form-control" placeholder="Address" name="diachi" value="" >
          </div>
        </div>
        <div class="col-md-12">
          <div class="pull-right box-tools">
            <button type="submit" class="btn btn-primary"><i class="fa fa-spinner fa-pulse"></i>Lưu</button>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.box-body -->
</form>
@endsection