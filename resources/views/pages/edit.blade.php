@extends('layout')
@section('title','Thay Đổi Thông Tin | Quản Lý Cây Gia Phả')
@section('content')
@if(count($errors)>0)
                <div class="alert alert-danger">
                  @foreach($errors->all() as $err)
                  <strong>Cảnh Báo !</strong>{{$err}}</br>
                  @endforeach
                    </div>
                @endif
@if(Session::has('message'))
    <div class="alert alert-danger">{{Session::get('message')}}</div>
    @endif
<form action="{{route('thay-doi-thong-tin',$edit->id)}}" method="POST" role="form" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <h1>Thay đổi thông tin thành viên : {{$edit->hovaten}}</h1>
            <div class="box-body">
              <div class="row">
                  <div class="col-md-6">
                      <input type="hidden" value="logo.png" name="old_logo">
                      <label>Thành Viên Cũ </label>   
                      <div class="input-group">                   
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control" placeholder="Thành Viên Cũ" name="thanviencu" disabled value="{{$edit->thanviencu}}">
                      </div>                      
                      
                      <label>Đời</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                        <input type="text" class="form-control" placeholder="Đời" name="doi" value="{{$edit->doi}}" disabled>                    
                      </div>                    
                      
                      <label>Loại Quan Hệ</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control" placeholder="Loại Quan Hệ" name="loaiquanhe" value="{{$edit->loaiquanhe}}">                    
                      </div>
                      <label>Ngày Phát Sinh</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-birthday-cake"></i></span>
                        <input type="date" class="form-control" placeholder="Date" name="ngayphatsinh" disabled value="{{$edit->ngayphatsinh}}">                    
                      </div>

                      <label>Họ Và Tên</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control" placeholder="Name" name="hovaten" disabled value="{{$edit->hovaten}}">                    
                      </div>
                      <label>Cha</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control" placeholder="Name" name="cha" value="{{$edit->cha}}" disabled>                    
                      </div>
                      
                </div>
                <div class="row">
                  <div class="col-md-6">
                      <label>Mẹ</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control" placeholder="Name" name="me" value="{{$edit->me}}" disabled>                    
                      </div>
        
                      <label>Giới Tinh</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map"></i></span>
                        <input type="text" class="form-control" placeholder="Giới Tính" name="gioitinh" disabled value="{{$edit->gioitinh}}">
                      </div>  
                      <label>Ngày Sinh</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-birthday-cake"></i></span>
                        <input type="date" class="form-control" placeholder="Date" name="ngaygiosinh" disabled value="{{$edit->ngaygiosinh}}">                    
                      </div>           
                      
                      <label>Quê Quán </label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                        <input type="text" class="form-control" placeholder="Quê Quán" name="quequan" value="{{$edit->quequan}}">                    
                      </div>                    
                      
                      <label>Nghề Nghiệp</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user-md"></i></span>
                        <input type="text" class="form-control" placeholder="Address" name="nghenghiep" value="{{$edit->nghenghiep}}">                    
                      </div>

                      <label>Địa Chỉ</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
                        <input type="text" class="form-control" placeholder="Address" name="diachi" disabled value="{{$edit->diachi}}">                    
                      </div>
                </div>  
                  <div class="col-md-12">
                    <div class="pull-right box-tools">
                      <button type="submit" class="btn btn-primary"><i class="fa fa-spinner fa-pulse"></i> Hoàn tất</button>   
                    </div>
                  </div>
              </div>                
              <!-- /.row -->  
            </div>
            <!-- /.box-body -->
            </form>
@endsection