@extends('layouts.app')

@section('title','Lend A Book')

@section('content')
<div class="col-sm-12">
  <div class="panel">
    <div class="panel-heading">
      <button class="btn btn-success pull-right">Lend a book</button>
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
          <tr>
              <td>
                {{$borrow->id}}
              </td>
              <td>
                {{$borrow->book['name']}}
              </td>
              <td>
              {{$borrow->borrowers['name']}}
              </td>
              <td>
              <span class="label label-danger">{{$borrow->status()}}</span>
              </td>
              <td>
                {{$borrow->fine()}}
              </td>
              <td>
                <button class="btn btn-danger">Lost</button>
                <button class="btn btn-success">Clear</button>
                <button class="btn btn-warning">Charge Fine</button>

              </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

</div>

@endsection
