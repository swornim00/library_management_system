@extends('layouts.app')

@section('title','Borrowers')

@section('content')
<div class="content">

  <div class="col-sm-6">
    <div class="panel">

      <div class="panel-heading">
        <h3>Recent Borrowers</h3>
      </div>
      <div class="panel-body">
        @include('borrowers.recent')

      </div>
    </div>

  </div>
  <div class="col-sm-6">
    <div class="panel">
      <div class="panel-heading">
        <h3>Add Borrowers</h3>
      </div>
      <div class="panel-body">

        @include('borrowers.add')
      </div>
    </div>
  </div>
</div>
@endsection
