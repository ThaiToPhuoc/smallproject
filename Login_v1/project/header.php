<link rel="stylesheet" href="../css/header.css">

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<div id="header">
      <header class="text-center m-3">
          <h2 >Personal projects</h2>
          <h6>Tô Phước Thái - 59136167</h6>
      </header>
<nav class="navbar navbar-expand-md bg-dark navbar-dark" id="nav-bar">
  <!-- Brand -->
  <a class="navbar-brand" href="#"> <img src="../images/okami.jpg" alt="" class="logo"></a>
  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
 
  <!-- Navbar links -->
  <div class="collapse navbar-collapse  justify-content-end" id="collapsibleNavbar">
    <ul class="navbar-nav ">
      <li class="nav-item ">
        <a class="nav-link" href="../User.html">Home</a>
      </li>
    
      <li class="nav-item">
        <a class="nav-link" href="../admin.html">About</a>
      </li>
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown">
          Projects
      </a>
      <div class="dropdown-menu bg-dark ">
        <a class="dropdown-item text-left" href="PHP_basic.php">Basic</a>
        <a class="dropdown-item text-left" href="mysql.php">mysql</a>
        <a class="dropdown-item text-left" href="oop.php">OOP</a>
      </div>
    </li>
      <li class="nav-item">
        <a class="nav-link" href="../index.html">Logout <span class="fa fa-sign-out"></span></a>
      </li>
    </ul>
  </div>
</nav>
  </div>

<script>
// When the user scrolls down 80px from the top of the document, resize the navbar's padding and the logo's font size
window.onscroll = function() {myFunction()};

var navbar = document.getElementById("nav-bar");

var sticky = navbar.offsetTop;
var scrolltop = document.scrollTop
function myFunction() {
    if (window.pageYOffset >= sticky) {
        navbar.classList.add("sticky");
    } else {
        navbar.classList.remove("sticky");
    }
}


</script>