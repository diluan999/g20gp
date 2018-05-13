<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HoSoThanhVien;
use App\GhiNhanThanhTich;
use App\GhiNhanKetThuc;
use App\TangGiamThanhVien;
use Validator;
use Hash;
use Auth;
use Illuminate\Support\MessageBag;

class HomeController extends Controller
{
    function getTTTV($id){
        $thongtin = HoSoThanhVien::where('id',$id)->first();
        return view('pages.tttv',compact('thongtin'));
    }
    function getLayout(){
        return view('layout');
    }
    function getHoSoThanhVien(){ 
        return view('pages.hstv');
    }
    function postHoSoThanhVien(Request $req){
        $check =[
            'thanviencu'=>'required|max:50',
            'doi'=>'required|max:10',
            'loaiquanhe'=>'required|max:10',
            'hovaten'=>'required|max:50',
            'cha'=>'required|max:50',
            'me'=>'required|max:50',
            'quequan'=>'required|max:50',
            'nghenghiep'=>'required|max:50',
            'diachi'=>'required|max:50',
        ];
        $mess=[
            'thanviencu.required'=>'Thành viên cũ không thể để trống.',
            'thanviencu.max'=>'Thành viên cũ không thể hơn 50 ký tự',
            'doi.required'=>'Vui lòng nhập đời ',
            'doi.max'=>'Đời tối đa 50 ký tự',
            'loaiquanhe.required'=>'Vui lòng nhập loại quan hệ ',
            'loaiquanhe.max'=>'Loại quan hệ tối đa 10 ký tự',
            'cha.required'=>'Họ tên cha không thể để trống.',
            'cha.max'=>'Họ tên cha không thể hơn 50 ký tự',
            'me.required'=>'Họ tên mẹ không thể để trống.',
            'me.max'=>'Họ tên mẹ không thể hơn 50 ký tự',
            'hovaten.required'=>'Vui lòng nhập nghề nghiệp ',
            'hovaten.max'=>'Họ và tên chỉ tối đa 50 ký tự',
            'quequan.required'=>'Vui lòng nhập quê quán ',
            'quequan.max'=>'Quê quán tối đa 50 ký tự',
            'nghenghiep.required'=>'Vui lòng nhập nghề nghiệp ',
            'nghenghiep.max'=>'Nghề nghiệp tối đa 50 ký tự',
        ];
        $validator = Validator::make($req->all(),$check,$mess);
        if($validator->fails()){
            return redirect()->route('ho-so-thanh-vien')->withErrors($validator)->withInput();
        }
        else {
            $name = $req->hovaten;
            $namecheck = HoSoThanhVien::where('hovaten',$name)->first();
            if(!empty($namecheck)){
                return redirect()->route('ho-so-thanh-vien')->with(['error'=>'Thành viên này đã tồn tại'])->withInput($req->all());
            }
            $person = new HoSoThanhVien;
            $person->thanviencu     = $req->thanviencu;
            $person->doi            = $req->doi;
            $person->loaiquanhe     = $req->loaiquanhe;
            $person->ngayphatsinh   = $req->ngayphatsinh;
            $person->hovaten        = $req->hovaten;
            $person->cha            = $req->cha;
            $person->me             = $req->me;
            $person->gioitinh       = $req->gioitinh;
            $person->ngaygiosinh    = $req->ngaygiosinh;
            $person->quequan        = $req->quequan;
            $person->nghenghiep     = $req->nghenghiep;
            $person->diachi         = $req->diachi;
            $person->deleted        = $req->deleted =1 ;
            $person->save();
            //var_dump($person);
            
        }
        return redirect()->route('ho-so-thanh-vien')->with(['success'=>'Lưu Thành Công']);
    } 
    function getEdit($id){
        $edit = HoSoThanhVien::where('id',$id)->first();
        return view('pages.edit',compact('edit'));
    }
    function getEdittt($id){
        $edittt = GhiNhanThanhTich::where('id',$id)->first();
        return view('pages.edittt',compact('edittt'));
    }
    function getEditKetThuc($id){
        $editkt = GhiNhanKetThuc::where('id',$id)->first();
        return view('pages.editkt',compact('editkt'));
    }
    function postEdit(Request $req,$id){
        $this->validate($req,[
            'loaiquanhe'=>'required|max:10',
            'quequan'=>'required|max:50',
            'nghenghiep'=>'required|max:50',
        ],[
            'loaiquanhe.required'=>'Không thể để trống.',
            'loaiquanhe.max'=>'Loại quan hệ không thể hơn 10 ký tự',
            'quequan.required'=>'Vui lòng nhập nghề nghiệp ',
            'quequan.max'=>'Quê quán tối đa 50 ký tự',
            'nghenghiep.required'=>'Vui lòng nhập nghề nghiệp ',
            'nghenghiep.max'=>'Nghề nghiệp tối đa 50 ký tự',
        ]);
            $pers = HoSoThanhVien::find($id);
            $pers->loaiquanhe     = $req->loaiquanhe;
            $pers->quequan        = $req->quequan;
            $pers->nghenghiep     = $req->nghenghiep;
            //var_dump($pers);
            $pers->save();
            return redirect()->route('danh-sach-thanh-vien')->with('message','Cập Nhật Thành Công');
}
    function postEdittt(Request $req,$id){
        $this->validate($req,[
            'loaithanhtich'=>'required|max:50',
        ],[
            'loaithanhtich.required' => 'Vui lòng nhập loại thành tích',
            'loaithanhtich.max'=>'Loại thành tích quá dài', 
        ]);
        $tt = GhiNhanThanhTich::find($id);
        $tt->id_hoso         = $req->id_hoso;
        $tt->loaithanhtich   = $req->loaithanhtich;
        // var_dump($tt);
        $tt->save();
        return redirect()->route('danh-sach-thanh-tich')->with('success','Cập Nhật Thành Công');
    }
    function postEditKetThuc(Request $req,$id){
       $this->validate($req,[
            'nguyenhan'=>'required|max:50',
            'diadiem' =>'required|max:50'
        ],[
            'nguyenhan.required' => 'Vui lòng nhập nguyên nhân mất',
            'nguyenhan.max'=>'Nguyên nhân  quá dài',
            'diadiem.required' => 'Vui lòng nhập địa điểm mai táng',
            'diadiem.max'=>'Địa điểm mai táng quá dài',  
        ]); 
        $ekt = GhiNhanKetThuc::find($id);
        $ekt->id_hoso =$req->id_hoso;
        $ekt->nguyenhan = $req->nguyenhan;
        $ekt->diadiem =$req->diadiem;
        $ekt->save();
        // dd($ekt);
        return redirect()->route('danh-sach-ket-thuc')->with('message','Cập Nhật Thành Công');
    }
    function getGhiNhanThanhTich(){
        //$ttich = HoSoThanhVien::with('hovaten')->get();
        //$tich = GhiNhanThanhTich::with('HoSoThanhVien')->where('id')->get();
        $tich = GhiNhanThanhTich::all();
        
        return view('pages.gntt',compact('tich'));
    }
    function postGhiNhanThanhTich(Request $req){
        $check =[
            'ten' =>'required|max:50',
            'loaithanhtich' => 'required|max:50',
        ];
        $mess = [
            'ten.required'=>'Vui lòng nhập họ tên',
            'ten.max' =>'Tên quá dài',
            'loaithanhtich.required' => 'Vui lòng nhập loại thành tích',
            'loaithanhtich.max'=>'Loại thành tích quá dài',
        ];
        $validator = Validator::make($req->all(),$check,$mess);
        if($validator->fails()){
            return redirect()->route('ghi-nhan-thanh-tich')->withErrors($validator)->withInput();
        }
        
        $thanhtich =  new GhiNhanThanhTich;
        $thanhtich->id_hoso         = $req->id_hoso;
        $thanhtich->ten           = $req->ten;
        $thanhtich->loaithanhtich   = $req->loaithanhtich;
        $thanhtich->ngayphatsinh    = $req->ngayphatsinh;
        //dd($thanhtich);
        // var_dump($thanhtich);
        $thanhtich->save();
        return redirect()->route('ghi-nhan-thanh-tich')->with('success',"Ghi Nhận Thành Công");
    }
    
    function getDanhSachThanhVien(){
        $per = HoSoThanhVien::where('deleted','<>',0)->get();
        //dd($per);
        return view('pages.dstv',compact('per'));
    }
    function getGhiNhanKetThuc(){
        return view('pages.gnkt');
    }
    function postGhiNhanKetThuc(Request $req){
        $check =[
            'hoten' =>'required|max:50',
            'nguyenhan' => 'required|max:50',
            'diadiem' =>'required|max:50'
        ];
        $mess = [
            'hoten.required'=>'Vui lòng nhập họ tên',
            'hoten.max' =>'Tên quá dài',
            'nguyenhan.required' => 'Vui lòng nhập loại nguyên nhân mất',
            'nguyenhan.max'=>'Nguyên nhân quá dài',
            'diadiem.required'=>'Vui lòng nhập địa điểm mai táng',
            'diadiem.max'=>'Địa điểm mai táng quá dài'
        ];
        $validator = Validator::make($req->all(),$check,$mess);
        if($validator->fails()){
            return redirect()->route('ghi-nhan-ket-thuc')->withErrors($validator)->withInput();
        }
        else {
            $name = $req->hoten;
            $namecheck = GhiNhanKetThuc::where('hoten',$name)->first();
            if(!empty($namecheck)){
                return redirect()->route('ghi-nhan-ket-thuc')->with(['error'=>'Thành viên này đã tồn tại'])->withInput($req->all());
            }
        $ketthuc = new GhiNhanKetThuc;
        $ketthuc->id_hoso = $req->id_hoso;
        $ketthuc->hoten  =$req->hoten;
        $ketthuc->nguyenhan = $req->nguyenhan;
        $ketthuc->thoigianmat = $req->thoigianmat;
        $ketthuc->diadiem = $req->diadiem;
        $ketthuc->save();
        //dd($ketthuc);
        return redirect()->route('ghi-nhan-ket-thuc')->with('success', 'Ghi Nhận Thành Công');
        }
    }
    function getDanhSachKetThuc(){
        $ketthuc = GhiNhanKetThuc::all();
        return view('pages.dskt',compact('ketthuc'));
    }
    function getTangGiamThanhVien(){
        $tang = HoSoThanhVien::all();
        return view('pages.tgtv',compact('tang'));
    }
    function getThanhTichThanhVien(){
        $thanhtich = GhiNhanThanhTic::all();
        return view('pages.tttv',compact('thanhtich'));
    }
    function postThanhTichThanhVien(){

    }
    function getDeleted($id){
        $xoa = HoSoThanhVien::find($id);
        if($xoa != null){
            $xoa->delete();
            return redirect()->back()->with('message','Xoá Thành Công');
        }
        return redirect()->back()->with('message','Xoá Không Thành Công');
    }   

    function getDelThanhTich($id){
        $xoatt = GhiNhanThanhTich::find($id);
        if($xoatt != null){
            $xoatt->delete();
            return redirect()->back()->with('message','Xoá Thành Công');
        }
        return redirect()->back()->with('message','Xoá Không Thành Công');
    }
    function getDelKetThuc($id){
        $xoakt = GhiNhanKetThuc::find($id);
        if($xoakt != null){
            $xoakt ->delete();
            return redirect()->back()->with('message','Xoá Thành Công');
        }
        return redirect()->back()->with('message','Xoá Không Thành Công');
    }
    function getSearch(Request $req){
        if($req->key == ""){
            $perrs = HoSoThanhVien::paginate(5);
            return view('pages.search',compact('perrs'));
        }else{
            $perrs = HoSoThanhVien::where('hovaten','LIKE','%'.$req->key.'%')->paginate(5);
            $perrs->appends($req->only('search'));
            return view('pages.search',compact('perrs'));
        }
        // $perrs = HoSoThanhVien::where('hovaten','LIKE','%'.$req->key.'%')->get();
        // return view('pages.search',compact('perrs'));
    }
    function getDanhSachThanhTich(){
        $tich = GhiNhanThanhTich::all();
        
        return view('pages.dstt',compact('tich'));
    }
    function getLogin(){
        return view('pages.login');
    }
    function postLogin(Request $req){
        // $check =[
        //     'email'=>'required|email',
        //     'password'=>'required|min:6|max:32'
        // ];
        // $mess=[
        //     'email.required'=>'Bạn Chưa Nhập Email',
        //     'password.required'=>'Bạn chưa nhập passowrd',
        //     'password.min'=>'Password tối thiểu 6 ký tự',
        //     'password.max'=>'Password tối đa 32 ký tự'
        // ];
        // $validator = Validator::make($req->all(),$check,$mess);
        // if($validator->fails()){
        //     return redirect()->route('login')->withErrors($validator)->withInput();
        // }
        // Auth::attempt([
        //     'email'=>$req->email,
        //     'password'=>$req->password
        //     ]);
        // if(Auth::check()){
        //     return redirect()->route('danh-sach-thanh-vien');
        // }
        // return redirect()->route('login')->with([
        //     'error'=>'Sai Tài Khoản Hoặc Mật Khẩu'
        // ]);
    	$rules = [
    		'email' =>'required|email',
    		'password' => 'required|min:6'
    	];
    	$messages = [
    		'email.required' => 'Email là trường bắt buộc',
    		'email.email' => 'Email không đúng định dạng',
    		'password.required' => 'Mật khẩu là trường bắt buộc',
    		'password.min' => 'Mật khẩu phải chứa ít nhất 8 ký tự',
    	];
    	$validator = Validator::make($req->all(), $rules, $messages);

    	if ($validator->fails()) {
    		return redirect()->back()->withErrors($validator)->withInput();
    	} else {
    		$email = $req->input('email');
    		$password = $req->input('password');

    		if( Auth::attempt(['email' => $email, 'password' =>$password])) {
    			return redirect()->route('danh-sach-thanh-vien');
    		} else {
    			$errors = new MessageBag(['errorlogin' => 'Email hoặc mật khẩu không đúng']);
    			return redirect()->back()->withInput()->withErrors($errors);
    		}
        }
        function __construct(){
            $this->middleware('auth');
        }
    }
    function getLogout(){
        Auth::logout();
        return redirect()->route('login');
    }
}