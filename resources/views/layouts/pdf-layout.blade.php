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

    .numero {
      margin: 0;
      font-size: 14px;
      font-weight: bold;
      font-style: italic;
    }

    .fecha {
      margin: 0;
      font-size: 12px;
      font-weight: bold;
      font-style: italic;
      text-align: right;
    }

    .recibe {
      margin: 0;
      font-size: 12px;
      text-align: left;
      font-weight: bold;
    }

    .motivo {
      margin: 0;
      margin-top: 10px;
      font-size: 12px;
      text-align: justify;
    }

    .envia {
      text-align: center;
      margin: 0;
      margin-top: 6rem;
      font-size: 12px;
      font-weight: bold;
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
          <th scope="col"><img src="{{ Storage::disk('public')->get('images/logo-gobernacion.png') }}" width="75" height="auto"></th>
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


  <div class="pre-footer">
    <section class="envia">{{ config('fomtes.directores.informatica.nombre') }}</section>
    <p>Director de Tecnologías de la Información</p>
    <p>{{ config('fomtes.directores.informatica.documento') }}</p>
  </div>
</body>
</html>
