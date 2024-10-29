@extends('layouts/admin')
@section('title')
{{$viewData["title"]}}
@endsection
@section('sectioncss')
<link href="{{ asset('/css/create.css') }}" rel="stylesheet" />
@endsection
@section('content')
<div class="card" id="card-admin" style="margin-right: 2%; width: 100%; size: 100px; font-size: 25px;">
   <div class="card-header">{{__('messages.update_bike') }}</div>
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
      <form method="POST" enctype="multipart/form-data"
         action="{{ route('admin.bike.save.update', ['id'=>$viewData['bike']->getId()])}}">
         @csrf
         @method('patch')
         <label for="name" class="form_label">Name</label>
         <input id="name" type="text" name="name" class="form-control" value="{{$viewData['bike']->getName()}}" required />

         <label for="stock" class="form_label">Stock</label>
         <input id="stock" type="number" name="stock" class="form-control" value="{{$viewData['bike']->getStock()}}"
            required />

         <label for="price" class="form_label">Price</label>
         <input id="price" type="number" name="price" class="form-control" value="{{$viewData['bike']->getPrice()}}"
            required />

         <label for="discount" class="form_label">Discount (%)</label>
         <input id="discount" type="number" name="discount" class="form-control" value="{{$viewData['bike']->discount}}"
            required />

         <label for="weight" class="form_label">Weight</label>
         <input id="weight" type="text" name="weight" class="form-control" value="{{$viewData['bike']->weight}}" required />

         <div id="form_input_container" style="display: none;">
            <label for="share" class="form_label">{{__('messages.enter_bike_share')}} </label>
            @if ($viewData['bike']->getShare())
            <input type="hidden" name="share" value="0"><input type="checkbox" class="bike_create_check"
               onclick="this.previousSibling.value=1-this.previousSibling.value" checked>
            @else
            <input type="hidden" name="share" value="0"><input type="checkbox" class="bike_create_check"
               onclick="this.previousSibling.value=1-this.previousSibling.value">
            @endif
         </div>

         <label for="type" class="form_label">Bike Type</label>
         <select id="type" name="type" class="form-control" value="{{ old('type') }}" required>
            <option value="{{$viewData['bike']->type}}" selected>{{$viewData['bike']->type}}</option>
            <option value="Sepeda Gunung">Sepeda Gunung</option>
            <option value="Sepeda Balap">Sepeda Balap</option>
            <option value="Sepeda Lipat">Sepeda Lipat</option>
            <option value="Sepeda BMX">Sepeda BMX</option>
            <option value="Sepeda Anak">Sepeda Anak</option>
            <option value="Sepeda Listrik">Sepeda Listrik</option>
         </select>

         <label for="brand" class="form_label">Bike Brand</label>
         <select id="brand" name="brand" class="form-control" value="{{ old('brand') }}" required>
            <option value="{{$viewData['bike']->brand}}" selected>{{$viewData['bike']->brand}}</option>
            <option value="Polygon">Polygon</option>
            <option value="United Bike">United Bike</option>
            <option value="Giant">Giant</option>
            <option value="Trek">Trek</option>
            <option value="Specialized">Specialized</option>
            <option value="Thrill">Thrill</option>
            <option value="Pacific">Pacific</option>
         </select>

         <label for="color" class="form_label">Color</label>
         <textarea id="color" name="color" class="form-control" rows="2" value="{{ old('color') }}"
            placeholder="Warna Sepeda" required>{{ $viewData['bike']->color }}</textarea>

         @if ($viewData["bike"]->getUser()->getRole() === 'user')
         {{-- <select name="frame" class="form-control m-2" value="{{ old('frame') }}" required>
            <option value="" disabled selected>Select a frame </option>
            @foreach ($viewData["part_types"]["frame"] as $part)
            <option value="{{$part->getId()}}">{{$part->getName()}}</option>
            @endforeach
         </select>
         <select name="wheel" class="form-control m-2" value="{{ old('wheel') }}" required>
            <option value="" disabled selected>Select a wheel </option>
            @foreach ($viewData["part_types"]["wheel"] as $part)
            <option value="{{$part->getId()}}">{{$part->getName()}}</option>
            @endforeach
         </select>
         <select name="saddle" class="form-control m-2" value="{{ old('sadle') }}" required>
            <option value="" disabled selected>Select a saddle </option>
            @foreach ($viewData["part_types"]["saddle"] as $part)
            <option value="{{$part->getId()}}">{{$part->getName()}}</option>
            @endforeach
         </select>
         <select name="chain" class="form-control m-2" value="{{ old('chain') }}" required>
            <option value="" disabled selected>Select a chain </option>
            @foreach ($viewData["part_types"]["chain"] as $part)
            <option value="{{$part->getId()}}">{{$part->getName()}}</option>
            @endforeach
         </select>
         <select name="handlebar" class="form-control m-2" value="{{ old('handlebar') }}" required>
            <option value="" disabled selected>Select a handlebar </option>
            @foreach ($viewData["part_types"]["handlebar"] as $part)
            <option value="{{$part->getId()}}">{{$part->getName()}}</option>
            @endforeach
         </select>
         <select name="pedal" class="form-control m-2" value="{{ old('pedal') }}" required>
            <option value="" disabled selected>Select a pedal </option>
            @foreach ($viewData["part_types"]["pedal"] as $part)
            <option value="{{$part->getId()}}">{{$part->getName()}}</option>
            @endforeach
         </select> --}}
         @else
            @endif
            <div >
               <label for="image" class="form_label">Image</label>
               <input type="file" name="image" class="form-control" />
            </div>

            <label for="description" class="form_label">Description</label>
            <textarea id="description" name="description" class="form-control" rows="5"
               required>{{$viewData['bike']->getDescription()}}</textarea>
            <button type="submit" class="btn btn-success" >{{ __('messages.send') }}</button>
      </form>
   </div>
</div>
@endsection