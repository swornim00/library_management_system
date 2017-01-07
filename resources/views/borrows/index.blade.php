@extends('layouts.app')

@section('title','Lend A Book')

@section('content')
<div class="col-sm-12">
    <div class="panel">
        <div class="panel-heading">
            <button onclick="lend()" class="btn btn-success pull-right">Lend a book</button>
            <h3>Total Recent Borrows</h3>
            <div>
                <a href="{{url('borrows')}}" class="btn btn-success">All</a>
                <a href="{{url('borrows')}}?mode=cleared" class="btn btn-primary">Cleared</a>
                <a href="{{url('borrows')}}?mode=lost" class="btn btn-danger">Losted</a>
            </div>
            <span class="pull-right">{{$borrows->links()}}</span>
        </div>
        <div class="panel-body">

            <table class="table responsive-table">
                <tbody>
                    <tr>
                        <th>
                            S.N
                        </th>
                        <th>
                            Book Name
                        </th>
                        <th>
                            Borrower's Name
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            Fine
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                    @foreach($borrows as $borrow)
                    <tr @if($borrow->cleared == true) class="success" @elseif($borrow->status() == 'Charging Fine') class="warning" @endif>
                        <td>
                            {{$borrow->id}}
                        </td>
                        <td>
                            <a href="{{url('/')}}/book/{{$borrow->book_id}}">{{$borrow->book['name']}}</a>
                        </td>
                        <td>
                            <a href="{{url('/')}}/borrower/{{$borrow->borrower_id}}">{{$borrow->borrowers['name']}}</a>
                        </td>
                        <td>
                            @if($borrow->status() == 'Cleared')

                            <span class="label label-success">{{$borrow->status()}}</span>

                            @elseif($borrow->status() == 'Charging Fine')

                            <span class="label label-warning">{{$borrow->status()}}</span>

                            @else
                            <span class="label label-danger">{{$borrow->status()}}</span>

                            @endif

                        </td>
                        <td>
                            {{$borrow->fine()}}
                        </td>
                        <td>
                                @if($borrow->lost == true)
                                <button onclick="_rev_loss_({{$borrow->id}})" class="btn btn-danger">
                                    Revert Loss
                                </button>
                                @else
                                    @if($borrow->cleared == true)
                                    <button disabled class="btn btn-danger">
                                        Lost
                                    </button>
                                    @else
                                    <button onclick="_lost_({{$borrow->id}})" class="btn btn-danger">
                                        Lost
                                    </button>
                                    @endif
                                @endif

                                @if($borrow->cleared == false)
                                <button onclick="_clear_({{$borrow->id}})" class="btn btn-success">
                                Clear
                                </button>
                                @else
                                <button onclick="_unclear_({{$borrow->id}})" class="btn btn-success">
                                Unclear
                                </button>
                                @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

<script>
    jQuery(document).ready(function($){
        // standard on load code goes here with $ prefix
        // note: the $ is setup inside the anonymous function of the ready command
        $.ajaxSetup({
            headers:
            { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });

    });


    function lend(){
        $.get("{{url('/')}}/lend",function(data){
            $('#def-modal-content').html(data);
        });
        $('#def-modal').modal('show');
    }

    function _clear_(id)
    {

        $.ajax({
            url: "{{url('/')}}/borrow/clear/"+id,
            method: "POST",
            data: {_token:"{{\Session::token()}}"},
        }).fail((data) => {
            console.log(data);
        }).done((data) => {
            location.reload();
        });
    }

    function _unclear_(id)
    {

        $.ajax({
            url: "{{url('/')}}/borrow/unclear/"+id,
            method: "POST",
            data: {_token:"{{\Session::token()}}"},
        }).fail((data) => {
            console.log(data);
        }).done((data) => {
            location.reload();
        });
    }

    function _lost_(id)
    {

        $.ajax({
            url: "{{url('/')}}/borrow/lost/"+id,
            method: "POST",
            data: {_token:"{{\Session::token()}}"},
        }).fail((data) => {
            console.log(data);
        }).done((data) => {
            location.reload();
        });
    }

    function _rev_loss_(id)
    {

        $.ajax({
            url: "{{url('/')}}/borrow/rev_loss/"+id,
            method: "POST",
            data: {_token:"{{\Session::token()}}"},
        }).fail((data) => {
            console.log(data);
        }).done((data) => {
            location.reload();
        });
    }
</script>
@endsection
