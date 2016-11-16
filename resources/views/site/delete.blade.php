<div class="modal-header">
  <span class="close" data-dismiss="modal">&times;</span>
  <h4><span class="fa fa-edit"></span> Delete</h4>
</div>
<div class="modal-body">
  <h4>Are you sure you want to delete?</h4>
  </div>
  <div class="modal-footer">
    <button class="btn btn-warning pull-left" onclick="closeModal()">Cancel</button>
    <form action="{{route('delete')}}" method="POST">
      <button class="btn btn-danger pull-right" onclick="submit">Delete</button>
      <input type="hidden" name="_token" value="{{\Session::token()}}">
    </div>
  </form>
  
