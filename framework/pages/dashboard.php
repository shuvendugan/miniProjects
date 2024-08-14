<?php pageAdd('includes/header.php');
pr($userData);
?>
<div class="container">
    <div class='row d-flex justify-content-center'>
        <div class='col-lg-3'></div>
        <div class='col-lg-6'>
            <h2>Welcome <?php echo $name?></h2>
            <a href="logout" class='btn btn-danger'>logout</a>
        </div>
    </div>
</div>
<?php pageAdd('includes/footer.php');?>
