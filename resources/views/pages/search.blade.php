@extends('layout')
@section('title','Tìm Kiếm | Quản Lý Cây Gia Phả')
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
  <h1>Tìm Thấy {{Count($perrs)}} Thành viên </h1>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th style="width:40px;">STT</th>
          <th>Thành Viên Cũ</th>
          <th>Đời</th>
          <th>Loại Quan Hệ</th>
          <th>Ngày Phát Sinh</th>
          <th>Họ Và Tên</th>
          <th>Cha</th>
          <th>Mẹ</th>
          <th>Giới Tính</th>
          <th>Ngày Sinh</th>
          <th>Quê Quán</th>
          <th>Nghề Nghiệp</th>
          <th>Địa Chỉ</th>
        </tr>
      </thead>
    </table>
  </div>
  
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
        <?php $stt=1 ?>
        @foreach($perrs as $p)
        <tr id="thanhvien-{{$p->id}}">
                <td style="width:40px;">{{$stt++}}</td>
                <td>{{$p->thanviencu}}</td>
                <td>{{$p->doi}}</td>
                <td>{{$p->loaiquanhe}}</td>
                <td>{{$p->ngayphatsinh}}</td>
                <td>{{$p->hovaten}}</td>
                <td>{{$p->cha}}</td>
                <td>{{$p->me}}</td>
                <td>{{$p->gioitinh}}</td>
                <td>{{$p->ngaygiosinh}}</td>
                <td>{{$p->quequan}}</td>
                <td>{{$p->nghenghiep}}</td>
                <td>{{$p->diachi}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="row">
    <div class="col-sm-6"></div>
    <div class="col-sm-6">{{$perrs->links()}}</div>
</div>
</section>
    

<Script>
    $(window).on("load resize ", function() {
  var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
  $('.tbl-header').css({'padding-right':scrollWidth});
}).resize();
</Script>
@endsection
{{-- <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <p>Bạn có chắc chắn xoá <span class="nameObj">...</span> không?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success btnAccept">OK</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<div id="Message" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <p class="your-mess"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div> --}}
<script src="home/js/jquery2.0.3.min.js"></script>
{{-- <script>
    $(document).ready(function () {
        var id = ''
        $('.btn-call-modal').click(function () {
            $('#myModal').modal('show')
            id = $(this).attr('data-id')
            var name = $('.name-' + id).text();
            $('.nameObj').html("<b>" + name + "</b>");
            console.log(id)
        })
        $('.btnAccept').click(function () {
            console.log(id)
            if (id != '') {
                $.ajax({
                    url: "{{route('deleted')}}",
                    data: { id, id },
                    type: "GET",
                    success: function (data) {
                        var mess = "";
                        $('#myModal').modal('hide')
                        if ($.trim(data) == 'success') {
                            mess = "Xoá thành công"
                            $('#thanhvien-' + id).hide();
                        }
                        else mess = "Xoá Thành Viên Thành Công "
                        {
                            $('.your-mess').html(mess)
                            $('#Message').modal('show')
                            location.reload()
                        }
                    }
                })
            }
        })
    })

</script> --}}