@extends('layouts.app')

@section('title','Settings')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-3 settings-left">
      <h5 class="settings-left-element">General Settings</h5>
      <h5 class="settings-left-element">Admin Account Settings</h5>
    </div>
    <div class="col-sm-8" id="general_settings">

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
<script>
$.get()
  $('#general_settings')
</script>
@endsection
