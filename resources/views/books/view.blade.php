@extends('layouts.app')

@section('title',$book->name)

@section('content')
<div class="col-sm-6">
<div class="panel">
    <div class="panel-heading">
        <h4><span class="fa fa-info-circle"></span> Book's Information</h4>
    </div>
    <div class="panel-body">
        <label>Book Title: </label> {{$book->name}}<br>
        <label>Author's Name: </label> {{$book->author}}<br>
        <label>Book's Price: </label> Rs. {{$book->price}}<br>
        <label>Number Of Copies: </label> {{$book->number_of_copies}}<br>
        <label>Total Number Of Borrows: </label> {{$book->borrows}}<br>

    </div>
    <div class="panel-body">
        <a href="#" onclick ="showBookInfo({{$book->id}})" class="pull-left"><span class="fa fa-edit"></span> Edit</a>
        <a href="#" onclick ="deleteModal({{$book->id}},'books')" class="pull-right"><span class="fa fa-trash"></span> Delete</a>
    </div>
</div>
</div>

<div class="col-sm-6">
<div class="panel">
    <div class="panel-heading">
        <h4><span class="fa fa-check-circle"></span> Recent Borrows</h4>
    </div>
    <div class="panel-body">
      <table class="table table-hover">
        <tbody>
          <tr>
            <th>Borrower's Name</th>
            <th>Issued Date</th>
            <th>Status</th>
          </tr>
        @foreach($borrows as $borrow_event)
          <tr>
            <td>{{$borrow_event->borrowers['name']}}</td>
            <td>{{substr($borrow_event->created_at,0,10)}}</td>
            <td><div class="label label-danger">{{$borrow_event->status()}}</div></td>
          </tr>
        @endforeach

      </tbody>
      </table>
    </div>
</div>
</div>
<script>
function showBookInfo(id){
    $.get("{{url('/')}}/book/info/"+id,function(data){
        $('.modal-head').html("<h4><span class='fa fa-book'></span> Book's Information</h4>");

        dataHTML = "<form method=\"POST\" action=\"{{route('book.edit')}}\" >";
        dataHTML += "<label> Name: </label> " + "<input type=\"textbox\"  class=\"form-control\" name=\"name\" value=\""+data.name+"\">";
        dataHTML += "<br><label> Author: </label> " + "<input type=\"textbox\"  class=\"form-control\" name=\"author\" value=\""+data.author+"\">";
        dataHTML += "<br><label> Price: </label> " + "<input type=\"textbox\"  class=\"form-control\" name=\"price\" value=\""+data.price+"\">";
        dataHTML += "<br><label> Number of Copies: </label> " + "<input type=\"textbox\"  class=\"form-control\" name=\"number_of_copies\" value=\""+data.number_of_copies+"\">";
        dataHTML += "<br><label> Number of Borrows: </label> " +"<input type=\"textbox\"  class=\"form-control\" readonly value=\""+data.borrows+"\">";
        dataHTML += "<input type='hidden' name='id' value="+id+">" ;
        dataHTML += "<input type='hidden' name='_token' value=\"{{\Session::token()}}\">" ;
        dataHTML += "<input type='submit' id='editButton' style=\"display:none\">" ;
        $('.modal-body').html(dataHTML);
        $('.modal-footer').html("<button onclick=\"editBookInfo()\" class='btn btn-info'><span class='fa fa-edit'></span> Edit</button></form>")
    });
    $('#def-modal').modal("show");
}

function editBookInfo(){
    document.getElementById('editButton').click();
}

</script>
@endsection
