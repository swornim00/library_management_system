<table class ="table table-hover">
    <tbody>
        <tr>
            <th>Name</th>
            <th>Contact No.</th>
            <th>Fine</th>
        </tr>

        @foreach ($borrowers as $borrower)
        <tr>
          <td><a href="{{url('/')}}/borrower/{{$borrower->id}}">{{$borrower->name}}</a></td>
            <td>{{$borrower->contact_number}}</td>
            <td>{{$borrower->fine}}</td>

        </tr>
        @endforeach
    </tbody>
</table>
{{$borrowers->links()}}
