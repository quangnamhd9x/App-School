@extends('admin.layout.master')
@section('page-title','Danh sách học sinh')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-12 col-md-6"></div>
                                <div class="col-12 col-md-6" style="text-align: right">
                                    <a href="{{ route('students.create') }}" class="btn btn-success">+Thêm mới</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped data-table">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Họ tên</th>
                                    <th>Ảnh</th>
                                    <th>Giới tính</th>
                                    <th>Ngày sinh</th>
                                    <th>Nơi sinh</th>
                                    <th>Địa chỉ</th>
                                    <th>Tùy chọn</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    @forelse($students as $key => $student)
                                        <td>{{++$key}}</td>
                                        <td>{{$student->name}}</td>
                                        <td><img style="width: 100px; height: 100px"
                                                 src="@if($student->getNameImage() == '/storage/images/')
                                                     https://www.studynhac.vn/assets/img/default-avatar.jpg
                                                 @else
                                                 {{$student->getNameImage()}}
                                                 @endif"
                                                 class="img-border-radius avatar-40 img-fluid"></td>
                                        <td>{{$student->gender}}</td>
                                        <td>{{ \Carbon\Carbon::parse($student->date)->format('d/m/Y')}}</td>
                                        <td>{{$student->birthplace}}</td>
                                        <td>{{$student->address}}</td>
                                        <td>
                                            <div>
                                                <a type="button" href="{{route('students.profile', $student->id)}}" data-placement="top">
                                                    <i class="nav-icon fas fa-book"></i>Thông tin
                                                </a>
                                                <a data-placement="top"
                                                   href="{{route('students.edit', $student->id)}}">
                                                    <i class="nav-icon fas fa-edit"></i>Sửa
                                                </a>
                                                <a class="text-danger" onclick="return confirm('Bạn chắc chắn muốn xoá người dùng này?')" href="{{ route('students.destroy', $student->id) }}">
                                                    <i class="nav-icon far fa-trash-alt"></i>Xóa</a>
                                            </div>
                                        </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">Không có dữ liệu</td>
                                    </tr>
                                @endforelse
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>STT</th>
                                    <th>Họ tên</th>
                                    <th>Ảnh</th>
                                    <th>Giới tính</th>
                                    <th>Ngày sinh</th>
                                    <th>Nơi sinh</th>
                                    <th>Địa chỉ</th>
                                    <th>Tùy chọn</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection
