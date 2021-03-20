@extends('layouts.app')
<head>
    <link rel="stylesheet" href="{{ asset('style.css') }}"/>

</head>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($images as $image)
                <div class="card pub_image">
                    <div class="card-header">{{$image->user->name.' '.$image->user->username}}
                        <div class="container-avatar">
                            @if(NULL !== $image->user->image)
                                <img src="{{ route('user.avatar',$image->user->image) }}" class="avatar"
                                     alt=""/>
                            @else
                                <span class="avatar">Este usuario no tiene imagenes</span>
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="image">
                            <a href="{{route('image.detail', array("id" => $image->id))}}">
                            <img src="{{route('image.get',array('filename' => $image->image_path,))}}"/>
                            </a>
                        </div>
                        <div class="likes">
                            <img src="{{asset('img/heart-grey.png')}}"/>
                        </div>
                        <div class="description">
                            <span class="nickname">{{'@'.$image->user->nick}}</span>
                            <p>{{$image->description}}</p>
                        </div>
                        <a href="" class="btn btn-warning">
                            Comentarios
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <!--Paginacion -->
        <div class="clearfix">

        </div>
        {{$images->links()}}
    </div>
</div>
@endsection
