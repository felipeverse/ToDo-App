<?php
require __DIR__ . '/tasks/tasks.php';

$tasks = getTasks();

if ($_GET['errors']) {
    $errors = json_decode($_GET['errors'], true);
}

?>

<?php include __DIR__ . '/partials/header.php' ?>

    <div class="container justify-contents-center">

        <div class="my-3 mx-2">
            <?php if($errors['text']): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo $errors['text']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <form class="d-flex" action="/tasks/new.php" method="POST">
                <input class="form-control me-2" type="text" name="text" placeholder="Enter your ToDo" required>
                <button class="btn btn-primary" type="submit" >
                    <i class="bi bi-plus-lg"></i>
                </button>
            </form>
        </div>

        <?php foreach ($tasks as $id => $task): ?>
            <div class="card my-2 mx-2">
                <div class="card-body d-flex flex-row align-items-center">
                    <form class="form-check" action="/tasks/change_status.php" method="POST" style="display: inline-block">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <input class="form-check-input" style="border-radius: 50%;" type="checkbox" name="" id="" name="todo_check" <?php echo $task['completed'] ? 'checked':'' ?> >
                    </form>
                    <span class="card-text flex-grow-1 mx-2"><?php echo $task['text'] ?></span>
                    <div class="">
                        <a class="text-success ms-3" href="#"><i class="bi bi-pencil-fill"></i></a>

                        <!-- Button trigger delete modal -->
                        <a class="text-danger ms-3 deleteButton" data-toggle="modal" data-target="#deleteModal" data-id="<?php echo $id?>" href="#"><i class="bi bi-trash2-fill"></i></a>
                    
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
            
    <!-- Scripts -->
    <script type="text/javascript">
        // check tasks actions
        const checkBoxes = document.querySelectorAll('input[type=checkbox]');
        checkBoxes.forEach(ch => {
            ch.onclick = function () {
                this.parentNode.submit();
            };
        });

        // delete tasks actions
        // const trashActions = document.querySelectorAll('a.deleteButtom');
        // trashActions.forEach(ta => {
        //     ta.onclick = function () {
        //         this.parentNode.submit();
        //     }
        // });

    </script>
        

<?php include __DIR__ . '/partials/footer.php' ?>
<?php include __DIR__ . "/_deleteModal.php" ?>
    