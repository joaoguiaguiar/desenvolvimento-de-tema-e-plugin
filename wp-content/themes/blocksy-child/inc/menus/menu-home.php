<?php
// MENU 1: Exibir SOMENTE na página inicial
if (!function_exists('menu_personalizado_home')) {
    add_action('blocksy:header:after', 'menu_personalizado_home');
    function menu_personalizado_home() {
        if (!is_front_page()) return;  

        ?>
        <aside id="hero-aside">
            <section class="hero-carousel">
                <div class="carousel-container">
                    <?php echo do_shortcode('[smartslider3 slider="2"]'); ?>
                </div>
            </section>

            <section class="hero-menu menu-1" id="menu-1">
                <div class="containner__p">
                    <p class="p__menu" style="font-size: 1rem; color:white;">Instituto Brasileiro de Museus</p>
                    <h3>
                        <a href="<?php echo home_url(); ?>" class="titulo__menu">
                            Museu Imperial
                        </a>
                    </h3>
                </div>

                <div class="menu-and-search">
                    <svg onclick="toggleMenu()" xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 24 24" fill="none" style="cursor:pointer; display:inline-block; color: white;">
                        <path d="M4 6h16M4 12h16M4 18h16" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    </svg>
                    
                    <nav class="menu__items">
                        <?php
                        $menu_items = wp_get_nav_menu_items('menu-principal');
                        if ($menu_items) {
                            $menu_nav = array_slice($menu_items, 0, 8);
                            foreach ($menu_nav as $item) {
                                echo '<a href="' . esc_url($item->url) . '">' . esc_html($item->title) . '</a>';
                            }
                        }
                        ?>
                    </nav>

                    <div class="container__lista">
                        <div class="containerflex">
                            <?php 
                            if (is_active_sidebar('main-menu-sidebar')) {
                                dynamic_sidebar('main-menu-sidebar'); 
                            } else {
                                echo '<ul class="lista_item_menu" style="display:flex; justify-content: space-evenly">';
                                echo '<li class="item__menu"><h5>Menu</h5>';
                                echo '<p>Adicione o widget "Menu Lista" na área de widgets do menu principal.</p>';
                                echo '</li></ul>';
                            }
                            ?>    
                        </div>
                    </div>

                    <div class="container__input">
                        <?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>
                    </div>
                </div>
            </section>
        </aside>
        <?php
    }
}