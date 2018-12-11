<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
<body>



<div class="dropdown">
  <button onclick="myFunction()" class="dropbtn">Genres</button>
  <div id="myDropdown" class="dropdown-content">
    <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
    <a href="genres/rock.php">Rock</a>
    <a href="genres/pop.php">Pop</a>
    <a href="genres/country.php">Country</a>
    <a href="genres/classical.php">Classical</a>
    <a href="genres/house.php">House</a>
    <a href="genres/techno.php">Techno</a>
    <a href="genres/hip-hop.php">Hip Hop</a>
  </div>
</div>

<script>
/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

function filterFunction() {
  var input, filter, ul, li, a, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  div = document.getElementById("myDropdown");
  a = div.getElementsByTagName("a");
  for (i = 0; i < a.length; i++) {
    if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
      a[i].style.display = "";
    } else {
      a[i].style.display = "none";
    }
  }
}
</script>

</body>
</html>

