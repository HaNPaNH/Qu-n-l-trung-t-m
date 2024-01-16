@extends('auth.layouts')
@section('content')
   <!-- <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#">Danh sách chung</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('mSStudent')}}">Thông tin chi tiết</a>
        </li>
    </ul> -->
   <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" href="#tab1">Tab 1</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#tab2">Tab 2</a> 
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="tab1">
            <p>Tab 1 Content here...</p>
        </div>
        <div class="tab-pane fade" id="tab2">   
            <p>Tab 2 Content here...</p>
        </div>
    </div>
   
@endsection