@extends('layouts.app')

@section('title','Settings')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-3 settings-left">
      <h5 class="settings-left-element"><a href="#general_settings">General Settings</a></h5>
      <h5 class="settings-left-element"><a href="#system_settings">System Settings</a></h5>
    </div>
    <div class="col-sm-8" id="general_settings">
      <div class="panel">
        <div class="panel-heading">
          <h3>General Settings</h3>
        </div>
        <form class="form" action="{{route('settings.update')}}" method="POST">
          <div class="panel-body">
            <label>Library name:</label><br>
            <input class="form-control" name="name" value="{{$site->name}}" placeholder="Enter Library's name"><br>
            <label>Address:</label><br>
            <input class="form-control" name="address" value="{{$site->address}}" placeholder="Enter Library's address"><br>
            <label>Issue Interval:</label><br>
            <input class="form-control" name="issue_interval" value="{{$site->issue_interval}}" placeholder="Enter Issue Interval"><br>
            <label>Admin's Email:</label><br>
            <input class="form-control" name="admin_email" value="{{$site->admin_email}}" placeholder="Enter Admin's email"><br>
          </div>
          <div class="panel-footer">
            <input type="hidden" name="_token" value="{{\Session::token()}}">
            <button class="form-control btn btn-primary"><span class="fa fa-upload"></span> Update</button>
          </div>
        </form>
      </div>

      <div class="panel" id="system_settings">
          <div class="panel-heading">
              <h3>System Settings</h3>
          </div>
          <div class="panel-body">
            <form class="form" action="{{url('/reset_all')}}" method="post">
            <h4> Reset Everything?</h3>
            Would you like to reset everything and clear all the data about books and borrowers?<br>
            <br>
            (For Confirmation) <label>Enter admin password: </label>
            <input type="hidden" name="_token" value="{{\Session::token()}}">
            <input class="form-control" type="password" name="password" placeholder="Enter Password ">
            <br><button class="btn btn-danger pull-right">Reset All</button>
          </form>
          </div>
          <div class="panel-footer">
            <div class="alert alert-warning"><label>Note: </label> Those deleted data cannot be regained by system maintainance team. Be sure before resetting everything.</div>
          </div>
      </div>
    </div>
  </div>
</div>

<style>
.settings-left{
  background-color: white;
}

.settings-left-element{
  padding:10px;
  cursor:pointer;
}

.settings-left-element:hover{
  background-color: #eee;
}
</style>
@endsection
