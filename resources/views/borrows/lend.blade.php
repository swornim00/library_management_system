<div class="modal-header">
  <span class="close" data-dismiss="modal">&times;</span>
  <h3>Lend A Book</h3>
</div>
<form class="form" action="{{url('/')}}/lend" method="POST">

<div class="modal-body">
  <label>Book's Name:</label>
  <select name="book_id" class="form-control">
    @foreach($books as $book)
      <option value="{{$book->id}}">
        {{$book->name}}
      </option>
    @endforeach
  </select><br />
  <label>Borrower's Name:</label>
  <select name="borrower_id" class="form-control">
    @foreach($borrowers as $borrower)
      <option value="{{$borrower->id}}">
        {{$borrower->name}}
      </option>
    @endforeach
  </select><br />

</div>
<div class="modal-footer">
<input type="hidden" name="_token" value="{{\Session::token()}}" />
<button class="btn btn-success form-control">Lend</button>
</div>
</form>
