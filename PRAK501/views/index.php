<!DOCTYPE html> 
<html lang="id"> 
<head>     
    <meta charset="UTF-8">     
    <title>Perpustakaan Egg</title>     
    <style>         
        body { 
            font-family: Arial, sans-serif; 
            text-align: center; 
            padding: 50px; 
            
            background-image: url('../assets/img/library.webp'); 
            background-size: cover;          
            background-position: center;     
            background-repeat: no-repeat;    
            background-attachment: fixed;    
        }         
        .container { 
            background: rgba(255, 255, 255, 0.95); 
            padding: 40px; 
            display: inline-block; 
            border-radius: 10px; 
            box-shadow: 0px 0px 15px rgba(0,0,0,0.2); 
            margin-top: 50px;
        }         
        .btn { display: block; width: 200px; margin: 10px auto; padding: 12px; background: #111; color: white; text-decoration: none; border-radius: 5px; font-weight: bold; }         
        .btn:hover { background: #333; }     
    </style> 
</head> 
<body>     
    <div class="container">         
        <h2>Perpustakaan Egg</h2>  
        <a href="member/member.php" class="btn">Member</a>         
        <a href="buku/buku.php" class="btn">Buku</a>         
        <a href="peminjaman/peminjaman.php" class="btn">Peminjaman</a>     
    </div> 
</body> 
</html>