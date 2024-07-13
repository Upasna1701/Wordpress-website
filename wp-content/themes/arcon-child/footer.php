<?php
wp_footer();
// print_r(has_nav_menu( 'secondary' ));die;
// echo"<pre>";print_r(has_nav_menu());exit;
?>
<?php if (has_nav_menu('primary')) {
    // Get the menu object
    // $menu = wp_get_nav_menu_object('Footer menu');
    // Get the menu items
    $menu_object = wp_get_nav_menu_object('Footer menu');
    $dry_special_containers = wp_get_nav_menu_object('About Us');
    $quick_links = wp_get_nav_menu_object('Quick Links');
    $specials = wp_get_nav_menu_object('More');

    // echo"<pre>";print_r($dry_special_containers->name);
    $menu_items = wp_get_nav_menu_items($menu_object);
    $dry_special_containers_items = wp_get_nav_menu_items($dry_special_containers);
    $quick_links_items = wp_get_nav_menu_items($quick_links);
    $specials_items = wp_get_nav_menu_items($specials);
    // echo"<pre>";print_r($menu_items);exit;
    $menu_id = !empty($menu_items) ? $menu_object->term_id : '';
    $copy_right_text = get_term_meta($menu_id, 'footer_details_copy_right_text')[0];
    $address = get_term_meta($menu_id, 'footer_details_address')[0];
    $desktop_logo = get_term_meta($menu_id, 'footer_details_footer_desktop_logo');
    $desktop_logo_url = wp_get_attachment_url($desktop_logo[0]);
    // $facebook_link = get_term_meta($menu_id, 'footer_details_facebook_link')[0];
    // $facebook_icon = get_term_meta($menu_id, 'footer_details_facebook_icon')[0];
    // $twitter_link = get_term_meta($menu_id, 'footer_details_twitter_link')[0];
    // $twitter_icon = get_term_meta($menu_id, 'footer_details_twitter_icon')[0];
    $linkedin_link = get_term_meta($menu_id, 'footer_details_linkedin_link')[0];
    $linkedin_icon = get_term_meta($menu_id, 'footer_details_linkedin_icon')[0];
    $instagram_link = get_term_meta($menu_id, 'footer_details_instagram_link')[0];
    $instagram_icon = get_term_meta($menu_id, 'footer_details_instagram_icon')[0];

    // echo"<pre>";print_r($linkedin_link);
    // echo"<pre>";print_r($linkedin_icon);exit;
    // $parent_menu_items = wp_list_filter($menu_items, array('menu_item_parent' => 61));
    $status = get_term_meta($menu_id, 'footer_details_status')[0];
}
if ($status) {
?>

    <div class="arcon-footer">
        <div class="container">
            <div class="arcon-footer-grid">
                <div class="arcon-footer-grid-col footer-logo-col">
                    <?php if ($desktop_logo_url) : ?>
                        <img loading="lazy" src="<?php echo $desktop_logo_url; ?>" alt="white-logo" class="white-logo" width="300" height="100" />
                    <?php endif; ?>
                    <p class="footer-desc"><?php echo $address; ?></p>
                    <div class="social-icons">
                       
                        <!-- linkedin  -->
                        <a href="<?php echo $linkedin_link['url']; ?>" target="_blank">
                            <?php echo $linkedin_icon; ?>
                        </a>
                        <!-- instagram  -->
                        <a href="<?php echo $instagram_link['url']; ?>" target="_blank">
                            <?php echo $instagram_icon; ?>
                        </a>
                    </div>
                </div>
                <?php if (is_array($dry_special_containers_items) && count($dry_special_containers_items)) :

                ?>
                    <div class="arcon-footer-grid-col footer-links">
                        <div class="foot-inner">
                            <a href="<?php echo $dry_special_containers_items[0]->url; ?>" class="footer-link-heading"><?php echo $dry_special_containers_items[0]->title; ?></a>
                            <?php
                            array_shift($dry_special_containers_items);

                            foreach ($dry_special_containers_items as $key => $value) : ?>
                                <a href="<?php echo $value->url; ?>" class="footer-link-sub-heading"><?php echo $value->title; ?></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (is_array($quick_links_items) && count($quick_links_items)) : ?>

                    <div class="arcon-footer-grid-col footer-links">
                        <div class="foot-inner">
                            <a href="<?php echo $quick_links_items[0]->url; ?>" class="footer-link-heading"><?php echo $quick_links_items[0]->title; ?></a>
                            <?php
                            array_shift($quick_links_items);
                            foreach ($quick_links_items as $key => $value) : ?>
                                <a href="<?php echo $value->url; ?>" class="footer-link-sub-heading"><?php echo $value->title; ?></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (is_array($specials_items) && count($specials_items)) : ?>

                    <div class="arcon-footer-grid-col footer-links">
                        <div class="foot-inner">
                            <a href="<?php echo $specials_items[0]->url; ?>" class="footer-link-heading"><?php echo $specials_items[0]->title; ?></a>
                            <?php
                            array_shift($specials_items);
                            foreach ($specials_items as $key => $value) : ?>
                                <a href="<?php echo $value->url; ?>" class="footer-link-sub-heading"><?php echo $value->title; ?></a>
                            <?php endforeach; ?>
                        </div>

                    </div>
                <?php endif; ?>

            </div>
            <div class="arcon-copyright">
                <p class="copyright"><?php echo $copy_right_text; ?></p>
                <div class="privacy-links">
                    <?php foreach ($menu_items as $key => $value) : 
                        // print'<pre>'; print_r($menu_items);
                        ?>
                        <a href="<?php echo $value->url; ?>"><?php echo $value->title; ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>



    <!-- <script>
        const chatBotScript = this.renderer.createElement('script');
        ;
        chatBotScript.type = 'text/javascript';
        chatBotScript.id = 'zsiqchat';
        chatBotScript.innerHTML = `
            var $zoho=$zoho || {};$zoho.salesiq = $zoho.salesiq || {widgetcode: "siq6938c55e08d7f4e76d00ce303bb6f090c0d0447d9f9f0f0573751f17a75596cf", values:{},ready:function(){}};var d=document;s=d.createElement("script");s.type="text/javascript";s.id="zsiqscript";s.defer=true;s.src="https://salesiq.zohopublic.in/widget";t=d.getElementsByTagName("script")[0];t.parentNode.insertBefore(s,t);
        `;
        this.renderer.appendChild(document.head, chatBotScript);
    </script> -->


<script>(g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})
        ({key: "AIzaSyCM0OSXaylpzd1nMUMcLRoVGxqfus_Zd9w", v: "weekly"});</script>

<script>
    function initMap() {
            // The location of the marker
            const location = { lat: -25.344, lng: 131.036 };
            // The map, centered at the location
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 4,
                center: location,
            });
            // The marker, positioned at the location
            const marker = new google.maps.Marker({
                position: location,
                map: map,
            });
            // The content of the info window
            const contentString = '<div id="content">' +
                '<h2>Location Name</h2>' +
                '<p>Some custom content about this location.</p>' +
                '</div>';
            // The info window
            const infowindow = new google.maps.InfoWindow({
                content: contentString,
            });
            // Add a click listener to open the info window when the marker is clicked
            marker.addListener("click", () => {
                infowindow.open({
                    anchor: marker,
                    map,
                    shouldFocus: false,
                });
            });
        }
        // Load the map after the API is ready
        google.maps.importLibrary('maps').then(() => {
            initMap();
        });



</script>





</body>

</html>