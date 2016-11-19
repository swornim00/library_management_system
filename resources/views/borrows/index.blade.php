@extends('layouts.app')

@section('title','Lend A Book')

@section('content')
<div class="col-sm-12">
  <div class="panel">
    <div class="panel-heading">
      <button onclick="lend()" class="btn btn-success pull-right">Lend a book</button>
      <h3>Total Recent Borrows</h3>
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
                <button class="btn btn-danger">
                  @if($borrow->lost == true)
                    Revert Loss
                  @else
                    Lost
                  @endif
                  </button>

                <button class="btn btn-success">
                @if($borrow->cleared == false)
                  Clear
                @else
                  Unclear
                @endif
                </button>
                <button class="btn btn-warning">Charge Fine</button>

              </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

</div>

<script>
  function lend(){
    $.get("{{url('/')}}/lend",function(data){
      $('#def-modal-content').html(data);
    });
    $('#def-modal').modal('show');
  }
</script>
@endsection
