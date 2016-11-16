<form action="{{url('/')}}/book/delete/" method="POST">
  <label>Are you Sure you want to delete this? </label>

  <input type="hidden" name="id" value="{{$id}}">
  <button style="display:none" id="delteButton" class='btn btn-danger pull-right'><span class='fa fa-trash'></span> Delete</button></form>

</form>
