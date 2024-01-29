@extends('admins.index')
@section('content')
<main class="login-form">
    <div class="container p-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Thêm lớp học</h3>
                    <div class="card-body">
                        <form method="POST" action="{{ route('saveClass') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <select name="level" id="level" class="form-control" required autofocus>
                                    <option value=1>Cấp độ 1</option>
                                    <option value=2>Cấp độ 2</option>
                                    <option value=3>Cấp độ 3</option>
                                    <option value=4>Cấp độ 4</option>
                                    <option value=5>Cấp độ 5</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Mã lớp học" id="class_code" class="form-control"
                                    name="class_code" required>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Tên lớp học" id="name" class="form-control" name="name"
                                    required>
                            </div>
                            <div class="form-group mb-3">
                                <input type="date" placeholder="Ngày bắt đầu" id="start_day" class="form-control"
                                    name="start_day" required>
                            </div>
                            <div class="form-group mb-3">
                                <input type="date" placeholder="Ngày kết thúc" id="end_day" class="form-control"
                                    name="end_day" required>
                            </div>
                            <div class="form-group mb-3">
                                <input type="number" placeholder="Học phí" id="fee" class="form-control" name="fee"
                                    required>
                            </div>
                            <div class="form-group mb-3">
                                <input type="number" placeholder="Số lượng dự kiến" id="prediction_number"
                                    class="form-control" name="prediction_number" required>
                            </div>
                            <div class="form-group mb-3">
                                <input type="number" placeholder="Số buổi học" id="lessons_number" class="form-control"
                                    name="lessons_number" required>
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Xác nhận</button>
                            </div>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection