@extends('layouts.app')

@section('title','Books')

@section('content')

<div class="col-sm-12">
    <div class="panel">
        <div class="panel-heading">
            <span class="fa fa-search"></span> Search Books
        </div>
    </div>
</div>

<div class="col-sm-6">
    <div class="panel">
        <div class="panel-heading">
            <h4><span class="fa fa-plus"></span> Add Books</h4>
        </div>
        <div class="panel-body">
            @include('books.add')
        </div>
    </div>
</div>

<div class="col-sm-6">
    <div class="panel">
        <div class="panel-heading">
            <h4><span class="fa fa-plus-circle"></span> Recently Added</h4>
        </div>
        <div class="panel-body">
            @include('books.recent')
        </div>
    </div>
</div>


@endsection
