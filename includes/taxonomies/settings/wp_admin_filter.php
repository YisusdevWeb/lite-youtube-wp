<?php
/*----------- categoria -----------*/
function custom_filter_by_categoria() {

    global $typenow;
    if ($typenow == 'YoutubeLW') {
        $taxonomy = 'categoria';
        $selected = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
        
        // Obtiene los términos de la taxonomía
        $terms = get_terms([
            'taxonomy' => $taxonomy,
            'hide_empty' => true, // Esta opción excluye los términos que no tienen entradas asociadas
        ]);

        // Verifica si hay términos en la taxonomía
        if (!empty($terms)) {
            $args = array(
                'show_option_all' => __("Mostrar todas las categorías ", YLW_NS),
                'taxonomy' => $taxonomy,
                'name' => $taxonomy,
                'orderby' => 'name',
                'selected' => $selected,
                'show_count' => true,
                'hide_empty' => true,
                'value_field' => 'slug',
            );
            wp_dropdown_categories($args);
        }
    }
}