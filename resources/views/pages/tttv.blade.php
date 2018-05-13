@extends('layout')
@section('title','Thông Tin Thành Viên | Quản Lý Cây Gia Phả')
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

  width:700px;
  table-layout: fixed;
}
.tbl-header{
    margin-left: 300px;
  background-color: rgb(104, 162, 255);
  width: 700px;
 }
.tbl-content{
    margin-left: 300px;
  height:510px;
  width: 700px;
  overflow-x:auto;
  margin-top: 0px;
  border: 1px solid rgb(0, 0, 0);
}
th{
  padding: 20px 15px;
  text-align: left;
  font-weight: 500;
  font-size: 20px;  
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
  font-size: 15px;
  color: rgb(0, 0, 0);
  border-bottom: solid 1px rgb(0, 0, 0);
}

</style>
<h1>Thông Tin Thành Viên</h1>
<form action="{{route('thong-tin-thanh-vien',$thongtin->id)}}" method="POST" role="form" enctype="multipart/form-data">
<div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>Thông Tin Thành Viên</th>
          <th>{{$thongtin->hovaten}}</th>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
        <td>Thành Viên Cũ :</td>
        <td>{{$thongtin->thanviencu}}</td>
      </tbody>
      <tbody>
        <td>Đời :</td>
        <td>{{$thongtin->doi}}</td>
      </tbody>
      <tbody>
        <td>Loại Quan Hệ :</td>
        <td>{{$thongtin->loaiquanhe}}</td>
      </tbody>
      <tbody>
        <td>Ngày Phát Sinh :</td>
        <td>{{$thongtin->ngayphatsinh}}</td>
      </tbody>
      <tbody>
        <td>Họ Và Tên :</td>
        <td>{{$thongtin->hovaten}}</td>
      </tbody>
      <tbody>
        <td>Họ Tên Cha :</td>
        <td>{{$thongtin->cha}}</td>
      </tbody>
      <tbody>
        <td>Họ Tên Mẹ :</td>
        <td>{{$thongtin->me}}</td>
      </tbody>
      <tbody>
        <td>Giới Tính :</td>
        <td>{{$thongtin->gioitinh}}</td>
      </tbody>
      <tbody>
        <td>Ngày Sinh :</td>
        <td>{{$thongtin->ngaygiosinh}}</td>
      </tbody>
      <tbody>
        <td>Quê Quán :</td>
        <td>{{$thongtin->quequan}}</td>
      </tbody>
      <tbody>
        <td>Địa Chỉ :</td>
        <td>{{$thongtin->diachi}}</td>
      </tbody>
    </table>
  </div>
</form>
@endsection