<div id="myNav" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="overlay-content">
    <a href="./dashboard.php">Dashboard</a>
    <a href="./catalog.php">Catalog Viewer</a>
    <a href="./catalogadd.php">Add to Catalog</a>
    <!--<a href="catalogedit.php">Edit Catalog</a>-->
    <a href="./logout.php">Log Out</a>
  </div>
</div>
<div class="dashboard_float_btn"><span onclick="openNav()">&plus;</span></div>

<script>
  function openNav() { document.getElementById("myNav").style.height = "100%"; }
  function closeNav() { document.getElementById("myNav").style.height = "0%"; }
</script>