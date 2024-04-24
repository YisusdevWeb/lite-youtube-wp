<?php

function registrar_taxonomia_categoria_YLW()
{
/**	 * Taxonomy: Categorías .	 */

	$labels = [
		"name" => esc_html__("Categorías ", YLW_NS),
		"singular_name" => esc_html__("Categoría ", YLW_NS),
		"menu_name" => esc_html__("Categorías ", YLW_NS),
		"all_items" => esc_html__("Todas las Categorías ", YLW_NS),
		"edit_item" => esc_html__("Editar Categoría ", YLW_NS),
		"view_item" => esc_html__("Ver Categoría ", YLW_NS),
		"update_item" => esc_html__("Actualizar", YLW_NS),
		"add_new_item" => esc_html__("Agregar nueva categoría ", YLW_NS),
		"new_item_name" => esc_html__("Nombre de la nueva Categoría ", YLW_NS),
		"parent_item" => esc_html__("Categoría padre", YLW_NS),
		"parent_item_colon" => esc_html__("Categoría padre:", YLW_NS),
		"search_items" => esc_html__("Buscar Categorías ", YLW_NS),
		"popular_items" => esc_html__("Categorías populares", YLW_NS),
		"separate_items_with_commas" => esc_html__("Separar Categorías con comas", YLW_NS),
		"add_or_remove_items" => esc_html__("Agregar o quitar Categorías ", YLW_NS),
		"choose_from_most_used" => esc_html__("Elegir de las Categorías más usadas", YLW_NS),
		"not_found" => esc_html__("No se encontraron Categorías ", YLW_NS),
		"no_terms" => esc_html__("No hay Categorías ", YLW_NS),
		"items_list_navigation" => esc_html__("Navegación de lista de Categorías ", YLW_NS),
		"items_list" => esc_html__("Lista de Categorías", YLW_NS),
		"back_to_items" => esc_html__("Volver a las Categorías ", YLW_NS),
		"name_field_description" => esc_html__("El nombre es cómo aparece en tu sitio.", YLW_NS),
		"parent_field_description" => esc_html__("Asigna un término padre para crear una jerarquía. Por ejemplo, el término Jazz sería el padre de Bebop y Big Band.", YLW_NS),
		"slug_field_description" => esc_html__("El slug es la versión del nombre que es amigable para URL. Normalmente está todo en minúsculas y solo contiene letras, números y guiones.", YLW_NS),
		"desc_field_description" => esc_html__("La descripción no es prominente por defecto; sin embargo, algunos temas pueden mostrarla.", YLW_NS),
	];

	$args = [
		"label" => esc_html__("Categorías", YLW_NS),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => ['slug' => 'categoria', 'with_front' => true,  'hierarchical' => true,],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => true,
		"rest_base" => "categoria",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => true,
		"sort" => true,
		"show_in_graphql" => false,
	];
	register_taxonomy("categoria", [""], $args);

	// Agrega el filtro de categoría de solo si la taxonomía existe
	if (taxonomy_exists('categoria')) {
		add_action('restrict_manage_posts', 'custom_filter_by_categoria');
	}
}
add_action('init', 'registrar_taxonomia_categoria_YLW');