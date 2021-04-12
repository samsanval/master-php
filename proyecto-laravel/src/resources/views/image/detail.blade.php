@extends('layouts.app')
<head>
    <link rel="stylesheet" href="{{ asset('style.css') }}"/>

</head>
@section('content')
    <div class="container">
        <div class="row justify-content-center pub_image_detail">
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
                            <div class="clearfix"></div>
                            <div class="comments">
                                <h2>Comentarios  ({{count($image->comments)}})</h2>
                                @foreach($image->comments as $comment)
                                    <div class="comment">
                                        <span class="nickname">{{'@'.$image->user->nick}}</span>
                                        <p>
                                            {{$comment->content}}
                                        </p>
                                        <a class="btn btn-danger" href="{{route('comment.delete',['id'=> $comment->id])}}">Eliminar comentario</a>
                                    </div>
                                @endforeach
                                <form method="POST" action="{{route('comment.save')}}">
                                    @csrf
                                    <input type="hidden" name="image_id" value="{{$image->id}}"/>
                                    <p>
                                        <textarea required name="content" class="form-control">
                                        </textarea>

                                    </p>
                                    <button type="submit" class="btn btn-success">Enviar</button>
                                </form>
                                <hr/>
                            </div>
                        </div>
                    </div>
            </div>
            <!--Paginacion -->
            <div class="clearfix">

            </div>
        </div>
    </div>
@endsection
