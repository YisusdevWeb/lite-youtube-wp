<?php

// Función para agregar metabox con el shortcode en la pantalla de edición de cada entrada del Custom Post Type 'documento'
function agregar_metabox_shortcode_documentos() {
    add_meta_box(
        'metabox_shortcode_documentos', // ID único de la metabox
        'Copiar Shortcode', // Título de la metabox
        'contenido_metabox_shortcode_documentos', // Función que renderiza el contenido de la metabox
        'documento', // Nombre del Custom Post Type
        'side', // Contexto de la metabox (puede ser 'normal', 'side' o 'advanced')
        'high' // Prioridad de la metabox (puede ser 'high', 'core' o 'default')
    );
}
add_action('add_meta_boxes', 'agregar_metabox_shortcode_documentos');

// Función para renderizar el contenido de la metabox
function contenido_metabox_shortcode_documentos($post) {
    // Generar el shortcode con el ID de la entrada actual
    $shortcode_output = '[listar_documentos post_id=' . $post->ID . ']';
    
    // Mostrar el shortcode y un campo de entrada para que los usuarios puedan copiarlo
    echo '<p>Copia este shortcode para usarlo más tarde:</p>';
    echo '<input type="text" value="' . esc_attr($shortcode_output) . '" readonly style="width:100%; box-sizing:border-box;">';
}

// Función para agregar una columna personalizada a la tabla de lista de entradas del Custom Post Type 'documento'
function agregar_columna_shortcode_documentos($columns) {
    $columns['shortcode'] = 'Shortcode'; // Nombre de la columna
    return $columns;
}
add_filter('manage_documento_posts_columns', 'agregar_columna_shortcode_documentos');

// Función para mostrar el contenido de la columna personalizada en la tabla de lista de entradas del Custom Post Type 'documento'
function mostrar_contenido_columna_shortcode_documentos($column_name, $post_id) {
    if ($column_name === 'shortcode') {
        // Generar el shortcode con el ID de la entrada actual
        $shortcode_output = '[listar_documentos post_id=' . $post_id . ']';
        
        // Mostrar el shortcode
        echo $shortcode_output;
    }
}
add_action('manage_documento_posts_custom_column', 'mostrar_contenido_columna_shortcode_documentos', 10, 2);