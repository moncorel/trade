<div class="modal fade"
     id="deleteUserModal"
     tabindex="-1"
     role="dialog"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">User deleting</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <span class="font-weight-bold text-danger">
                        Are you sure you want to delete user?
                    </span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <form
                    action="{{ route('admin.users.id.delete', ['id' => $id]) }}"
                    method="POST"
                >
                    @method('DELETE')
                    @csrf
                    <input type="submit" class="btn btn-danger" value="Delete">
                </form>
            </div>
        </div>
    </div>
</div>
