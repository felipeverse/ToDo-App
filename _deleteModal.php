<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Deletar Task</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this task?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Cancel
                </button>
                <form action="/tasks/delete.php" class="formDeleteTask" method="POST">
                    <input type="hidden" name="id" id="id" value="">
                    <button class="btn btn-outline-danger mx-1">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    // Delete Modal script
    $(function () {
        $(".deleteButton").click(function () {
            var my_id_value = $(this).data('id');
            console.log(my_id_value);
            $(".formDeleteTask #id").val(my_id_value);
        })
    });
</script>

