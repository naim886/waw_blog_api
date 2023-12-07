@extends('dashboard.layouts.master')
@section('content')
    <table class="table table-stripped table-bordered table-hover">
        <thead>
        <tr>
            <th>SL</th>
            <th>
                Name
                <x-tool-tip title="'Top one is Category name and bellow one is slug'"/>
            </th>
            <th>Parent</th>
            <th>Status</th>
            <th>Date Time</th>
            <th>Action By</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @forelse($categories as $category)
            <tr>
                <td>
                    <x-table-serial :serial="$loop->iteration" :model="$categories"/>
                </td>
                <td>
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <img src="{{image_url($category->image, \App\Models\Category::IMAGE_UPLOAD_PATH)}}" alt="{{$category->name}}" class="table-image">
                        </div>
                        <div class="flex-grow-1 ms-1">
                            <p>{{$category->name}}</p>
                            <p class="text-success">{{$category->slug}}</p>
                        </div>
                    </div>

                </td>
                <td>Parent</td>
                <td>{{$category->status}}</td>
                <td>
                    <p>{{$category->created_at}}</p>
                    <p>{{$category->created_at != $category->updated_at ? $category->updated_at->toDayDateTimeString() : 'Not updated yet'}}</p>
                </td>
                <td>
                    <p>{{$category->created_by?->name}}</p>
                    <p>{{$category->updated_by?->name}}</p>
                </td>
                <td>

                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7"><p class="text-danger text-center">No Data Found</p></td>
            </tr>
        @endforelse

        </tbody>
    </table>
    {{$categories->links()}}
@endsection
@push('script')


@endpush
