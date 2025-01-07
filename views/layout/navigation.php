<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">SIMAFAS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/webfas/views/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/webfas/views/users">Users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/webfas/views/categories">Categories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/webfas/views/facilities">Facilities</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/webfas/views/customers">Customers</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Transaction
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/webfas/views/bookings">Booking</a></li>
            <li><a class="dropdown-item" href="/webfas/views/reports/booking-by-facility.php">Laporan</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      <div class="d-flex ms-3" >
        <a class="btn btn-outline-danger" 
        href="http://localhost:8080/webfas/api/auth/logout.php">Log Out</a>
      </div>
    </div>
  </div>
</nav>