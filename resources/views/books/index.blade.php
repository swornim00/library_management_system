@extends('layouts.app')

@section('title','Books')

@section('content')

<div class="col-sm-12">
    <div class="panel">
        <div class="panel-heading" style="height:50px;">
            <input class="col-sm-7 col-sm-offset-1" type="textbox" placeholder="Search Books.." id="search"/>
        </div>
    </div>
</div>
<div id="books_container">
    <div class="search_table">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        Book Name
                    </th>
                    <th>
                        Author's Name
                    </th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>

<div class="col-sm-6">
    <div class="panel">
        <div class="panel-heading">
            <h4><span class="fa fa-plus"></span> Add Books</h4>
        </div>
        <div class="panel-body">
            @include('books.add')
        </div>
    </div>
</div>

<div class="col-sm-6">
    <div class="panel">
        <div class="panel-heading">
            <h4><span class="fa fa-plus-circle"></span> Recently Added</h4>
        </div>
        <div class="panel-body">
            @include('books.recent')
        </div>
    </div>
</div>

</div>
<script>
    $('.search_table').hide();

    $('#search').on('keyup',function(data){
        $value = $(this).val();
        if($value == ''){
            $('.search_table').hide();
        }

        $.ajax({
            type:'get',
            url : '{{url("/")}}/search/books/byName',
            data: {'name':$value},
            success: function(data){
                $('.search_table').show();
                $('tbody').html(data);
            }
        });
    });
</script>
@endsection
