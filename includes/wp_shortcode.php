<?php

function shortcode_documentos($atts)
{
  $atts = shortcode_atts(
    array(
      'post_id' => get_the_ID(),
    ),
    $atts,
    'listar_documentos'
  );

  // Obtener la lista de documentos asociados al post
  $lista_documentos = get_field('lista_documentos', $atts['post_id']);

  ob_start();

  if ($lista_documentos) {
    echo '<ul class="grupo-documento">';
    foreach ($lista_documentos as $documento) {
      $titulo_documento = $documento['titulo_documento'];
      $tipo_documento = $documento['enlace_o_carga'];
      $enlace_documento = $documento['enlace_documento'];
      $archivo_pdf = $documento['documento_pdf'];

      echo '<li>';

      if ($tipo_documento === 'enlace') {
        // Mostrar enlace
        echo '<a class="tipo-documento tipo-enlace" href="' . esc_url($enlace_documento) . '" target="_blank"><i aria-hidden="true" class="icon icon-link"></i> ' . esc_html($titulo_documento) . '</a>';
      } elseif ($tipo_documento === 'cargar_archivo' && $archivo_pdf) {
        // Mostrar enlace al archivo cargado
        $url = $archivo_pdf['url'];
        echo '<a class="tipo-documento tipo-url" href="' . esc_url($url) . '" target="_blank"><i aria-hidden="true" class="icon icon-document"></i> ' . esc_html($titulo_documento) . ' <i aria-hidden="true" class="icon icon-download"></i></a>';
      }

      echo '</li>';
    }
    echo '</ul>';
  } else {
    echo 'No hay documentos asociados.';
  }

  return ob_get_clean();
}
add_shortcode('listar_documentos', 'shortcode_documentos');
