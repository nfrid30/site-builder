<x-buttons.delete-modal />
<div class="modal fade" id="modal-delete" style="display: none;" aria-hidden="true" >
    <div class="modal-dialog">
        <form action="{{ route('admin.'. str(class_basename($model))->lower()->plural()->toString() .'.destroy',
[str(class_basename($model))->lower()->toString() => $model]) }}"
              method="post"
              class="modal-content">
            @csrf
            @method('delete')
            <div class="modal-header">
                <h4 class="modal-title">Delete {{ class_basename($model) }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Delete {{ class_basename($model) }}</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button  class="btn btn-danger">Delete</button>
            </div>
        </form>
    </div>
</div>
