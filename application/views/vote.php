<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block sidebar">
      <div class="sidebar-sticky bg-light">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="#">President</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Vice President</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Academic Rep</a>
          </li>
        </ul>
      </div>
    </nav>
    <main id=root1 class="col-lg-10 ml-sm-auto"></main>
  </div>
</div>
<input id="stNo" type="hidden" value="<?php echo $_SESSION['studentNumber'] ?>">
<script>const studentNumber = document.getElementById("stNo").getAttribute("value") </script>
<script src="<?php echo resource_url("dependencies/jquery-3.3.1.js") ?>"></script>
<script src="<?php echo resource_url("dependencies/popper.min.js") ?>"></script>
<script src="<?php echo resource_url("dependencies/bootstrap.min.js") ?>"></script>
<script src="<?php echo resource_url("dependencies/dist/bundle.js") ?>"></script>
</body>
</html>