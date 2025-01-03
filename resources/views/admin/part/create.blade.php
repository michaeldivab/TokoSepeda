@extends('layouts/admin')
@section('title', $viewData['title'])
@section('sectioncss')
    <link href="{{ asset('/css/create.css') }}" rel="stylesheet" />
@endsection
@section('content')
<div class="card" id="card-admin" style="margin-right: 2%; width: 100%; size: 100px; font-size: 25px;">
    <div class="card-header">{{__('messages.create_part') }}</div>
    <div class="card-body">
        @if($errors->any())
        <ul id="error_list">
            @foreach($errors->all() as $error)
                <li class="error">{{ $error }}</li>
            @endforeach
        </ul>
        @endif
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.part.save') }}">
            @csrf
            <input type="text" name="name" class="form-control m-2" placeholder="{{ __('messages.enter_name') }}" value="{{ old('name') }}" required/>
            <input oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" type="number" name="stock" min="0"  class="form-control m-2" placeholder="{{ __('messages.enter_stock') }}"  value="{{ old('stock') }}" required/>
            <input oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" type="number" name="price"  class="form-control m-2" placeholder="{{ __('messages.enter_price') }}" min="0"  value="{{ old('price') }}" required/>
            <input type="text" name="brand" class="form-control m-2" placeholder="{{ __('messages.enter_brand') }}" value="{{ old('brand') }}" required/>
            <select name="type" class="form-control m-2" value="{{ old('type') }}" required>
                <option value="" disabled selected>{{ __('messages.select_type') }}</option>
                <option value="frame">{{ __('messages.frame') }}</option>
                <option value="wheel">{{ __('messages.wheel') }}</option>
                <option value="saddle">{{ __('messages.saddle') }}</option>
                <option value="chain">{{ __('messages.chain') }}</option>
                <option value="handlebar">{{ __('messages.handlebar') }}</option>
                <option value="pedal">{{ __('messages.pedal') }}</option>
            </select>
            <div>
                <label for="image" class="form_label"> {{ __('messages.image') }}: </label>
                <input type="file" name="image" class="form-control m-2" />
            </div>
            <button type="submit" class="btn btn-success">{{ __('messages.send') }}</button>
        </form>
    </div>
</div>
@endsection