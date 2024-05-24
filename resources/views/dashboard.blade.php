<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Navigation Side Bar with Footer</title>
    <link rel="stylesheet" href="{{ asset('dashboard_assets/css/main.css') }}">
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <nav class="sidebar">
      <ul>
        <li>
          <a href="" class="logo">
            <img src="img/1.jpeg" alt="" />
            <span class="nav-item">IOTROVE</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i data-feather="home" class="icon"></i>
            <span class="nav-item">Home</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i data-feather="user" class="icon"></i>
            <span class="nav-item">Profile</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i data-feather="book" class="icon"></i>
            <span class="nav-item">About</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i data-feather="clipboard" class="icon"></i>
            <span class="nav-item">Projects</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i data-feather="mail" class="icon"></i>
            <span class="nav-item">Contact</span>
          </a>
        </li>
        <li>
          <a href="#" class="logout">
            <i data-feather="log-out" class="icon"></i>
            <span class="nav-item">Log out</span>
          </a>
        </li>
      </ul>
    </nav>

    <div class="sidebar-content">
        <p>lorem ipsum dolor sit amet consectetur adipisicing elit.
        </p>
    </div>
    <script>
      feather.replace();
    </script>
  </body>
</html>
