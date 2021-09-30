@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Create New Product') }}</div>

                    <div class="card-body">
                        <form class="form-group" action="{{route('add')}}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$id}}">
                            <label for="name">
                                Buyer :
                            </label>
                            <input name="buyer" class="form-control" type="text">

                            <label for="count">Count :</label>
                            <input name="count" class="form-control" type="number">
                            <button class="btn btn-secondary my-2 float-right">Add!</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
