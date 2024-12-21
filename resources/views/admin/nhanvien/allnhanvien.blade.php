@extends('layout.admin.layoutadmin')
@section('getcss')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-start mb-4"><button class="btn btn-success">Thêm mới</button></div>

            <div class="d-flex align-items-center justify-content-between mb-4">

                <h6 class="mb-0">Danh sách nhân viên</h6>
            </div>
            <div class="table-responsive">
                <table  class=" table text-start align-middle table-striped table-hover mb-0 w-100" id="nhanviensTable">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col">Họ Tên</th>
                            <th scope="col">Ngày Sinh</th>
                            <th scope="col">Giới Tính</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('getjs')
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#nhanviensTable').DataTable({
                processing: true,
                responsive: true,
                serverSide: true, // Bật chế độ server-side
                ajax: "{{ route('admin.nhanvienManage.getDataNhanVien') }}", // Đường dẫn tới route lấy dữ liệu
                columns: [{
                        data: 'hoten',
                        name: 'hoten'
                    },
                    {
                        data: 'ngaysinh',
                        name: 'ngaysinh'
                    },
                    {
                        data: 'gioitinh',
                        name: 'gioitinh'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ],
                language: {
                    "sEmptyTable": "Không có dữ liệu trong bảng",
                    "sInfo": "Hiển thị _START_ đến _END_ trong tổng số _TOTAL_ mục",
                    "sInfoEmpty": "Hiển thị 0 đến 0 trong tổng số 0 mục",
                    "sInfoFiltered": "(được lọc từ _MAX_ mục)",
                    "sInfoPostFix": "",
                    "sLengthMenu": "Hiển thị _MENU_ mục",
                    "sLoadingRecords": "Đang tải...",
                    "sProcessing": "Đang xử lý...",
                    "sSearch": "Tìm kiếm:",
                    "sZeroRecords": "Không tìm thấy kết quả",
                    "oPaginate": {
                        "sFirst": "Đầu tiên",
                        "sPrevious": "Trước",
                        "sNext": "Sau",
                        "sLast": "Cuối cùng"
                    },
                    "oAria": {
                        "sSortAscending": ": Sắp xếp cột theo thứ tự tăng dần",
                        "sSortDescending": ": Sắp xếp cột theo thứ tự giảm dần"
                    }
                },
                autoWidth: true, // Tự động điều chỉnh chiều rộng cột
                scrollX:true,
                drawCallback: function(settings) {
                    // Cập nhật lại bảng khi dữ liệu thay đổi (khi sử dụng AJAX)
                    this.api().columns.adjust();
                }
            });
            $(window).resize(function() {
                table.columns.adjust();
                table.draw();
            });
        });
    </script>
@endsection
