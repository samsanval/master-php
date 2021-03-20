@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Subir nueva imagen
                        <div class="card-body">
                            <form method="POST" action="{{route('image.save')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label text-md-right" for="image-path">Imagen</label>
                                    <div class="col-md-7">
                                        <input id="image-path" type="file" name="image-path" class="form-control" required/>
                                        @if($errors->has('image-path'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{$errors->first('image-path')}}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label text-md-right" for="description">Descripción</label>
                                    <div class="col-md-7">
                                        <textarea id="description" name="description" class="form-control"></textarea>
                                        @if($errors->has('image-path'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{$errors->first('description')}}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-3">
                                       <input type="submit" class="btn btn-primary" value="Subir imagen"/>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
