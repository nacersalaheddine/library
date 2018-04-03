<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    require_once("./inc/head.php");
    require_once("./inc/database.php");
    require_once("./inc/functions.php");
    require_once("./inc/livre.php");

    $livre = new Livre();
    $livres = $livre::find_by_range(10,10);
    ?>
</head>
<style>
.loader {
    border: 16px solid #f3f3f3; /* Light grey */
    border-top: 12px solid #3498db; /* Blue */
    border-bottom: 12px solid #3498db;
    border-radius: 50%;
    margin:auto;
    width: 80px;
    height: 80px;
    animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
<body>

    <div class="topnav" id="menu">
        <a href="#" class="icon">&#9776;</a>
        <a href="./" ><i class="fa fa-home"></i>&nbsp;&nbsp;Home</a>
        <a href="./books.php" class="active"><i class="fa fa-book"></i>&nbsp;&nbsp;Books</a>
        <a href="./user"><i class="fa fa-arrow-right"></i>&nbsp;&nbsp;logIn</a>
        <a href="./help.php"><i class="fa fa-question"></i>&nbsp;&nbsp;Help</a>
        <a href="./about.php"><i class="fa fa-align-center"></i>&nbsp;&nbsp;about</a>
        <a href="./" id="logo">LOGO</a>
    </div>


   <header style="padding:30px;">
   <form class="navbar-form navbar-left" method="POST">


    <div class="input-group">

      <input type="text" class="form-control" placeholder="Search">
      <div class="input-group-btn">
        <button class="btn btn-default" id="search" type="button">
          <i class="glyphicon glyphicon-search">serach</i>
        </button>
       <!--  <img src="./res/spin.gif" style="margin-left:10px;width:20px;height:20px;"> -->


      </div>
    </div>


  </form>

   </header>
   <section  style="padding-bottom:20px; ">
     <h1>Welcome to The Library</h1>

    <div class="card-container" id="books-container">

    </div>
    <div id="l-oader" ></div>
    <button class="load-btn" type="submit" name="load_more_books">load more</button>


   </section>
    <?php
        include "./inc/footer.php";
    ?>
    <script>
    $(document).ready(function(){


    });

    </script>
</body>
</html>
