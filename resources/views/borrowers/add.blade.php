<div>
    <form class="form" method="POST" action="{{route('borrowers.add')}}">

        <label>Borrower's name:</label>
        <input class="form-control" name="name" placeholder="Enter Borrower's Name"/><br>

        <label>Address:</label>
        <input class="form-control" name="address" placeholder="Borrowers's Address" /><br>

        <label>Contact Number:</label>
        <input class="form-control" name="contact_number" placeholder="Enter Contact Number" /><br>

        <input type="hidden" name="_token" value="{{\Session::token()}}" />
        <button type="submit" class="form-control btn btn-success"><span class="fa fa-plus-circle"></span> Add</button>
    </form>
</div>
