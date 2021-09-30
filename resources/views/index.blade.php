@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div id="products" class="card">
                    <div class="card-header">{{ __('Products') }}</div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>
                                    name
                                </th>
                                <th>
                                    The purchase price
                                </th>
                                <th>
                                    sales price
                                </th>
                                <th>
                                    count
                                </th>
                                <th>
                                    tools
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>
                                        {{ $product['name'] }}
                                    </td>
                                    <td>
                                        {{ $product['price'] }}
                                    </td>
                                    <td>
                                        {{ $product['newprice'] }}
                                    </td>
                                    <td>
                                        {{ $product['count'] }}
                                    </td>
                                    <td style="width: 150px" class="td-tools">
                                        <a href="{{route('addPage',$product['id'])}}">
                                            <img src="{{asset('images/add.png')}}">
                                        </a>
                                        <a style="float: left" href="{{route('edit',[$product['id']])}}">
                                            <img src="{{asset('images/edit.svg')}}">
                                        </a>
                                        <form action="{{url('api/products/destroy/'.$product['id'])}}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button>
                                                <img src="{{asset('images/trash.svg')}}">
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                            @endforeach
                            <tr id="add-td">
                                <td colspan="5">
                                    <a href="{{route('create')}}">
                                        +
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-12 my-5">
                <div id="sales" class="card">
                    <div class="card-header">{{ __('Sales') }}</div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Buyer</th>
                                <th>Count</th>
                                <th>Price</th>
                                <th>Total Price</th>
                                <th>Buy At</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                            $totalprice = 0;
                            @endphp
                            @foreach($sales as $sale)
                                @php
                                    $totalprice += $sale->totalprice;
                                @endphp
                                <tr>
                                    <td>{{$sale->productname}}</td>
                                    <td>{{$sale->buyer}}</td>
                                    <td>{{$sale->count}}</td>
                                    <td>{{$sale->price}}</td>
                                    <td>{{$sale->totalprice}}</td>
                                    <td>{{$sale->created_at}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">{{__('Total Sales :')}} {{ $totalprice }}</div>
                </div>
            </div>
        </div>
    </div>
    {{--    <script src="{{asset('js/index.js')}}"--}}
@endsection
