@extends('layout')

@section('content')

    <div class="container-fluid">
        <div class="col-lg-8 col-xs-offset-2">
            <form method="post" action="added">
{{csrf_field()}}
                <table class="table table-bordered table-striped">
                    <tr>
                        <td colspan="2">
                            <div class="text-center">
                                <strong>Add the product</strong>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Product Name<span class="text-danger">*</span>:
                        </td>
                        <td>
                            <input type="text" name="name" id="name" placeholder="eg.Rice" value="{{old('name')}}">
                            <label class="text-danger"> @if($errors->first('name')) {{ $errors->first('name') }} @endif</label>
                        </td>

                    </tr>
                    <tr>
                        <td>
                            Description(optional)
                        </td>
                        <td>
                            <textarea placeholder="eg.Basmati" id="description" name="description">{{old('description')}}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Quantity<span class="text-danger">*</span>
                        </td>
                        <td>
                            <input type="text" placeholder="eg.10kg" id="quantity" name="quantity" value="{{old('quantity')}}">
                           <label class="text-danger"> @if($errors->first('quantity')) {{ $errors->first('quantity') }} @endif </label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="submit" id="add" name="add" value="Add" class="btn btn-primary">
                                <a href="/" class="btn btn-default">Cancel</a>
                            <span class="pull-right text-danger">(* mandatory)</span>
                        </td>
                    </tr>
                </table>

            </form>
        </div>
    </div>

@stop
