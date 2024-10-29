@extends('layouts/admin')
@section('title')
    {{$viewData["title"]}}
@endsection
@section('sectioncss')
    <link href="{{ asset('/css/show.css') }}" rel="stylesheet" />
@endsection
@section('content')
<div id="card-admin fluid-container" style="margin-right: 20%; width: 100%;">
    <div id="show_container" class="mt-2">
        <div id="show_info_container">
            <img id="show_img" src="{{ Storage::url($viewData["bike"]->getImage()) }}"/>
            <div id="show_info" class="card fluid-container" style="width: 500px;">
                <h2 class="mt-2">{{$viewData["bike"]->getName()}}</h1>
                <h3 class="mt-2">${{$viewData["bike"]->getPrice()}}</h3>
                <h6 class="mt-1">{{__('messages.bike_stock')}}: {{$viewData["bike"]->getStock()}}</h6>
                <p class="mt-1">{{__('messages.bike_brand')}}: {{$viewData["bike"]->getBrand()}}</p>
                <p class="">{{__('messages.bike_type')}}: {{$viewData["bike"]->getType()}}</p>
                <p class="">Color: {{$viewData["bike"]->color}}</p>
                <p class="mt-1">Description: {{$viewData["bike"]->description}}</p>
                @if ($viewData["bike"]->getUser()->getRole() === 'user')
                    <p>{{__('messages.bike_user_creator')}}: {{$viewData["bike"]->getUser()->getName()}}</p>
                @endif
            </div>
        </div>
        
        @if ($viewData["bike"]->getUser()->getRole() === 'user')
            <div id="show_parts">
                <button class="btn btn-primary mb-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseParts" aria-expanded="false" aria-controls="collapseParts">
                    {{__('messages.bike_parts')}}
                </button>
                <div class="collapse row" id="collapseParts">
                    @foreach($viewData["bike"]->getAssemblies() as $assemblie)
                        <div class="col">
                        <a href="{{ route('user.part.show' , ['id'=>$assemblie->getPart()->getId()])}}"><p class="show_info_general text-black">{{$assemblie->getPart()->getName()}}</p></a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
        <div id="options_container">
            <a id="delete-btn-{{$viewData['bike']->getId()}}">
                <button type="submit" class="btn bg-danger text-white" > {{ __('messages.bike_delete')}}</button>
            </a>
            <a href="{{ route('admin.bike.update', ['id'=>$viewData['bike']->getId()])}}">
                <button type="submit" class="btn bg-danger text-white" > {{ __('messages.bike_update')}}</button>
            </a>
            <form id="delete-form-{{$viewData['bike']->getId()}}" action="{{ route('admin.bike.remove', ['id'=>$viewData['bike']->getId()])}}" method="post">
              @csrf
              @method('delete')
            </form>
        </div>
    </div>
    <div class="container container_reviews mt-5">
        <h2>{{__('messages.Reviews')}}</h2>
        <hr>
            @foreach($viewData["bike"]->getReviews() as $review)
            <div class="row mt-3">
                <div class="col-3">
                    <p><strong>{{__('messages.User')}}:</strong> {{ $review->getUser()->getName() }}</p>
                    <p><strong>{{__('messages.Date')}}:</strong> {{ $review->getCreatedAt() }}</p>
                </div>
                <div class="col-2">
                    <p><strong>{{__('messages.Stars')}}:</strong> -</p>
                </div>
                <div class="col-5">
                    <p><strong>{{__('messages.Description')}}:</strong> {{ $review->getDescription() }}</p>
                </div>
                <div class="col-2">
                    <form action="{{ route('admin.review.delete', ['id'=> (int)$review->getId()]) }}" method="post">
                        <button type="submit" class="btn bg-danger text-white btn-md" >{{__('messages.Delete this review')}}</button>
                        @csrf
                        @method('delete')
                    </form>
                </div>
            </div>
            <hr>
            @endforeach
    </div>
</div>
@endsection

@section('js')

    <script>
        $("#delete-btn-{{$viewData['bike']->getId()}}").on('click', function (e) {
            e.preventDefault();
            Swal.fire({
                title: 'Delete Bike',
                text: "Are You Sure Want Delete This Data, Bike {{ $viewData['bike']->getName() }} ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!'
            }).then((result) => {
                if(result) {
                    $("#delete-form-{{$viewData['bike']->getId()}}").submit();
                }
            }
        )
            ;
        });
    </script>

@endsection