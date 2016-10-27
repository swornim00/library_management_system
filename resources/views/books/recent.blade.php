<table class ="table table-hover">
    <tbody>
        <tr>
            <th>B. No</th>
            <th>Title</th>
            <th>Author</th>
        </tr>

        @foreach ($books as $b)
        <tr>
            <td>{{$b->id}}</td>
            <td>{{$b->name}}</td>
            <td>{{$b->author}}</td>

        </tr>
        @endforeach
    </tbody>
</table>
{{$books->links()}}
