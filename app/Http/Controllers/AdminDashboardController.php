<?php

namespace App\Http\Controllers;

use App\Models\NhanVienModel;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index(){
        $title = "Dashboard";
        $nhanviens=NhanVienModel::all();
        return view('admin.index',compact('title','nhanviens'));
    }
}
