<div class="top-bar d-flex justify-content-end pe-4 align-items-center">
    <div class="notifications">
        <i class="fa-solid fa-bell"></i>
    </div>
    <div class="profile-section cursor-pointer">
        <div class="d-flex align-items-center">
            <div class="flex-shrink-0">
                <img src="{{asset('image/asset/profile.jpg')}}" alt="profile photo" />
            </div>
            <div class="flex-grow-1 ms-1">
                <p>{{\Illuminate\Support\Facades\Auth::user()->name}}</p>
                <p><small><i class="fa-solid fa-circle text-success"></i> Admin</small></p>
            </div>
        </div>
        <div class="profile-dropdown" style="display: none">
            <ul>
                <li><a href="">Profile</a> </li>
                <li><a href="">Settings</a> </li>
                <li>
                    {!! Form::open(['route'=>'logout', 'method'=>'post']) !!}
                    <button class="btn btn-danger btn-sm mt-3"><i class="fa-solid fa-power-off"></i> Logout</button>
                    {!! Form::close() !!}
                </li>
            </ul>
        </div>
    </div>
</div>
