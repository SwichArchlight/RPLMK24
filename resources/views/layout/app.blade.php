<!doctype html>
<html lang="en">
    <head>
        <title>@yield('title')</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&family=Rubik+Glitch+Pop&display=swap" rel="stylesheet">
            <style>
                .title{
                  font-family: "Indie Flower", cursive;
                  font-weight: 400;
                  font-style: normal;
                }
                .poppin{
                    font-family: "Poppins", sans-serif;
                    font-weight: 400;
                    font-style: normal;
                }
            </style>
           @yield('style')
                                       <!-- style -->
    </head>
    <body style="background-color: black">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg fixed-top" style="background-color: #1b1d2a">
                <div class="container-fluid">
                  <a class="navbar-brand text-light mx-5 title" href="#">
                    <b>WeebsGallery</b>
                  </a>
                  <button class="navbar-toggler bg-light rounded-5 border border-flush" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link text-light" href="/">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link text-light" href="{{ route('search') }}">Search</a>
                      </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link text-light dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          <img src="https://i.pinimg.com/564x/84/19/5c/84195ca5b15f06f0e5888856aae1c75c.jpg" alt="Profile Picture" class="img-fluid mx-3" style="border-radius: 50%; max-height: 40px;">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                        </ul>
                      </li>
                    </ul>
                  </div>
                </div>
              </nav>
              
    </div>
<div class="container-fluid pt-5">
    
    
@yield('content')



</div>
    </body>

@yield('script')

             <!-- scripy -->

        
    <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>

</html>
