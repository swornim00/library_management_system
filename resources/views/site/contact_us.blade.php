@extends('layouts.app')

@section('title','Contact Us')

@section('content')
<div class="page-header">
  <h3><span class="fa fa-phone-square"></span> Contact Us</h3>
</div>

<div class="panel">
  <div class="panel-body">
    <p> If there is any probel with the product, feel free to mail us or call us. Following problem can be solved by us:</p>
      <ul>
          <li><label>Lost Your Email and Password.</label></li>
          <li><label>Product is not working properly.</label></li>
          <li><label>If you lost your product files.</label></li>
          <li><label>Reinstallation of the product.</label></li>
      </ul>
    <div class="alert alert-info"><label>Note: </label> All those repairs and maintainance support will charge everytime we visit and fix it.</div>
    <hr>
    <p>Following problems cannot be fixed by us:</p>
    <ul>
        <li><label>Accidentally earsed all information about books.</label></li>
        <li><label>Unintentionally pressed <span class="label label-danger">Reset All</span> button and lost information.</label></li>
    </ul>
    <div class="alert alert-info"><label>Note:</label> Shortly! We can't recover your data if you lost them. If data lost due to faliure of product, we will be responsible.</div>
    <hr>
    <h3></span> You can use following information to contact us</h3>
    <br>
    <label><span class="fa fa-envelope"></span> Email: </label> srestaswrnm@gmail.com<br>
    <label><span class="fa fa-phone"></span> Phone: </label> +977-9813004402<br>
    <label>Address: </label> Chautara-7, Sindhupalchowk, Nepal <br>
  </div>
    <div class="panel-footer">
      <button class="btn btn-success" onclick="window.open('mailto:srestaswrnm@gmail.com')">Click Here To Mail Us</button>
    </div>
</div>
@endsection
