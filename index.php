<!DOCTYPE html>
<html lang="en">
<head>

    <title>Login to PixelPrint</title>
    <link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
<div class="login-container">
       <form action="login-aksi.php" method='post'>
           <h2>Login to PixelPrint</h2>
           <div>
               <label>Username</label>
               <input type="text" name="username" placeholder="Isi usernamemu di sini.." value="" required>
           </div>
           <div>
               <label>Password</label>
               <input type="password" name="password" placeholder="Isi passwordmu di sini.." value="" required>
           </div>
           <input type="submit" name="login" value="LOGIN">
           <p class="sub">Tidak punya akun? <a href="register.php">Buat akun baru</a></p>
       </form>
   </div>

</body>
</html>