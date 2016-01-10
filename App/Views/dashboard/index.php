<html>
<head>
    <title>Suket - Dashboard</title>
    <?php include __DIR__ . '/../include/css.php'; ?>
</head>
<body>
<?php include __DIR__ . '/../include/navbar.php'; ?>

<div class="container">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Welcome, <?php echo $user->fullname; ?>!</h3>
            </div>
            <div class="panel-body">
                This is Dashboard.
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../include/js.php'; ?>
</body>
</html>