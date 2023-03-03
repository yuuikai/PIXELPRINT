<!DOCTYPE html>
<html lang="en">
<head>

    <title>Registration Form</title>
    <link rel="stylesheet" type="text/css" href="css/index-regis.css">
</head>
<body>
<div class="login-container">
       <form action="regis-aksi.php" method='post'>
           <h2>Register</h2>
           <div>
               <label>Name</label>
               <input type="text" name="name" placeholder="Isi nama kamu di sini.." value="" required>
           </div>
           <div>
               <label>Username</label>
               <input type="text" name="username" placeholder="Isi usernamemu di sini.." value="" required>
           </div>
           <div>
               <label>Password</label>
               <input type="password" name="password" placeholder="Isi passwordmu di sini.." value="" required>
           </div>
           <input type="submit" name="register" value="REGISTER">
           <p class="sub">Sudah punya akun? <a href="index.php">Login di sini</a></p>
       </form>
   </div>

</body>
</html>