@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Create New Product') }}</div>

                    <div class="card-body">
                        <form class="form-group" action="{{route('store')}}" method="post">
                            @csrf
                            <label for="name">
                                Name :
                            </label>
                            <input name="name" class="form-control" type="text">
                            <label for="price">
                                The purchase price :
                            </label>
                            <input name="price" class="form-control" type="text">
                            <label for="newprice">
                                Sales price :
                            </label>
                            <input name="newprice" class="form-control" type="text">
                            <label for="count">Count :</label>
                            <input name="count" class="form-control" type="number">
                            <button class="btn btn-secondary my-2 float-right">Create!</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
