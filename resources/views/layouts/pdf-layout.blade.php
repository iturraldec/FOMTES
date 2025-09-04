<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <style>
    body {
      font-family: DejaVu Sans;
      margin: 0; /* Elimina márgenes por defecto */
      padding: 0; /* Elimina relleno por defecto */
      width: 100%; /* Asegura que el body ocupe el 100% de ancho */
      height: 100%; /* Asegura que el body ocupe el 100% de la altura */
    }

    .encabezado {
      text-align: center;
      font-size: 10px;
    }

    .encabezado p {
      margin: 0;
      margin-bottom: 0.5px;
    }

    .tabla {
      width: 100%;
      margin: 0;
      padding: 0;
      border: 1px solid black;
      border-collapse: collapse;
      font-size: 10px;
    }

    .tabla th,
    .tabla td {
      border: 1px solid black;
      padding: 6px;
      }

    .tabla .encabezado {
      text-align: center;
      font-size: 12px;
    }

    .tabla .texto {
      text-align: left;
    }

    .pre-footer {
      text-align: center;
      font-size: 8px;
      margin: 0;
      margin-top: 6rem;
      font-weight: bold;
    }

    .pre-footer p {
      margin: 0;
      margin-bottom: 0.5px;
    }

    footer {
      position: absolute; /* Fijo en la parte inferior */
      bottom: 4px; /* Alineado al fondo */
      left: 0; /* Alineado a la izquierda */
      right: 0; /* Alineado a la derecha */
      text-align: center;
    }

    footer p {
      font-size: 7px; /* Tamaño de fuente (ajusta según sea necesario) */
      font-weight: bold; /* Negrita */
      margin: 0;
      margin-bottom: 1px;
    }
  </style>

  <title>@yield('titulo')</title>
</head>

<body>
  <header>
    <table style="width: 100%">
      <thead>
        <tr>
          <th scope="col"><img src="{{ public_path('images/logo-fomdes.png') }}" width="125" height="auto"></th>
          <th scope="col" class="encabezado">
            <p>REPÚBLICA BOLIVARIANA DE VENEZUELA</p>
            <p>GOBERNACIÓN DEL ESTADO BOLIVARIANO DE MÉRIDA</p>
            <p>FONDO MERIDEÑO PARA EL DESARROLLO ECONÓMICO SUSTENTABLE</p>
            <p>(FOMDES)</p>
          </th>
          <th scope="col"><img src="{{ public_path('images/logo-gobernacion.png') }}" width="75" height="auto"></th>
        </tr>
      </thead>
    </table>
  </header>

  <footer>
    <hr>
    <p>Zona Industrial Los Curos Edificio FOMDES, Mérida-Edo. Mérida</p>
    <p>Teléfonos: (0274) 2716514-2710869-2710049-2713255</p>
    <p>Correo electrónico: fondomerideñopresidencia@gmail.com</p>
    <p>G-200001739-2</p>
  </footer>

  <main>
    @yield('content')
  </main>

</body>
</html>
