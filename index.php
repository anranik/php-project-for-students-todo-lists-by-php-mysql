<?php
include 'config.php';

if(isset($_POST['btn-save'])){
    $taskTitle = $_POST['task_title'];
    $toDo->setTitle($taskTitle);

    if($toDo->add())
    {
        header("Location: index.php?inserted");
    }
    else
    {
        header("Location: index.php?failure");
    }
}
if(isset($_POST['btn-complete'])){
    $taskId = $_POST['btn-complete'];
    $toDo->setId($taskId);
    if($toDo->complete())
    {
        header("Location: index.php?completed");
    }
    else
    {
        header("Location: index.php?notcompleted");
    }
}
if(isset($_POST['btn-delete'])){
    $taskId = $_POST['btn-delete'];
    $toDo->setId($taskId);
    if($toDo->remove())
    {
        header("Location: index.php?completed");
    }
    else
    {
        header("Location: index.php?notcompleted");
    }
}
if(isset($_POST['btn-edit']))
{
    $taskId = $_POST['btn-edit'];

    header("Location: edit.php?edit_id=$taskId");
}

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Todo project for student</title>
    <link href="main.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="css/bootstrap.min.css">

</head>

<body>


<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12 pt-5 text-center">
                <div id="row">
                    <div class="col-md-6 pb-5 offset-md-3">
                        <form method="post">
                            <h3>Add New Task</h3>
                            <input type='text' name='task_title' class='form-control' required>
                            <button  type="submit" class="btn btn-secondary mt-2" name="btn-save">
                                Add New Task
                            </button>
                        </form>
                    </div>

                </div>
                <ul class="row">
                    <?php
                    $toDo->all();
                    ?>
                </ul>
            </div>
            <!-- /.col-md-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</div>
<!-- /.wrapper -->







