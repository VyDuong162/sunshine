<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    //
    public function hello(){
        $hoten= '<b>Dương Thị Tường Vy</b>';
        $lop= '<b>Laravel</b>';
        $dangnhap=true;
        $dulieumauJSON = <<<EOT
        [{
            "id": 1,
            "first_name": "Kimberly",
            "last_name": "Eardley",
            "email": "keardley0@yale.edu",
            "gender": "Female",
            "ip_address": "78.107.99.105"
          }, {
            "id": 2,
            "first_name": "Harriette",
            "last_name": "Fiddler",
            "email": "hfiddler1@wix.com",
            "gender": "Female",
            "ip_address": "91.61.112.43"
          }, {
            "id": 3,
            "first_name": "Madelaine",
            "last_name": "Windous",
            "email": "mwindous2@webmd.com",
            "gender": "Female",
            "ip_address": "79.56.244.108"
          }, {
            "id": 4,
            "first_name": "Mitch",
            "last_name": "Bainton",
            "email": "mbainton3@networksolutions.com",
            "gender": "Male",
            "ip_address": "185.75.121.226"
          }, {
            "id": 5,
            "first_name": "Kettie",
            "last_name": "Antos",
            "email": "kantos4@ovh.net",
            "gender": "Female",
            "ip_address": "62.52.219.131"
          }]
EOT;
        $biendulieumau_trong_action = json_decode($dulieumauJSON);
        return view('example.hello')
        ->with('ht',$hoten)
        ->with('l',$lop)
        ->with('dn',$dangnhap)
        ->with('biendulieumau_trong_view', $biendulieumau_trong_action)
         // Chuyển $dulieumau từ JSON string -> Object
         

        ;
    }
    public function index(){
      return view('example.index');
    }
    
}
