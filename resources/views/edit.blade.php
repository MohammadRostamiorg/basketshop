@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header">{{ __('Update Product \ ')}}<span style="color:red;font-weight: bold">{{ $info[0]->name }}</span></div>

                    <div class="card-body">
                        <form class="form-group" action="{{route('update',['id' => $info[0]->id])}}" method="post">
                            @csrf
                            @method('PUT')
                            <label for="name">
                                Name :
                            </label>
                            <input name="name" class="form-control" type="text" value="{{$info[0]->name}}">
                            <label for="price">
                                The purchase price :
                            </label>
                            <input name="price" class="form-control" type="text" value="{{$info[0]->price}}">
                            <label for="newprice">
                                Sales price :
                            </label>
                            <input name="newprice" class="form-control" type="text" value="{{$info[0]->newprice}}">
                            <label for="count">Count :</label>
                            <input name="count" class="form-control" type="number" value="{{$info[0]->count}}">
                            <button class="btn btn-secondary my-2 float-right">Update!</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
