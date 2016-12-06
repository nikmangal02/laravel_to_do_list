@extends('layout')

@section('content')
    <div class="container-fluid">
        <table class="table table-bordered table-striped">
            <tr>
                <td colspan="6">
                    <div class="text-center">
                        <strong>Item history</strong>
                    </div>
                </td>
            </tr>
            @if($count > 0)

            <tr>
                <td>
                    <b>Item</b>
                </td>
                <td>
                    <b>Description</b>
                </td>
                <td>
                    <b>Quantity</b>
                </td>
                <td>
                    <b>Price</b>
                </td>
                <td>
                    <b>Bought From</b>
                </td>
                <td>
                    <b>Purchase on</b>
                </td>
            </tr>
                @foreach($fetchCompleteBoughtList as $displayList)
                <tr>
                    <td>
                        {{$displayList->name}}
                    </td>
                    @if($displayList->description)
                    <td>
                        {{$displayList->description}}
                    </td>
                    @else
                        <td>
                            <div class="text-danger">
                               <label>You didn't add</label>
                            </div>
                        </td>
                    @endif
                    <td>
                        {{$displayList->quantity}}
                    </td>
                    <td>
                        {{$displayList->price}}
                    </td>
                    <td>
                        {{ $displayList->store->store_name }}
                    </td>
                  <td>
                      {{ $displayList->create_at}}
                  </td>
                </tr>
                @endforeach
                @else
            <tr>
                <td>
                    <div class="text-center alert alert-success">
                        No list has been created yet !!! Click <a href="addItem">here</a> to create a list
                    </div>
                </td>
            </tr>
           @endif
        </table>
    </div>
@stop