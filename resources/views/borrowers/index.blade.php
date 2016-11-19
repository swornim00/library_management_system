@extends('layouts.app')

@section('title','Borrowers')

@section('content')
<div class="content">

  <div class="col-sm-6">
    <div class="panel">

      <div class="panel-heading">
        <h4>Recent Borrowers</h4>
      </div>
      <div class="panel-body">
        @include('borrowers.recent')

      </div>
    </div>

  </div>
  <div class="col-sm-6">
    <div class="panel">
      <div class="panel-heading">
        <h4>Add Borrowers</h4>
      </div>
      <div class="panel-body">

        @include('borrowers.add')
      </div>
    </div>
  </div>
</div>
@endsection
