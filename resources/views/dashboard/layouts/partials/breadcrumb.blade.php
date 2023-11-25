<div class="custom-breadcrumb d-flex justify-content-between align-items-center">
    <nav style="--bs-breadcrumb-divider: '->';" aria-label="breadcrumb" class="d-flex">
        <a href="{{url()->previous()}}"><i class="fa-solid fa-angles-left me-3"></i></a>
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Admin</a></li>
            @isset($cms_content['module_route'])
            <li class="breadcrumb-item" aria-current="page"><a
                    href="{{$cms_content['module_route']}}">{{$cms_content['module_name']}}</a></li>
            @endisset
            @isset($cms_content['sub_module_name'])
            <li class="breadcrumb-item active"
                aria-current="page"><strong>{{$cms_content['sub_module_name']}}</strong> </li>
            @endisset
        </ol>
    </nav>
    <div class="breadcrumb-right-area">
        @if(isset($cms_content['button_type']) && isset($cms_content['button_route']))
        @if($cms_content['button_type'] == 'list')
        <a href="{{$cms_content['button_route']}}">
            <button class="btn btn-outline-success btn-sm">
                <i class="fa-solid fa-list"></i> List
            </button>
        </a>
        @elseif($cms_content['button_type'] == 'create')
        <a href="{{$cms_content['button_route']}}">
            <button class="btn btn-outline-success btn-sm">
                <i class="fa-solid fa-plus"></i> Create
            </button>
        </a>
        @endif
        @endif
    </div>
</div>
