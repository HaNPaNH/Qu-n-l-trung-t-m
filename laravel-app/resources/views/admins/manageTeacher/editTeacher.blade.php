@extends('admins.index')
@section('content')
<main class="login-form">
    <div class="container p-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Sửa thông tin giáo viên</h3>
                    <div class="card-body">
                        <form method="POST" action="{{ route('updateTeacher', $teacher->id ) }}">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" placeholder="name" id="name" class="form-control" name="name"
                                    value="{{ $teacher->name }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="address" id="address" class="form-control"
                                    name="address" value="{{ $teacher->address }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="workplace" id="workplace" class="form-control"
                                    name="workplace" value="{{ $teacher->workplace }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <input type="number" placeholder="phone" id="phone" class="form-control" name="phone"
                                    value="{{ $teacher->phone }}" required>
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