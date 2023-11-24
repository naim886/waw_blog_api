<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Welcome | WaW Blog</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Oswald:wght@200;300;400;500;600;700&family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{asset('dashboard/css/style.css')}}" rel="stylesheet" >

</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 side-bar">
            <div class="logo">
                <img src="{{'image/asset/logo.png'}}" class="img-thumbnail" alt="Logo" />
            </div>
            <ul class="waw-menu">
                @for($i = 0; $i <= 15; $i++)
                    <li class="waw-menu-item">
                        <a href=""><i class="fa-solid fa-house"></i> Dashboard</a>
                    </li>
                    <li class="waw-menu-item waw-dropdown-container active">
                        <a href="javascript:void(0)">
                            <i class="fa-solid fa-file-pen"></i> Blog
                            <i class="waw-menu-item-right-icon fa-solid fa-chevron-down"></i>
                        </a>
                        <ul class="waw-dropdown" style="display: none">
                            <li><a href=""><i class="fa-solid fa-list"></i> Blog list</a> </li>
                            <li><a href=""><i class="fa-solid fa-plus"></i> Add Blog</a> </li>
                            <li><a href=""><i class="fa-solid fa-plus"></i> Add Blog</a> </li>
                            <li><a href=""><i class="fa-solid fa-plus"></i> Add Blog</a> </li>
                            <li><a href=""><i class="fa-solid fa-plus"></i> Add Blog</a> </li>
                        </ul>
                    </li>
                    <li class="waw-menu-item waw-dropdown-container">
                        <a href="javascript:void(0)">
                            <i class="fa-solid fa-file-pen"></i> Category
                            <i class="waw-menu-item-right-icon fa-solid fa-chevron-down"></i>
                        </a>
                        <ul class="waw-dropdown" style="display: none">
                            <li><a href=""><i class="fa-solid fa-list"></i> Category list</a> </li>
                            <li><a href=""><i class="fa-solid fa-plus"></i> Add Category</a> </li>
                            <li><a href=""><i class="fa-solid fa-plus"></i> Add Category</a> </li>
                            <li><a href=""><i class="fa-solid fa-plus"></i> Add Category</a> </li>
                            <li><a href=""><i class="fa-solid fa-plus"></i> Add Category</a> </li>
                        </ul>
                    </li>
                @endfor
            </ul>
            <small class="app_config">
                Version:
                <span class="text-success"> {{env('APP_VERSION') ?? ''}}</span>
                | Running On:   <span class="text-success">{{env('APP_ENV') ?? ''}} </span>
            </small>
        </div>
        <div class="col-md-10 px-0">
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
                            <p> Naim UL Hasan</p>
                            <p><small><i class="fa-solid fa-circle text-success"></i> Admin</small></p>
                        </div>
                    </div>
                    <div class="profile-dropdown" style="display: none">
                        <ul>
                            <li><a href="">Profile</a> </li>
                            <li><a href="">Settings</a> </li>
                            <li>
                                <button class="btn btn-danger btn-sm mt-3"><i class="fa-solid fa-power-off"></i> Logout</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="{{asset('dashboard/js/script.js')}}" ></script>
</body>
</html>
