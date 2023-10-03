
<?php include 'inc/header.php'; ?>
<?php
$name=$email=$message='';
$nameErr=$emailErr=$messageErr='';
if(isset($_POST['submit'])){
    // validate name
    if(empty($_POST['name'])){
        $nameErr="Name is required";
    }
    else{
        $name=filter_input(INPUT_POST,'name',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }
    // validate email
    if(empty($_POST['email'])){
        $emailErr="Email is required";
    }
    else{
        $email=filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
    }
    // validate feedback
    if(empty($_POST['message'])){
        $messageErr="Feedback is required";
    }
    else{
        $message=filter_input(INPUT_POST,'message',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }
    if(empty($nameErr) && empty($emailErr) && empty($messageErr)){
        $sql="INSERT INTO Feedback(name,email,message) VALUES 
        ('$name', '$email', '$message')";
        if(mysqli_query($conn,$sql)){
            header('Location: feedback.php');
        }
        else{
            echo "Error:" . mysqli_error($conn);
        }

    }
}

?>

   <h2 class="text-center">Feedback</h2>
   <p class="lead text-center">Leave your feedback for Beabrand</p>
   <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="mt-4 w-75" method="POST">
    <div class="mb-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" id="name" name="name" placeholder=" Enter Your Name" class="form-control <?php echo $nameErr ? 'is-invalid':null; ?> ">
        <div class="invalid-feedback">
            <?php echo $nameErr;?>
        </div>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" id="email" name="email" placeholder=" Enter Your Email" class="form-control
        <?php echo $emailErr ? "is-invalid":null; ?>" >
        <div class="invalid-feedback">
            <?php echo $emailErr;?>
        </div>
    </div>
    <div class="mb-3">
        <label for="message" class="form-label">Feedback:</label>
        <textarea  id="message" name="message" placeholder=" Enter Your Feedback" class="form-control <?php echo $messageErr ? "is-invalid":null; ?> "></textarea>
        <div class="invalid-feedback">
            <?php echo $messageErr;?>
        </div>
    </div>
    <div class="mb-3">
        
        <input type="submit"  name="submit" value="Send" class="btn btn-outline-dark w-100">
    </div>
   </form>
   <?php include 'inc/footer.php'; ?>