@extends('dashboard.layouts.master')
@section('content')
    <table class="table table-stripped table-bordered table-hover">
        <thead>
        <tr>
            <th>SL</th>
            <th>
                Name
                <x-tool-tip :title="'Top one is Category name and bellow one is slug'"/>
            </th>
            <th>Parent</th>
            <th>Status</th>
            <th>Action By
                <x-tool-tip :title="'Top one is created time and bellow one is updated time'"/>
            </th>
            <th>Date Time
                <x-tool-tip :title="'Top one is created date and bellow one is updated date'"/>
            </th>
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
                            <img src="{{image_url($category->image, \App\Models\Category::IMAGE_UPLOAD_PATH)}}"
                                 alt="{{$category->name}}" class="table-image">
                        </div>
                        <div class="flex-grow-1 ms-1">
                            <p>{{$category->name}}</p>
                            <p class="text-success">{{$category->slug}}</p>
                        </div>
                    </div>
                </td>
                <td>{{$category->parent?->name}}</td>
                <td class="text-center">
                    @if($category->status == \App\Models\Category::STATUS_ACTIVE)
                        <x-active/>
                    @else
                        <x-inactive/>
                    @endif
                </td>
                <td>
                    <x-action-by :created="$category->created_by?->name" :updated="$category?->updated_by?->name"/>
                </td>
                <td>
                    <x-date-time :created="$category->created_at" :updated="$category->updated_at"/>
                </td>
                <td>
                    <div class="d-flex">
                        <x-action-view :route="route('category.show', $category->id)"/>
                        <x-action-edit  class="mx-1" :route="route('category.edit', $category->id)"/>
                        <x-action-delete :route="route('category.destroy', $category->id)"/>
                    </div>

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
