@extends('layouts.app')
<head>
    <link rel="stylesheet" href="{{ asset('style.css') }}"/>

</head>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
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
                                <img src="{{route('image.get',array('filename' => $image->image_path,))}}"/>
                            </div>
                            <div class="likes">
                                <img src="{{asset('img/heart-grey.png')}}"/>
                            </div>
                            <div class="description">
                                <span class="nickname">{{'@'.$image->user->nick}}</span>
                                {{$image->created_at}}
                                <p>{{$image->description}}</p>
                            </div>
                            <a href="" class="btn btn-warning">
                                Comentarios
                            </a>
                        </div>
                    </div>
            </div>
            <!--Paginacion -->
            <div class="clearfix">

            </div>
        </div>
    </div>
@endsection
