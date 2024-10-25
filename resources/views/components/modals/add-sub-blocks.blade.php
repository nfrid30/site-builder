
<div class="modal fade" id="modal-add-sub-blocks" style="display: none;" aria-hidden="true" >
    <div class="modal-dialog">
        <form action=""
              method="post"
              id="addSubBlockForm"
              class="modal-content">
            @csrf
            <div class="modal-header">
                <h4 class="modal-title">Add Sub-Block</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Add Sub-Block</p>
                <div class="form-group">
                    <label for="">Number</label>
                    <input type="number" value="1" class="form-control" name="number" required>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                <button  class="btn btn-success">Add</button>
            </div>
        </form>
    </div>
</div>
