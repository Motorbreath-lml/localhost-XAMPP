<?php
const HOST_NAMES_WINDOWS = "C:\windows\system32\drivers\\etc\hosts";

function extractHostnames($filePath)
{
  $extractedHostnames = [];

  if (($fileHandle = fopen($filePath, 'r')) !== false) {
    while (($line = fgets($fileHandle)) !== false) {
      // Skip lines that don't start with "127.0.0.1"
      if (!preg_match('/^127\.0\.0\.1\s+/', $line)) {
        continue;
      }

      // Extract hostname after "127.0.0.1 "
      preg_match('/127\.0\.0\.1\s+(.*)/', $line, $matches);
      if (isset($matches[1])) {
        $hostname = trim($matches[1]); // Trim whitespace
        $extractedHostnames[] = $hostname;
      }
    }

    fclose($fileHandle);
  } else {
    echo "Error opening file: $filePath";
  }

  return $extractedHostnames;
}
$hostnames = extractHostnames(HOST_NAMES_WINDOWS);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Localhost en XAMPP</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
  <div class="container">
    <h2>Descripción</h2>
    <p>
      Esta es la página principal(<span class="fst-italic">index.php</span>) de la carpeta <span class="fw-bold">htdocs</span> de XAMPP. En esta página podras encontrar los <span class="fst-italic">host names</span> personalizados de Windows, los <span class="fst-italic">virtual host</span> de Apache y los proyectos(<span class="fst-italic">carpetas</span>) de la carpeta <span class="fw-bold">htdocs</span>
    </p>
    <h4></h4>
  </div>
  <div class="container">
    <h3>Host en Windows</h1>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre del Host</th>
            <th scope="col">Acción</th>
          </tr>
        </thead>
        <tbody>
          <?php $contador = 1; ?>
          <?php foreach ($hostnames as $hostname) : ?>
            <tr>
              <th scope="row"><?php echo $contador++;  ?></th>
              <td><?= $hostname ?></td>
              <td>
                <a href="http://<?= $hostname ?>" class="btn btn-primary" role="button" aria-disabled="true" target="_blank" rel="noopener noreferrer">
                  <i class="bi bi-box-arrow-up-right"></i> Ver
                </a>
                <button onclick="copyStringToClipboard('<?= $hostname ?>')" class="btn btn-secondary">
                  <i class="bi bi-copy"></i> Copear Link
                </button>
              </td>

            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
  </div>
  <div class="container">
    <h3>Virtual Host en Apache</h1>
  </div>
  <div class="container">
    <h3>Proyectos en la carpeta de htdocs</h1>
  </div>

  <!-- Modal de copiar enlace del Host Name -->
  <div class="modal fade" id="modalCopiar" tabindex="-1" aria-labelledby="modalCopiarLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body text-center">
          <div id="tituloModalCopiar">
            Enlace copiado al portapapeles
          </div>
          <div class="">
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
              Cerrar
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap 5 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <!-- Script propio -->
  <script src="main.js"></script>
</body>

</html>