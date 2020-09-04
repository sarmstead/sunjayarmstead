<?php
class Custom_ET_Builder_Module_Filterable_Portfolio extends ET_Builder_Module {
    function init() {
        $this->name = __( 'Filterable Portfolio', 'et_builder' );
        $this->slug = 'et_pb_filterable_portfolio';
 
        $this->whitelisted_fields = array(
            'fullwidth',
            'posts_number',
            'include_categories',
            'show_title',
            'show_categories',
            'show_pagination',
            'background_layout',
            'admin_label',
            'module_id',
            'module_class',
            'hover_icon',
            'zoom_icon_color',
            'hover_overlay_color',
        );
 
        $this->fields_defaults = array(
            'fullwidth'         => array( 'on' ),
            'posts_number'      => array( 10, 'add_default_setting' ),
            'show_title'        => array( 'on' ),
            'show_categories'   => array( 'on' ),
            'show_pagination'   => array( 'on' ),
            'background_layout' => array( 'light' ),
        );
 
        $this->main_css_element = '%%order_class%%.et_pb_filterable_portfolio';
        $this->advanced_options = array(
            'fonts' => array(
                'title'   => array(
                    'label'    => __( 'Title', 'et_builder' ),
                    'css'      => array(
                        'main' => "{$this->main_css_element} h2",
                        'important' => 'all',
                    ),
                ),
                'caption' => array(
                    'label'    => __( 'Meta', 'et_builder' ),
                    'css'      => array(
                        'main' => "{$this->main_css_element} .post-meta, {$this->main_css_element} .post-meta a",
                    ),
                ),
                'filter' => array(
                    'label'    => __( 'Filter', 'et_builder' ),
                    'css'      => array(
                        'main' => "{$this->main_css_element} .et_pb_portfolio_filter",
                    ),
                ),
            ),
            'background' => array(
                'settings' => array(
                    'color' => 'alpha',
                ),
            ),
            'border' => array(
                'css' => array(
                    'main' => "{$this->main_css_element} .et_pb_portfolio_item",
                ),
            ),
        );
        $this->custom_css_options = array(
            'portfolio_filters' => array(
                'label'    => __( 'Portfolio Filters', 'et_builder' ),
                'selector' => '.et_pb_filterable_portfolio .et_pb_portfolio_filters',
            ),
            'active_portfolio_filter' => array(
                'label'    => __( 'Active Portfolio Filter', 'et_builder' ),
                'selector' => '.et_pb_filterable_portfolio .et_pb_portfolio_filters li a.active',
            ),
            'portfolio_image' => array(
                'label'    => __( 'Portfolio Image', 'et_builder' ),
                'selector' => '.et_portfolio_image',
            ),
            'overlay' => array(
                'label'    => __( 'Overlay', 'et_builder' ),
                'selector' => '.et_overlay',
            ),
            'overlay_icon' => array(
                'label'    => __( 'Overlay Icon', 'et_builder' ),
                'selector' => '.et_overlay:before',
            ),
            'portfolio_title' => array(
                'label'    => __( 'Portfolio Title', 'et_builder' ),
                'selector' => '.et_pb_portfolio_item h2',
            ),
            'portfolio_post_meta' => array(
                'label'    => __( 'Portfolio Post Meta', 'et_builder' ),
                'selector' => '.et_pb_portfolio_item .post-meta',
            ),
        );
    }
 
    function get_fields() {
        $fields = array(
            'fullwidth' => array(
                'label'           => __( 'Layout', 'et_builder' ),
                'type'            => 'select',
                'option_category' => 'layout',
                'options'         => array(
                    'on'  => __( 'Fullwidth', 'et_builder' ),
                    'off' => __( 'Grid', 'et_builder' ),
                ),
                'description'        => __( 'Choose your desired portfolio layout style.', 'et_builder' ),
            ),
            'posts_number' => array(
                'label'             => __( 'Posts Number', 'et_builder' ),
                'type'              => 'text',
                'option_category'   => 'configuration',
                'description'       => __( 'Define the number of projects that should be displayed per page.', 'et_builder' ),
            ),
            'include_categories' => array(
                'label'           => __( 'Include Categories', 'et_builder' ),
                'renderer'        => 'et_builder_include_categories_option',
                'option_category' => 'basic_option',
                'description'     => __( 'Select the categories that you would like to include in the feed.', 'et_builder' ),
            ),
            'show_title' => array(
                'label'             => __( 'Show Title', 'et_builder' ),
                'type'              => 'yes_no_button',
                'option_category'   => 'configuration',
                'options'           => array(
                    'on'  => __( 'Yes', 'et_builder' ),
                    'off' => __( 'No', 'et_builder' ),
                ),
                'description'        => __( 'Turn project titles on or off.', 'et_builder' ),
            ),
            'show_categories' => array(
                'label'             => __( 'Show Categories', 'et_builder' ),
                'type'              => 'yes_no_button',
                'option_category'   => 'configuration',
                'options'           => array(
                    'on'  => __( 'Yes', 'et_builder' ),
                    'off' => __( 'No', 'et_builder' ),
                ),
                'description'        => __( 'Turn the category links on or off.', 'et_builder' ),
            ),
            'show_pagination' => array(
                'label'             => __( 'Show Pagination', 'et_builder' ),
                'type'              => 'yes_no_button',
                'option_category'   => 'configuration',
                'options'           => array(
                    'on'  => __( 'Yes', 'et_builder' ),
                    'off' => __( 'No', 'et_builder' ),
                ),
                'description'        => __( 'Enable or disable pagination for this feed.', 'et_builder' ),
            ),
            'background_layout' => array(
                'label'           => __( 'Text Color', 'et_builder' ),
                'type'            => 'select',
                'option_category' => 'color_option',
                'options' => array(
                    'light'  => __( 'Dark', 'et_builder' ),
                    'dark' => __( 'Light', 'et_builder' ),
                ),
                'description'        => __( 'Here you can choose whether your text should be light or dark. If you are working with a dark background, then your text should be light. If your background is light, then your text should be set to dark.', 'et_builder' ),
            ),
            'admin_label' => array(
                'label'       => __( 'Admin Label', 'et_builder' ),
                'type'        => 'text',
                'description' => __( 'This will change the label of the module in the builder for easy identification.', 'et_builder' ),
            ),
            'module_id' => array(
                'label'           => __( 'CSS ID', 'et_builder' ),
                'type'            => 'text',
                'option_category' => 'configuration',
                'description'     => __( 'Enter an optional CSS ID to be used for this module. An ID can be used to create custom CSS styling, or to create links to particular sections of your page.', 'et_builder' ),
            ),
            'module_class' => array(
                'label'           => __( 'CSS Class', 'et_builder' ),
                'type'            => 'text',
                'option_category' => 'configuration',
                'description'     => __( 'Enter optional CSS classes to be used for this module. A CSS class can be used to create custom CSS styling. You can add multiple classes, separated with a space.', 'et_builder' ),
            ),
            'hover_icon' => array(
                'label'               => __( 'Hover Icon Picker', 'et_builder' ),
                'type'                => 'text',
                'option_category'     => 'configuration',
                'class'               => array( 'et-pb-font-icon' ),
                'renderer'            => 'et_pb_get_font_icon_list',
                'renderer_with_field' => true,
                'tab_slug'            => 'advanced',
            ),
            'zoom_icon_color' => array(
                'label'             => __( 'Zoom Icon Color', 'et_builder' ),
                'type'              => 'color',
                'custom_color'      => true,
                'tab_slug'          => 'advanced',
            ),
            'hover_overlay_color' => array(
                'label'             => __( 'Hover Overlay Color', 'et_builder' ),
                'type'              => 'color-alpha',
                'custom_color'      => true,
                'tab_slug'          => 'advanced',
            ),
        );
        return $fields;
    }
 
    function shortcode_callback( $atts, $content = null, $function_name ) {
        $module_id          = $this->shortcode_atts['module_id'];
        $module_class       = $this->shortcode_atts['module_class'];
        $fullwidth          = $this->shortcode_atts['fullwidth'];
        $posts_number       = $this->shortcode_atts['posts_number'];
        $include_categories = $this->shortcode_atts['include_categories'];
        $show_title         = $this->shortcode_atts['show_title'];
        $show_categories    = $this->shortcode_atts['show_categories'];
        $show_pagination    = $this->shortcode_atts['show_pagination'];
        $background_layout  = $this->shortcode_atts['background_layout'];
        $hover_icon          = $this->shortcode_atts['hover_icon'];
        $zoom_icon_color     = $this->shortcode_atts['zoom_icon_color'];
        $hover_overlay_color = $this->shortcode_atts['hover_overlay_color'];
 
        $module_class = ET_Builder_Element::add_module_order_class( $module_class, $function_name );
 
        wp_enqueue_script( 'hashchange' );
 
        $args = array();
 
        if ( '' !== $zoom_icon_color ) {
            ET_Builder_Element::set_style( $function_name, array(
                'selector'    => '%%order_class%% .et_overlay:before',
                'declaration' => sprintf(
                    'color: %1$s !important;',
                    esc_html( $zoom_icon_color )
                ),
            ) );
        }
 
        if ( '' !== $hover_overlay_color ) {
            ET_Builder_Element::set_style( $function_name, array(
                'selector'    => '%%order_class%% .et_overlay',
                'declaration' => sprintf(
                    'background-color: %1$s;
                    border-color: %1$s;',
                    esc_html( $hover_overlay_color )
                ),
            ) );
        }
 
        if( 'on' === $show_pagination ) {
            $args['nopaging'] = true;
        } else {
            $args['posts_per_page'] = (int) $posts_number;
        }
 
        if ( '' !== $include_categories ) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'project_category',
                    'field' => 'id',
                    'terms' => explode( ',', $include_categories ),
                    'operator' => 'IN',
                )
            );
        }
 
        $projects = et_divi_get_projects( $args );
 
        $categories_included = array();
        ob_start();
        if( $projects->post_count > 0 ) {
            while ( $projects->have_posts() ) {
                $projects->the_post();
 
                $category_classes = array();
                $categories = get_the_terms( get_the_ID(), 'project_category' );
                if ( $categories ) {
                    foreach ( $categories as $category ) {
                        $category_classes[] = 'project_category_' . urldecode( $category->slug );
                        $categories_included[] = $category->term_id;
                    }
                }
 
                $category_classes = implode( ' ', $category_classes );
 
                $main_post_class = sprintf(
                    'et_pb_portfolio_item%1$s %2$s',
                    ( 'on' !== $fullwidth ? ' et_pb_grid_item' : '' ),
                    $category_classes
                );
 
                ?>
                <div id="post-<?php the_ID(); ?>" <?php post_class( $main_post_class ); ?>>
                <?php
                    $thumb = '';
 
                    $width = 'on' === $fullwidth ?  1080 : 400;
                    $width = (int) apply_filters( 'et_pb_portfolio_image_width', $width );
 
                    $height = 'on' === $fullwidth ?  9999 : 284;
                    $height = (int) apply_filters( 'et_pb_portfolio_image_height', $height );
                    $classtext = 'on' === $fullwidth ? 'et_pb_post_main_image' : '';
                    $titletext = get_the_title();
                    $thumbnail = get_thumbnail( $width, $height, $classtext, $titletext, $titletext, false, 'Blogimage' );
                    $thumb = $thumbnail["thumb"];
 
                    if ( '' !== $thumb ) : ?>
                        <a href="<?php the_permalink(); ?>">
                        <?php if ( 'on' !== $fullwidth ) : ?>
                            <span class="et_portfolio_image">
                        <?php endif; ?>
                                <?php print_thumbnail( $thumb, $thumbnail["use_timthumb"], $titletext, $width, $height ); ?>
                        <?php if ( 'on' !== $fullwidth ) :
 
                                $data_icon = '' !== $hover_icon
                                    ? sprintf(
                                        ' data-icon="%1$s"',
                                        esc_attr( et_pb_process_font_icon( $hover_icon ) )
                                    )
                                    : '';
 
                                printf( '<span class="et_overlay%1$s"%2$s></span>',
                                    ( '' !== $hover_icon ? ' et_pb_inline_icon' : '' ),
                                    $data_icon
                                );
 
                        ?>
                            </span>
                        <?php endif; ?>
                        </a>
                <?php
                    endif;
                ?>
 
                <?php if ( 'on' === $show_title ) : ?>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <?php endif; ?>
 
                <?php if ( 'on' === $show_categories ) : ?>
                    <p class="post-meta"><?php echo get_the_term_list( get_the_ID(), 'project_category', '', ', ' ); ?></p>
                <?php endif; ?>
                <div class="myexcerpt"><?php the_excerpt(); ?></div>
 
                </div><!-- .et_pb_portfolio_item -->
                <?php
            }
        }
 
        wp_reset_postdata();
 
        $posts = ob_get_clean();
 
        $categories_included = explode ( ',', $include_categories );
        $terms_args = array(
            'include' => $categories_included,
            'orderby' => 'name',
            'order' => 'ASC',
        );
        $terms = get_terms( 'project_category', $terms_args );
 
        $category_filters = '<ul class="clearfix">';
        $category_filters .= sprintf( '<li class="et_pb_portfolio_filter et_pb_portfolio_filter_all"><a href="#" class="active" data-category-slug="all">%1$s</a></li>',
            esc_html__( 'All', 'et_builder' )
        );
        foreach ( $terms as $term  ) {
            $category_filters .= sprintf( '<li class="et_pb_portfolio_filter"><a href="#" data-category-slug="%1$s">%2$s</a></li>',
                esc_attr( urldecode( $term->slug ) ),
                esc_html( $term->name )
            );
        }
        $category_filters .= '</ul>';
 
        $class = " et_pb_module et_pb_bg_layout_{$background_layout}";
 
        $output = sprintf(
            '<div%5$s class="et_pb_filterable_portfolio %1$s%4$s%6$s" data-posts-number="%7$d"%10$s>
                <div class="et_pb_portfolio_filters clearfix">%2$s</div><!-- .et_pb_portfolio_filters -->
 
                <div class="et_pb_portfolio_items_wrapper %8$s">
                    <div class="et_pb_portfolio_items">%3$s</div><!-- .et_pb_portfolio_items -->
                </div>
                %9$s
            </div> <!-- .et_pb_filterable_portfolio -->',
            ( 'on' === $fullwidth ? 'et_pb_filterable_portfolio_fullwidth' : 'et_pb_filterable_portfolio_grid clearfix' ),
            $category_filters,
            $posts,
            esc_attr( $class ),
            ( '' !== $module_id ? sprintf( ' id="%1$s"', esc_attr( $module_id ) ) : '' ),
            ( '' !== $module_class ? sprintf( ' %1$s', esc_attr( $module_class ) ) : '' ),
            esc_attr( $posts_number),
            ('on' === $show_pagination ? '' : 'no_pagination' ),
            ('on' === $show_pagination ? '<div class="et_pb_portofolio_pagination"></div>' : '' ),
            is_rtl() ? ' data-rtl="true"' : ''
        );
 
        return $output;
    }
}
