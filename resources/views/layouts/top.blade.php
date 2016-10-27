<div class="top-panel">
    <span class="top-elements">
        <a href="{{url('/')}}">Home</a>
        <a href="{{route('books')}}">Books</a>
        <a href="#">Lend Book</a>
        <a href="#">Borrowers</a>
        <a href="#"><span class="fa fa-cog"></span> Settings</a>
    </span>
</div>


<style>
.top-panel{
    padding:0;
    margin: 0;
    background-color: #ffffff;
    padding:20px;
    border:1px solid #eee;
    border-bottom:1px solid #ddd;
}

.top-elements a{
    padding:20px;
    color:#444;
}

.top-elements a:hover{
    background-color:#eee;
    text-decoration: none;
}
</style>
