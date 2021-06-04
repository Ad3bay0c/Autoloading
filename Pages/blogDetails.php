<?php
session_start();
require '../vendor/autoload.php';

//$report = $_SESSION['report'] ?? $report;
//$color = isset($count) ? 'danger': 'success';

if(isset($_GET['id'])) {

} else {
    header('Location:index.php');
}
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
        <h1 class="text-center">Welcome to BlueBlog</h1>
    </div>
    <div class="float-right text-center">
        <a href="index.php" class="btn btn-primary">Back</a>
    </div>
</div>



<div class="container">

    <?php if(isset($_GET['id'])){
        $blog =  \App\Library\Blog::getDetails($_GET['id']);
    ?>
    <div class="row">
        <div class="col-md-6 float-left">
            <h2><?= $blog->title ?></h2>
            <p><?= $blog->description ?>....</p>
            <div class="float-right">
                <!---->
                <!--            <a class="btn btn-primary btn-sm" href="#" role="button">Edit </a>-->
                <!--            <a class="btn btn-danger btn-sm" href="#" role="button">Delete</a>-->
            </div>
        </div>
    </div>
    <?php } ?>
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
        $('#example1').on('click', function (e) {
            e.preventDefault();
            $('#exampleModal').modal('show');
        })

    })
</script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="../../dist/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>


</body>
</html>



