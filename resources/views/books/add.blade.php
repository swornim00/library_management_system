<div>
    <form class="form" method="POST" action="{{route('book.add')}}">
        @if(\Session::get('book_add_error'))
            <div class="alert alert-danger">{{\Session::get('book_add_error')}} <span class="close" data-dismiss="alert">&times;</span></div>
        @endif
        <label>Book name:</label>
        <input class="form-control" name="book_name" placeholder="Enter Book's Name"/><br>

        <label>Author's name:</label>
        <input class="form-control" name="author_name" placeholder="Enter Author's Name" /><br>

        <label>Price:</label>
        <input class="form-control" name="book_price" placeholder="Enter Book's Price" /><br>

        <label>Number Of Copies:</label>
        <input class="form-control" name="number_of_copies" placeholder="Enter Book's Price" /><br>

        <input type="hidden" name="_token" value="{{\Session::token()}}" />
        <button type="submit" class="form-control btn btn-success"><span class="fa fa-plus-circle"></span> Add</button>
    </form>
</div>
