<?php

namespace App\Http\Controllers;

use App\Models\NhanVienModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class NhanVienController extends Controller
{
    public function getAll(){
        $title="Quản lí nhân viên";
        $nhanviens=NhanVienModel::all();
        return view('admin.nhanvien.allnhanvien',compact('title','nhanviens'));
    }

    public function getAllNhanVien(Request $request){
        $nhanviens=NhanVienModel::all();
        return DataTables::of($nhanviens)
            ->addColumn('gioitinh', function($nhanviens) {
                return $nhanviens->gioi_tinh == 0 ? 'Nam' : 'Nữ';
            })
            ->addColumn('action',function($nhanviens){
                return '
                <a href="" class="btn btn-primary btn-sm">Edit</a>
                <form action="" method="POST" style="display:inline;" onsubmit="return confirm(\'Are you sure?\');">
                    ' . csrf_field() . '
                    ' . method_field('DELETE') . '
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
