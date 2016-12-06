@extends('layout')

@section('content')
    <div class="container-fluid">
        <div class="col-lg-8 col-xs-offset-2">
          <form method="post" action="/bought/store/{{$fetch_item_id->id}}">
              {{csrf_field()}}
            <table class="table table-bordered table-striped">
                <tr>
                    <td colspan="2">
                        <div class="text-center"><strong>Add Store</strong></div>
                    </td>
                </tr>
                <tr>
                    <td>
                        Store Name:<span class="text-danger">*</span>
                    </td>
                    <td>
                        <input type="text" placeholder="eg.Big Bazaar" name="storeName" id="storeName" class="form-control" value="{{old('storeName')}}">
                        @if(count($errors))
                            @foreach($errors->all() as $error)
                            <label class="text-danger">{{$error}}</label>
                            @endforeach
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        Address:
                    </td>
                    <td>
                        <textarea placeholder="optional" class="form-control" id="address" name="address">{{old('address')}}</textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="submit" id="submit" name="submit" value="Submit" class="btn btn-primary">
                        <a href="/bought/{{$fetch_item_id->id}}" class="btn btn-default">Cancel</a>
                        <span class="pull-right text-danger">(* mandatory fields)</span>
                    </td>
                </tr>
            </table>
          </form>
        </div>
    </div>
@stop