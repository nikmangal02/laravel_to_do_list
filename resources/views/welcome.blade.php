@extends('layout')

@section('content')
    <div class="container-fluid">
        <div class="col-lg-6">
            <table class="table table-bordered table-striped">
                <tr>
                    <td colspan="7">
                        <div class="text-center"><strong>List of Products</strong></div>
                    </td>
                </tr>
                @if($count > 0)
                    <tr>
                        <td>
                            Name of product
                        </td>
                        <td>
                            Description
                        </td>
                        <td>
                            Quantity
                        </td>
                        <td>
                            Price(Rs)
                        </td>
                        <td colspan="3">
                            <div class="text-center">
                                Actions
                            </div>
                        </td>
                    </tr>


                    @foreach($item_name as $user)
                        <tr>
                            <td>
                                {{$user->name}}
                            </td>
                            @if($user->description)
                                <td>
                                    {{$user->description}}
                                </td>
                            @else
                                <td>
                                    <div class="text-danger">
                                        <lable>Not Added</lable>
                                    </div>
                                </td>
                            @endif
                            <td>
                                {{$user->quantity}}
                            </td>
                            @if($user->price)
                                <td>
                                    {{$user->price}}
                                </td>
                            @else
                                <td>
                                    --
                                </td>
                            @endif
                            @if($user->is_check == 1)
                                <td>
                                    <div class="text-center text-success">
                                        <i class="glyphicon glyphicon-ok"></i>
                                    </div>
                                </td>
                            @else
                                <td>
                                    <div class="text-center">
                                        <a href="bought/{{$user->id}}" class="btn btn-success btn-sm">Bought</a>
                                    </div>
                                </td>
                            @endif
                            @if($user->is_check == 1)
                                <td>
                                    <div class="text-center">
                                        <lable>Bought</lable>
                                    </div>
                                </td>
                            @else
                                <td>
                                    <div class="text-center">
                                        <a href="edit/{{$user->id}}" class="btn btn-primary btn-sm">Edit</a>
                                    </div>
                                </td>
                            @endif
                            @if($user->is_check == 1)
                                <td>
                                    <div class="text-center">
                                        Bought
                                    </div>
                                </td>
                            @else
                                <td>
                                    <div class="text-center">
                                        <a href="delete/{{$user->id}}" class="btn btn-danger btn-sm">Remove</a>
                                    </div>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="7">
                            <div class="text-center">
                                {{$item_name->links()}}
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <div class="text-center">
                                <a href="addItem" class="btn btn-primary">Add More item</a>
                            </div>
                        </td>
                        <td colspan="4">
                            <div class="text-center">
                                <a href="boughtList" class="btn btn-primary">Check bought item</a>
                            </div>
                        </td>
                    </tr>
                @else
                    <tr>
                        <td>
                            <div class="text-center alert alert-danger">
                                No item list is available yet.Click <a href="addItem">here</a> to create a list
                            </div>
                        </td>
                    </tr>
                @endif
            </table>
        </div>

        <div class="col-lg-5">
            <table class="table table-bordered table-striped">
                <tr>
                    <td colspan="2">
                        <div class="text-center">
                            <strong>
                                Trending Stores
                            </strong>
                        </div>
                    </td>
                </tr>
                @if($count_store_name > 0)
                    <tr>
                        <td>
                            Store Name
                        </td>
                        <td>
                            Purchases(in Rs)
                        </td>
                    </tr>
                    @foreach($store_name as $store)
                        <tr>
                            <td>
                                {{$store->store_name}}
                            </td>
                            <td>
                                {{$store->price}}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td>
                            <div class="text-center">
                                <label class="alert alert-danger">Trend is yet to be set</label>
                            </div>
                        </td>
                    </tr>
                @endif
            </table>
        </div>
    </div>
@stop
