<?php
$new_specification = get_field('new_specification', $post->ID);
$status = $new_specification['status'];

if ($status) {
?>
<div class="looking-for">
    <div class="container">
        <div class="looking-for-sec">
            <?php if (!empty($new_specification['heading_title'])) { ?>
                <h2><?php echo htmlspecialchars($new_specification['heading_title']); ?></h2>
            <?php } ?>
            <div class="looking-flexcol">
                <?php if (is_array($new_specification['repeater']) && count($new_specification['repeater'])) { ?>
                    <?php foreach ($new_specification['repeater'] as $key => $slider) {
                        if ($slider['status']) { ?>
                            <div class="looking-sec-content">
                                <div class="looking-sec-content-left">
                                    <div class="con-start">
                                        <?php if (!empty($slider['title'])) { ?>
                                            <h3><?php echo htmlspecialchars($slider['title']); ?></h3>
                                        <?php } ?>
                                        <?php if (!empty($slider['description'])) { ?>
                                            <p><?php echo htmlspecialchars($slider['description']); ?></p>
                                        <?php } ?>
                                        <?php if (!empty($slider['pointers'])) { ?>
                                            <ul>
                                                <?php echo htmlspecialchars($slider['pointers']); ?>
                                            </ul>
                                        <?php } ?>
                                        
                                        <div class="specifications-sec" id="specifications">
                                            <?php
                                                $table_data = $slider['tables'];
                                                if (isset($table_data) && is_array($table_data) && count($table_data) > 0):
                                            ?>
                                            <div class="specifications-list">
                                                <?php 
                                                // Ensure $table_data is an array of tables
                                                if (isset($table_data['table_heading']) && isset($table_data['no_of__coloumns']) && isset($table_data['table_data_repeater'])) {
                                                ?>
                                                    <div class="box row-<?php echo htmlspecialchars($table_data['no_of__coloumns']); ?>">
                                                        <h5><?php echo htmlspecialchars($table_data['table_heading']); ?></h5>            
                                                        <div class="overflow-div">
                                                            <table>
                                                                <tr>
                                                                    <?php
                                                                    // Print the headers
                                                                    for ($i = 0; $i < $table_data['no_of__coloumns']; $i++) {
                                                                        if (isset($table_data['table_data_repeater'][$i]['table_data'])) {
                                                                            echo '<th>' . htmlspecialchars($table_data['table_data_repeater'][$i]['table_data']) . '</th>';
                                                                        }
                                                                    }
                                                                    ?>
                                                                </tr>
                                                                <?php
                                                                // Iterate over the rest of the items for row data
                                                                for ($i = $table_data['no_of__coloumns']; $i < count($table_data['table_data_repeater']); $i += $table_data['no_of__coloumns']) {
                                                                    echo '<tr>';
                                                                    for ($j = 0; $j < $table_data['no_of__coloumns']; $j++) {
                                                                        if (isset($table_data['table_data_repeater'][$i + $j]['table_data'])) {
                                                                            echo '<td>' . htmlspecialchars($table_data['table_data_repeater'][$i + $j]['table_data']) . '</td>';
                                                                        }
                                                                    }
                                                                    echo '</tr>';
                                                                }
                                                                ?>
                                                            </table>
                                                        </div>
                                                    </div>
                                                <?php 
                                                } 
                                                ?>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="looking-sec-content-right">
                                    <div class="image-animation">
                                        <?php if (!empty($slider['desktop_image']['url'])) { ?>
                                            <img loading="lazy" src="<?php echo htmlspecialchars($slider['desktop_image']['url']); ?>" alt="arcon" class="overview-img" width="440" height="350"/>
                                        <?php } ?>
                                    </div>
                                    <div class="square-animation"></div>
                                </div>
                            </div>
                        <?php } 
                    } ?>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php } ?>
