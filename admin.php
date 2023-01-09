<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		body{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: 'Times New Roman', Times, serif;
}
.heading{
    padding: 20px 50px;
    /* position: fixed;
    top:0; left: 0; right:0; */
    display: flex;
    align-items: center;
    font-size: 22px;
    justify-content: space-between;
    background: #0c2461;
    color: #fff;
    box-shadow: 5px 0 5px #192a56;
    /* z-index: 1000; */
    overflow: hidden;
}
nav{

}
#nav-bar{
    display: none;
}
nav ul{
    list-style: none;
    display: flex;
    /* align-items: center; */
    /* justify-content: space-between;  */
}
nav ul li{
    margin-left: 30px;
}
nav ul li a{
    color:#fff ;
    text-decoration: none;
}
	</style>
</head>
<body>
<header class="heading">
    <span id="logo">logo</span>
    <span id="nav-bar">nav bar</span>
    <nav>
        <ul>
            <li><a href="about">about</a></li>
            <li><a href="login-in.php">login</a></li>
            <li><a href="register.php">register</a></li>
            <li><a href="logout.php">logout</a></li>
        </ul>
    </nav>    
</header>
</body>
</html>