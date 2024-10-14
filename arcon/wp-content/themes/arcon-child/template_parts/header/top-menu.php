<?php
if (has_nav_menu('primary')) {
    // Get the menu object
    $menu = wp_get_nav_menu_object('Header menu');
    // Get the menu items

    $menu_items = wp_get_nav_menu_items($menu);
    $menu_object = wp_get_nav_menu_object('header-menu');
    $menu_id = !empty($menu_object) ? $menu_object->term_id : '';

    $login_button = get_term_meta($menu_id, 'details_login_button')[0];
    $login_button_status = get_term_meta($menu_id, 'details_login_button_status')[0];
    $registration_button = get_term_meta($menu_id, 'details_registration_button')[0];
    $registration_button_status = get_term_meta($menu_id, 'details_registration_button_status')[0];
    $desktop_logo = get_term_meta($menu_id, 'details_desktop_logo');
    $mobile_logo = get_term_meta($menu_id, 'details_mobile_logo');
    $status = get_term_meta($menu_id, 'details_status')[0];
    $desktop_logo_url = wp_get_attachment_url($desktop_logo[0]);
    // echo"<pre>";print_r($status);exit;
    $mobile_logo_url = wp_get_attachment_url($mobile_logo[0]);
}
// if ($status) {
?>


<div class="scroll-fixed"></div>

<header>
    <div class="container">
        <div class="header-nav">
            <div class="header-nav-items">
                <div class="logo-sec">
                    <?php if ($desktop_logo_url) : ?>
                        <a href="<?php echo get_site_url(); ?>" class="arcon-logo">
                            <img loading="lazy" src="<?php echo $desktop_logo_url; ?>" alt="logo" class="logo" width="40" height="188" />
                        </a>
                    <?php endif; ?>
                    <div class="mobile-menu">
                        <div class="menu-btn">
                            <div class="line transition"></div>
                            <div class="line transition"></div>
                            <div class="line transition"></div>
                        </div>
                    </div>
                </div>
                <div class="header-links">

                    <div class="header-menus">
                        <?php if (is_array($menu_items) && count($menu_items)) :
                            // Use wp_list_filter to filter the menu items to only include top-level (parent) menu items
                            $parent_menu_items = wp_list_filter($menu_items, array('menu_item_parent' => 0));
                        ?>
                            <ul class="navlink">
                                <?php foreach ($parent_menu_items as $key => $parent_menu_item) :
                                    $child_menu_items = wp_list_filter($menu_items, array('menu_item_parent' => $parent_menu_item->ID));
                                    $is_active = (get_permalink() == $parent_menu_item->url) ? 'color: #f05f25;' : ''; // Inline style for active parent
                                ?>
                                    <li class="nav-links">
                                        <div class="nav-inner">
                                            <div class="mob-mnu">
                                            <a aria-current="page" href="<?php echo $parent_menu_item->url; ?>" style="<?php echo $is_active; ?>"><?php echo $parent_menu_item->title; ?></a>
                                            <?php if (!empty($child_menu_items)) : ?>
                                                <span class="dropdown-div">
                                                    <svg _ngcontent-serverApp-c32="" xmlns="http://www.w3.org/2000/svg" width="12" height="40" viewBox="0 0 12 7.41" class="transition">
                                                        <path _ngcontent-serverApp-c32="" id="ic_expand_more_24px" d="M10.59,7.41,6,2.83,1.41,7.41,0,6,6,0l6,6Z" transform="translate(12 7.41) rotate(180)"></path>
                                                    </svg>
                                                </span>
                                            </div>
                                                <div class="menu-dropdown">
                                                    <ul>
                                                        <?php foreach ($child_menu_items as $child_menu_item) :
                                                            $is_child_active = (get_permalink() == $child_menu_item->url) ? 'color: #f05f25;' : ''; // Inline style for active child
                                                        ?>
                                                            <li><a href="<?php echo $child_menu_item->url; ?>" style="<?php echo $is_child_active; ?>"><?php echo $child_menu_item->title; ?></a></li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </div>
                                            <?php endif; ?>
                                            <span class="download-div">
                                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/downloading.gif" alt="download" width="50" height="50" />
                                            </span>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>


            <div class="header-links-ctas">
                <div class="header-ctas">
                    <?php if ($login_button_status) :
                    ?>
                        <a href="<?php echo $login_button['url']; ?>" class="login-btn"><?php echo $login_button['title']; ?></a>
                    <?php endif; ?>
                    <?php if ($registration_button_status) : ?>
                        <a href="<?php echo $registration_button['url']; ?>" class="login-btn"><?php echo $registration_button['title']; ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

</header>
<?php //} ?>