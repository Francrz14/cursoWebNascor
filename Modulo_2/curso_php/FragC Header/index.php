<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Header fragmento</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .container {
      width: 80%;
      margin: 0 auto;
      padding: 20px 0;
      display: flex;
      align-items: end;
    }

    .navegador {
      margin-left: 500px;
    }
    header {
      background-color: #333;
      color: #fff;
      padding: 10px 0;
    }

    header h1 {
      margin-left: 50px;
    }

    nav ul {
      display: flex;
      list-style-type: none;
      margin: 0;
      padding: 0;
    }

    nav ul li {
      display: flex;
      justify-content:space-between;
      align-items: center;
      margin-right: 20px;
    }

    nav ul li a {
      color: #fff;
      text-decoration: none;
      padding: 5px 10px;
      border-radius: 5px;
      font-size: 20px;
    }

    nav ul li a:hover {
      background-color: #555;
    }

    header img {
      width: 100px;
      margin-left: 10px; 
    }
  </style>
</head>
<body>
  <header>
    <div class="container">
      <img src="https://i.pinimg.com/originals/fa/d2/a0/fad2a05d17d6fde9c320d3f3d202d2fb.png" alt="Logo de mi sitio web">
      <h1>Mi Sitio Web</h1>
      <nav class="navegador">
        <ul>
          <li><a href="#">Inicio</a></li>
          <li><a href="#">Acerca de</a></li>
          <li><a href="#">Servicios</a></li>
          <li><a href="#">Contacto</a></li>
        </ul>
      </nav>
    </div>
  </header>
</body>
</html>