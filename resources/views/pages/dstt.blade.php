@extends('layout')
@section('title','Danh Sách Thành Viên | Quản Lý Cây Gia Phả')
@section('content')
<style>

h1{
  font-size: 40px;
  color: rgb(0, 0, 0);
  text-transform: uppercase;
  font-weight: 300;
  text-align: center;
  margin-bottom: 15px;
}
table{
  width:100%;
  height: auto;
  table-layout: fixed;
}
.tbl-header{
  background-color: rgb(104, 162, 255);
 }
.tbl-content{
  height:450px;
  overflow-x:auto;
  margin-top: 0px;
  border: 1px solid rgb(0, 0, 0);
}
th{
  padding: 20px 15px;
  text-align: left;
  font-weight: 500;
  font-size: 12px;  
  color: rgb(0, 0, 0);
  text-transform: uppercase;
  font-size: 15px;
}
td{
  padding: 15px;
  padding-top: 10px;
  text-align: left;
  vertical-align:middle;
  font-weight: 300;
  font-size: 12px;
  color: rgb(0, 0, 0);
  border-bottom: solid 1px rgb(0, 0, 0);
}


/* demo styles */

@import url(https://fonts.googleapis.com/css?family=Roboto:400,500,300,700);
body{
  background: -webkit-linear-gradient(left, #ffffff, #ffffff);
  background: linear-gradient(to right, #ffffff, #ffffff);
  font-family: 'Roboto', sans-serif;
}
section{
  margin: 50px;
}

a{
    color: black;
}
/* follow me template */
.made-with-love {
  margin-top: 40px;
  padding: 10px;
  clear: left;
  text-align: center;
  font-size: 10px;
  font-family: arial;
  color: #fff;
}
.made-with-love i {
  font-style: normal;
  color: #F50057;
  font-size: 14px;
  position: relative;
  top: 2px;
}
.made-with-love a {
  color: #fff;
  text-decoration: none;
}
.made-with-love a:hover {
  text-decoration: underline;
}


/* for custom scrollbar for webkit browser*/

::-webkit-scrollbar {
    width: 6px;
} 
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
} 
::-webkit-scrollbar-thumb {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
}
</style>
<section>
  <!--for demo wrap-->
  @if(count($errors)>0)
<div class="alert alert-success">
                  @foreach($errors->all() as $err)
                  <strong>Cảnh Báo !</strong>{{$err}}</br>
                  @endforeach
                    </div>
                @endif
@if(Session::has('message'))
    <div class="alert alert-success">{{Session::get('message')}}</div>
@endif
  <h1>Danh Sách Thành Tích</h1>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          {{-- <th>Thành Viên Cũ</th> --}}
          <th>STT</th>
          <th>Họ Và Tên</th>
          <th>Loại Thành Tích</th>
          <th>Ngày Phát Sinh</th>
          <th>Xoá- Sửa</th>
        </tr>
      </thead>
    </table>
  </div>
  
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
          <?php $stt=1?>
          @foreach($tich as $t)
            <tr>
                {{-- <td>
                    @if({{$t->id_hoso}} == 1){
                        <span>Lạc Long Quân</span>
                    }
                    @if({{$t->id_hoso}} == 2){
                        <span>Phan Minh Ngọc</span>
                    }
                    @if({{$t->id_hoso}} == 3){
                        <span>Phan Minh Ngọc</span>
                    }
                    @if({{$t->id_hoso}} == 6){
                        <span>Phan Minh Ngọc</span>
                    }
                    @if({{$t->id_hoso}} == 9){
                        <span>Phan Minh Ngọc</span>
                    }
                </td> --}}
                <td>{{$stt++}}</td>
                <td>
                    {{$t->ten}}
                </td>
                <td>{{$t->loaithanhtich}}</td>
                <td>{{date("d-m-Y",strtotime($t->ngayphatsinh))}}</td>
                <td>
                    <a href="{{route('del-thanh-tich',$t->id)}}">
                        <button type="button" class="btn btn-warning" onclick="reLoadpages()">
                            <i class="fa fa-trash fa"></i>
                        </button>
                    </a>
                     <a href="{{route('thay-doi-thanh-tich',$t->id)}}">
                        <button type="button" class="btn btn-warning">
                            <i class="fa fa-edit"></i>
                        </button>
                    </a>
                </td>
            </tr>
            <script>
              function reLoadpages() {
                alert('bạn có chắc chắn muốn xoá {{$t->ten}} không ?');
    }
</script>
          @endforeach
        </tbody>
    </table>
  </div>
  <a href="{{route('ghi-nhan-thanh-tich')}}"><button style="color:black" type="button" class="btn btn-info">Thêm Thành Tích Mới</button></a>
</section>
    

{{-- <Script>
    $(window).on("load resize ", function() {
  var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
  $('.tbl-header').css({'padding-right':scrollWidth});
}).resize();
</Script> --}}
@endsection
