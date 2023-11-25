@extends('dashboard.layouts.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            {!! Form::open(['route'=>'category.store', 'method'=>'POST', 'files'=>true]) !!}
            <div class="row">
                <div class="col-md-6">
                    <div class="custom-input-group">
                        {!! Form::label('name', 'Category name') !!}
                        {!! Form::text('name', null, ['class'=>'form-control form-control-sm ' .($errors->has('name') ? 'is-invalid' : ''), 'placeholder'=>'Ex. Technology']) !!}
                        <x-validation-error :error="$errors->first('name')"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="custom-input-group">
                        {!! Form::label('slug', 'Category slug') !!}
                        {!! Form::text('slug', null, ['class'=>'form-control form-control-sm ' .($errors->has('slug') ? 'is-invalid' : ''), 'placeholder'=>'Ex. technology']) !!}
                        <x-validation-error :error="$errors->first('slug')"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="custom-input-group">
                        {!! Form::label('status', 'Category status') !!}
                        {!! Form::select('status', \App\Models\Category::STATUS_LIST , null, ['class'=>'form-select form-select-sm ' .($errors->has('status') ? 'is-invalid' : ''), 'placeholder'=>'Select Status']) !!}
                        <x-validation-error :error="$errors->first('status')"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="custom-input-group">
                        {!! Form::label('parent_id', 'Parent Category') !!}
                        {!! Form::select('parent_id',$categories , null, ['class'=>'form-select form-select-sm ' .($errors->has('parent_id') ? 'is-invalid' : ''), 'placeholder'=>'Select Parent']) !!}
                        <x-validation-error :error="$errors->first('parent_id')"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="custom-input-group">
                        {!! Form::label('description', 'Category Description') !!}
                        {!! Form::textarea('description', null, ['class'=>'form-control form-control-sm ' .($errors->has('description') ? 'is-invalid' : ''), 'placeholder'=>'Ex. technology', 'rows'=>5]) !!}
                        <x-validation-error :error="$errors->first('description')"/>
                    </div>
                </div>
            </div>

            {!! Form::close() !!}
        </div>
    </div>

@endsection
