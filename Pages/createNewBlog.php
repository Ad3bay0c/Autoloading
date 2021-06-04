<?php
session_start();
require '../vendor/autoload.php';


$report = $_SESSION['report'] ?? $report;
$color = isset($count) ? 'danger': 'success';

$detail = isset($_GET['id']) ? \App\Library\Blog::getDetails($_GET['id']) : '';
$title = isset($_GET['id']) ? 'Edit Blog '. $detail->title : 'Create New Blog';
$buttonValue = isset($_GET['id']) ? 'Update '. $detail->title : 'Create';
$buttonName = isset($_GET['id']) ? 'UpdateBlog' : 'CreateNewBlog';
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <link rel="canonical" href="https://getbootstrap.com/docs/3.3/examples/jumbotron/">

    <title>Blog</title>

    <!-- Bootstrap core CSS -->
    <<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <![endif]-->
</head>

<body>
<?php include_once 'include/nav.php'?>

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
        <h1 class="text-center"><?= $title ?></h1>
    </div>
    <div class="float-right text-center">
        <a href="index.php" class="btn btn-primary">Back</a>
    </div>
</div>


    <?php if(isset($report)){
    ?>
        <div class="alert alert-<?= $color ?> alert-dismissible" style="position:fixed; top:10px;
        right:10px; z-index:100000"">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
                <?php echo $report; ?>
                <?php unset($_SESSION['report']); ?>
        </div>
    <?php } ?>

<div class="container">
    <!-- Example row of columns -->

    <div class="row">
        <div class="col-md-6 col-lg-6">
            <form method="POST">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title"
                           value="<?= $detail->title ?? '' ?>" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" class="form-control" cols="10" rows="5"
                              required><?= $detail->description ?? '' ?></textarea>
                </div>
                <br>
                <button type="submit" class="btn btn-primary" name="<?=
                $buttonName
                ?>" value="<?= $detail->id ?? '' ?>"><?= $buttonValue ?></button>
            </form>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Created_at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $sn = 0;
                    foreach (\App\Library\Blog::getAll() as $blog): $sn = $sn + 1; ?>
                        <tr>
                            <td><?= $sn ?></td>
                            <td><?= $blog->title ?></td>
                            <td><?= substr($blog->description, 0,55) ?>....</td>
                            <td><?= date('jS F, Y h:i A', strtotime($blog->created_at)) ?></td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="?id=<?= md5($blog->id) ?>"
                                   role="button">Edit </a>
                                <form method="POST">
                                    <button class="btn btn-danger btn-sm"
                                            role="button" type="submit"
                                            name="deleteBlog" id="deleteButton"
                                            value="<?= $blog->id ?>">Delete</button>
                                </form>

                            </td>
                        </tr>
                    <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <hr>

    <footer>
        <p>&copy; <?php echo date('Y') ?> </p>
    </footer>
</div> <!-- /container -->


<!-- Modal -->
<div id="exampleModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h3>Add New Sickness</h3>

                <form action="" method="post">

                </form>


                <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>

                </div>
            </div>
        </div>
    </div>

</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script type="text/javascript">
    $(function () {
        alert(123);
        $('body').on('click', '#deleteButton', function (e) {
            e.preventDefault();
            if(confirm('Are you sure You want to delete?') {} else {
                e.preventDefault();
            }
        })
    })
</script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="../../dist/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>


</body>
</html>



