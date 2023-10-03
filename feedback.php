<?php include 'inc/header.php'; ?>
<?php 
  $sql='SELECT * FROM Feedback';
  $result=mysqli_query($conn,$sql);
  $Feedback=mysqli_fetch_all($result,MYSQLI_ASSOC);
?>
<h2 class="text-center">
    Past Feedback
</h2>
<?php if(empty($Feedback)):?>
    <div class="lead mt-3">
        There is no feedback yet
    </div>
<?php endif;?>
     <?php foreach($Feedback as $item):?>
           <div class="card my-3 w-75">
               <div class="card-body text-center">
                <?php echo $item['message'];?>
                 <div class="text-secondary mt-2">
                    <?php echo $item['name'] .'  on '. $item['date'];?>

                  </div>
                  </div>
            </div>
        <?php endforeach;?>
<?php include 'inc/footer.php'; ?>