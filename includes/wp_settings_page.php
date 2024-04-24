<?php
function registrar_YoutubelW()
{
    // Incluye el archivo donde se define $text_domain

    global $text_domain; // Globaliza la variable $text_domain

    $labels = array(
        'name'               => esc_html__('Videos', $text_domain),
        'singular_name'      => esc_html__('Video', $text_domain),
        'menu_name'          => esc_html__('Videos', $text_domain),
        'add_new'            => esc_html__('Añadir Nuevo', $text_domain),
        'add_new_item'       => esc_html__('Añadir Nuevo Video', $text_domain),
        'edit_item'          => esc_html__('Editar Video', $text_domain),
        'new_item'           => esc_html__('Nuevo Video', $text_domain),
        'view_item'          => esc_html__('Ver Video', $text_domain),
        'search_items'       => esc_html__('Buscar Videos', $text_domain),
        'not_found'          => esc_html__('No se encontraron Videos', $text_domain),
        'not_found_in_trash' => esc_html__('No se encontraron Videos en la papelera', $text_domain),
        'parent_item_colon'  => esc_html__('Video Padre:', $text_domain),
        'all_items'          => esc_html__('Todos los Videos', $text_domain),
        'archives'           => esc_html__('Archivo de Videos', $text_domain),
        'insert_into_item'   => esc_html__('Insertar en el Video', $text_domain),
        'uploaded_to_this_item' => esc_html__('Subido a este Video', $text_domain),
        'filter_items_list'  => esc_html__('Filtrar lista de Videos', $text_domain),
        'items_list_navigation' => esc_html__('Navegación de lista de Videos', $text_domain),
        'items_list'         => esc_html__('Lista de Videos', $text_domain),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'Videos'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'         =>  DSLT_PLUGIN_URL . 'assets/img/icon.png',
        'supports'           => array('title', 'editor', 'thumbnail'),
        'taxonomies'         => array('categoria',), // Asociación con varias taxonomías
    );

    register_post_type('video', $args);
}

add_action('init', 'registrar_YoutubelW');
