<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    
</head>
<body><link rel="stylesheet" href="../css/style.css">
    
    <h2>LOG IN</h2>
    <div class="login-top">
        <h1>User Login</h1>
        <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
        
        
        <form action="../chucnang/demo.php" method="POST">
        <input type="text" name="name">
        
        <input type="password"  name="password" >
        <label class="checkbox">
            <input type="checkbox" name="checkbox" checked="">
            
            Remember Me
        </label>
        <p>
            <a href="#"> Forgot Password? </a>
        </p>
        <div class="clear"> </div>
        <div class="log-bwn">
            <input type='submit' name="dangnhap" value='Sign in' class="login" />
            <!-- <a href="../chucnang/dangnhap.php" type="submit" name="dangnhap">Sign in</a> -->
        </div>
        <h4>
            Don’t have an account?  
            <a href="../../register/register.html"> Register now </a> 
        </h4>
    </form>
    </div>
</body>
</html>