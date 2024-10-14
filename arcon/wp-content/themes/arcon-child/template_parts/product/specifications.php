<?php

    $product_specification  = get_field('product_specification');
    
    if($product_specification['status']):
?>

<section class="specifications-sec" id="specifications">
    <div class="container">
        <?php
            if($product_specification['heading']):
        ?>
        <div>
            <h2><?php echo $product_specification['heading']; ?></h2>
        </div>
        <?php endif; ?>
        <?php
            $table_data = $product_specification['tables'];
            if(count($table_data) > 0):
        ?>
        <div class="specifications-list">
        
        <?php foreach ($product_specification['tables'] as $table): ?>
            <div class="box row-<?php echo $table['no_of__coloumns']; ?>">
                <h5><?php echo $table['table_heading']; ?></h5>            
                <div class="overflow-div">
                    <table>
                            <tr>
                                <?php
                                // Print the first three items as table headers
                                for ($i = 0; $i < $table['no_of__coloumns']; $i++) {
                                    echo '<th>' . $table['table_data_repeater'][$i]['table_data'] . '</th>';
                                }
                                ?>
                            </tr>

                            <?php
                            // Iterate over the rest of the items in groups of three for row data
                            for ($i = $table['no_of__coloumns']; $i < count($table['table_data_repeater']); $i += $table['no_of__coloumns']) {
                                echo '<tr>';
                                for ($j = 0; $j < $table['no_of__coloumns']; $j++) {
                                    if (isset($table['table_data_repeater'][$i + $j])) {
                                        echo '<td>' . $table['table_data_repeater'][$i + $j]['table_data'] . '</td>';
                                    }
                                }
                                echo '</tr>';
                            }
                            ?>

                    </table>
                </div>
            </div>
        <?php endforeach; ?>

        </div>
        <?php endif; ?>
    </div>
</section>

<?php endif; ?>