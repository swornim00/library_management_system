@extends('layouts.app')

@section('title','Dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h3><span class="fa fa-user"></span> Welcome to Administrator's Dashboard</h3></div>
              </div>

              <div class="col-sm-12">
                <a href="{{url('/books')}}">
                <div class="col-sm-6">
                  <div class="panel link-panel" >
                    <div class="panel-heading">
                      <h3><span class="fa fa-book"></span> Books</h3>

                    </div>

                  </div>
                </div>
                </a>

                <a href="{{url('/borrows')}}">
                <div class="col-sm-6">
                  <div class="panel link-panel">
                    <div class="panel-heading">
                      <h3><span class="fa fa-users"></span> Borrowers</h3>

                    </div>

                  </div>
                </div>
                </a>

                <a href="{{url('/borrows')}}">
                <div class="col-sm-6">
                  <div class="panel link-panel">
                    <div class="panel-heading">
                      <h3><span class="fa fa-share"></span> Lend A Book</h3>

                    </div>

                  </div>
                </div>
                </a>

                <a href="{{url('/settings')}}">
                <div class="col-sm-6">
                  <div class="panel link-panel">
                    <div class="panel-heading">
                      <h3><span class="fa fa-cog"></span> Settings</h3>

                    </div>

                  </div>
                </div>
                </a>

                <a href="{{url('/contact_us')}}">
                <div class="col-sm-6">
                  <div class="pane link-panel">
                    <div class="panel-heading">
                      <h3><span class="fa fa-phone"></span> Report a problem</h3>

                    </div>

                  </div>
                </div>
                </a>

              </div>
        </div>
    </div>
</div>

<style>
.link-panel{
  box-shadow: 10px 10px 10px #ccc;
  border:1px #ccc solid;
}

.link-panel:hover{
  padding-left:20px;
}
</style>
@endsection
