@extends('layout')

@section('content')
    <div class="container-fluid">
        <div class="col-lg-8 col-xs-offset-2">
            <form action="/bought/{{$fetch_name->id}}" method="post">
                {{csrf_field()}}
               <table class="table table-striped table-bordered">
                <tr>
                    <td>
                        Item
                    </td>
                    <td>
                       <b>{{$fetch_name->name}}</b>
                    </td>
                </tr>
                <tr>
                    <td>
                        Store <span class="text-danger">*</span>
                    </td>
                    <td>
                        <select name="store" id="store" >
                            <option value="-1">--Select store--</option>
                            @foreach($stores as $store)
                            <option value="{{$store->id}}"
                                @if(old('store') == $store->id)
                                selected = "selected"
                                    @endif>
                                {{$store->store_name}}
                            </option>
                                <label class="text-danger"></label>
                            @endforeach
                        </select>
                         <label class="text-danger">@if($errors->first('store')) {{ $errors->first('store') }} @endif </label><label> Didn't find your store.Click <a href="store/{{$fetch_name->id}}">here</a> to add your store</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        Price <span class="text-danger">*</span>
                    </td>
                    <td>
                        <input type="number" name="price" id="price" placeholder="eg.500" value="{{old('price')}}">
                        <label class="text-danger"> @if($errors->first('price')) {{ $errors->first('price') }} @endif </label>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="text-center">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">

                            <input type="submit" onclick="return confirm('Are you sure','YES','No')" name="submit" id="submit" value="Submit" class="btn btn-primary">
                        </div>
                    </td>
                </tr>
               </table>
            </form>
        </div>
    </div>
@stop