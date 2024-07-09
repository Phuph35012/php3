<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    public function listUsers(){
        $listUsers = DB::table('users')
        ->join('phongban','phongban.id','=','users.phongban_id')
        -> select('users.id','users.name','users.email','users.phongban_id','phongban.ten_donvi')
        ->get();
        return view('users/listUsers')->with(['listUsers' => $listUsers]);
    }
    public function addUsers(){
        $phongBan = DB::table('phongban')->select('id','ten_donvi')->get();
        return view('users/addUsers')->with(['phongBan' => $phongBan]);
    }
    public function postUsers(Request $req){
        $data=[
                'name' => $req->nameUsers,
                'email' => $req->emailUsers,
                'phongban_id' => $req->phongbanUser,
                'tuoi' => $req->tuoiUsers,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
        ];
        DB::table('users')->insert($data);
        return redirect()->route('users.listUsers');

}
    public function deleteUser($idUser){
    DB::table('users')->where('id',$idUser)->delete();
    return redirect()->route('users.listUsers');
    }

    public function editUser($idUser){
        $phongBan = DB::table('phongban')->select('id','ten_donvi')->get();
        $user = DB::table('users')->where('id', $idUser)->first();
        return view('users/editUsers',compact('user','phongBan'));
    }
    public function updateUser(Request $req, $idUser){
        $data=[
                'name' => $req->nameUser,
                'email' => $req->emailUser,
                'phongban_id' => $req->phongbanUser,
                'tuoi' => $req->tuoiUser,
                'updated_at' => Carbon::now(),
        ];
        DB::table('users')->where('id', $idUser)->update($data);
        return redirect()->route('users.listUsers');
    }
    // function showUser(){
        // $users = [
        //     [
        //         'id' => '1',
        //         'name' => 'Nguyen',
        //     ],
        //     [
        //         'id' => '2',
        //         'name' => 'long',
        //     ]
        // ];
        // return view('list-user')->with(['users' => $users]);

        //lay danh sach toan bo user (select * from users)
        //$listUsers = DB::table('users')->get();

        //Lấy thông tin user có id = 4
        //c1: $result = DB::table('users')->where('id', '=','4')->first();
        // c2 chỉ lấy đc id: $result = DB::table('users')->find('4');
        
        //Lấy thuộc tính 'name' của user có id = 16
        //$result = DB::table('users')->where('id', '=','16')->value('name');


        //Lấy danh sách idUser của phòng ban 'Ban giám hiệu'
        // $idphongban = DB::table('phongban')
        //     ->where('ten_donvi','like','%Ban giam hieu%')
        //     -> value('id');
        // $result = DB::table('users')->where('phongban_id', '=',$idphongban)->pluck('id');


        //Tìm user có độ tuổi lớn nhất trong công ty
        // $result = DB::table('users')
        //     ->where('tuoi',DB::table('users')->max('tuoi'))
        //     ->get();
        //Tìm user có độ tuổi nhỏ nhất trong công ty
        // $result = DB::table('users')
        //     ->where('tuoi',DB::table('users')->min('tuoi'))
        //     ->get();


        //Đếm xem phòng ban 'Ban giám hiệu' có bao nhiêu user
        //  $idphongban = DB::table('phongban')
        //      ->where('ten_donvi','like','%Ban giam hieu%')
        //      -> value('id');
        //  $result = DB::table('users')->where('phongban_id', '=',$idphongban)
        //      ->count('id'); 


        //Lấy danh sách tuổi các user
        //$result = DB::table('users')->distinct()->pluck('tuoi');


        //Tìm danh sách user có tên 'Khải' hoặc có tên 'Thanh'
        // $result = DB::table('users')
        //     ->where('name','like','%Khai')
        //     ->orWhere('name','like','%thanh')
        //     ->get();


        //Lấy danh sách user ở phòng ban 'Ban đào tạo'
        // $idphongban = DB::table('phongban')
        //     ->where('ten_donvi','like','%Ban đào tạo%')
        //     -> value('id');
        // $result = DB::table('users')
        //     ->where('phongban_id', '=',$idphongban)
        //     ->select('id', 'name','email')
        //     ->get();
        
        

        //Lấy danh sách user có tuổi lớn hơn hoặc bằng 30, danh sách sắp xếp tăng dần
        // $result = DB::table('users')
        //     ->where('tuoi','>=','30')
        //     ->select('id', 'name','email','tuoi')
        //     ->orderBy('tuoi','asc')
        //     ->get();



        //Lấy danh sách 10 user sắp xếp giảm dần độ tuổi, bỏ qua 5 user đầu tiên
        // $result = DB::table('users')
        //      ->select('id', 'name','email','tuoi')
        //      ->orderBy('tuoi','desc')
        //      ->offset(5)
        //      ->limit(10)
        //      ->get();
   


        //Thêm một user mới vào công ty
        // $data = [
        //     'name' => 'Ly Quang Phu',
        //     'email' => 'lyphu@gmail.com',
        //     'phongban_id' => '1',
        //     'songaynghi' => '0',
        //     'tuoi' => '20',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(),
        // ];
        //  DB::table('users')->insert($data);


        //Thêm chữ 'PĐT' sau tên tất cả user ở phòng ban 'Ban đào tạo' 
        // $idphongban = DB::table('phongban')
        //     ->where('ten_donvi','like','%Ban đào tạo%')
        //     -> value('id');
        // $result = DB::table('users')
        //     ->where('phongban_id', '=',$idphongban)
        //     ->select('id', 'name','email')
        //     ->get();
        // foreach($result as $value){
        //     DB::table('users')
        //         ->where('id', $value->id)
        //         ->update(['name' => $value->name.' PĐT']);
        // };


        //Xóa user nghỉ quá 15 ngày
        //DB::table('users')->where('songaynghi', '>', '15')->delete();
    // }
    // function getUser($id,$name = ''){
    //     echo $id;
    //     echo $name;
    // }
    // function updateUser(Request $request){
    //     echo $request->id;
    // }
    // function thongTinSv(){
            
    //         $id = 'ph35012';
    //         $name = 'Ly Quang Phu';
    //         $tuoi = '21';
    //         $chuyen_nganh = 'lap trinh web';
        
    //     return view('list-user',compact('id','name','tuoi','chuyen_nganh'));
    // }
}
