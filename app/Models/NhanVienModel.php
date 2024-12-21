<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhanVienModel extends Model
{
    use HasFactory;
    protected $table = 'NHANVIEN';
    protected $fillable = ['manv','hoten','gioitinh','ngaysinh','cccd','chucvu','diachi'];


}
