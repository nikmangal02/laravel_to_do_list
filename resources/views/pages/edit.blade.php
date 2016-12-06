@extends('layout')

@section('content')

    <div class="container-fluid">
        <div class="col-lg-8 col-xs-offset-2">
            <form method="post" action="/edit/{{$fetch_item_name->id}}">
                <table class="table table-bordered table-striped">
                    <tr>
                        <td colspan="2">
                            <div class="text-center">
                                <strong>Edit the product</strong>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Product Name:
                        </td>
                        <td>
                            <label>{{$fetch_item_name->name}}</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Description
                        </td>
                        <td>
                            <textarea name="description" id="description">{{$fetch_item_name->description}}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Quantity
                        </td>
                        <td>
                            <input type="text" id="quantity" name="quantity" value="{{$fetch_item_name->quantity}}">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="submit" id="submit" name="submit" value="Update" class="btn btn-primary">
                            <a href="/" type="button" value="cancel" class="btn btn-default">cancel</a>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

@stop
