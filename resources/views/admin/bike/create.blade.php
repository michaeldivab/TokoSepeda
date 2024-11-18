@extends('layouts/admin')
@section('title')
{{$viewData["title"]}}
@endsection
@section('sectioncss')
<link href="{{ asset('/css/create.css') }}" rel="stylesheet" />
@endsection
@section('content')
<div class="card" id="card-admin" style="margin-right: 2%; width: 100%; size: 100px; font-size: 25px;">
   <div class="card-header">{{__('messages.create_bike') }}</div>
   <div class="card-body">
      @if (session('status'))
      <div class="alert alert-success">
         {{ session('status') }}
      </div>
      @endif
      @if($errors->any())
      <ul id="error_list">
         @foreach($errors->all() as $error)
         <li class="error">{{ $error }}</li>
         @endforeach
      </ul>
      @endif
      <form method="POST" enctype="multipart/form-data" action="{{ route('admin.bike.save') }}" style="margin-right: 20px;">
         @csrf
         <input type="text" name="name" class="form-control m-2" placeholder="{{ __('messages.enter_bike_name') }}"
            value="{{ old('name') }}" required />
         <input oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" type="number" min="0" name="stock" class="form-control m-2" placeholder="{{ __('messages.enter_bike_stock') }}"
            value="{{ old('stock') }}" required />
         <input oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" type="number" min="0" name="price" class="form-control m-2" placeholder="{{ __('messages.enter_bike_price') }}"
            value="{{ old('stock') }}" required />
         <input oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" type="number" min="0" max="100" name="discount" class="form-control m-2" placeholder="Discount (%)"
         value="{{ old('stock') }}" required />
         <input oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" type="number" min="0" name="weight" class="form-control m-2" placeholder="berat sepeda"
         value="{{ old('weight') }}" required />
         <div id="form_input_container" style="display: none;">
            <label for="share" class="form_label">{{__('messages.enter_bike_share')}} </label>
            <input type="hidden" name="share" value="0"><input type="checkbox" class="bike_create_check"
               onclick="this.previousSibling.value=1-this.previousSibling.value">
         </div>
         <select name="type" class="form-control m-2" value="{{ old('type') }}" required>
            <option value="" disabled selected>Select a bike type</option>
            <option value="Sepeda Gunung">Sepeda Gunung</option>
            <option value="Sepeda Balap">Sepeda Balap</option>
            <option value="Sepeda Lipat">Sepeda Lipat</option>
            <option value="Sepeda BMX">Sepeda BMX</option>
            <option value="Sepeda Anak">Sepeda Anak</option>
            <option value="Sepeda Listrik">Sepeda Listrik</option>
         </select>
         <select name="brand" class="form-control m-2" value="{{ old('brand') }}" required>
            <option value="" disabled selected>Select a bike brand</option>
            <option value="Polygon">Polygon</option>
            <option value="United Bike">United Bike</option>
            <option value="Giant">Giant</option>
            <option value="Trek">Trek</option>
            <option value="Specialized">Specialized</option>
            <option value="Thrill">Thrill</option>
            <option value="Pacific">Pacific</option>
         </select>
         <textarea onkeydown="return /[a-z]/i.test(event.key)" name="color" class="form-control m-2" rows="2" value="{{ old('color') }}"
            placeholder="Warna Sepeda" required></textarea>
         <div>
            <label for="image" class="form_label">{{__('messages.enter_bike_image')}}</label>
            <input type="file" name="image" class="form-control m-2" />
         </div>
         <textarea name="description" class="form-control m-2" rows="5" value="{{ old('description') }}"
            placeholder="{{__('messages.enter_bike_description')}}" required></textarea>
         <button type="submit" class="btn btn-success">{{ __('messages.send') }}</button>
      </form>
   </div>
</div>
@endsection