<?php

    global $wpdb;

    $fieldlists = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}smart_Keap_field_mapping");

?>

    <h2><?php echo esc_html__('Fields Mapping List'); ?></h2>



    <table id="mapping-list-table" class="wp-list-table widefat fixed striped table-view-list display">

        <thead>

            <th><?php echo esc_html__('Id', 'wpski-smart-Keap'); ?></th>

            <th><?php echo esc_html__('Keap Module', 'wpski-smart-Keap'); ?></th>

            <th><?php echo esc_html__('Keap Field', 'wpski-smart-Keap'); ?></th>

            <th><?php echo esc_html__('WP Module', 'wpski-smart-Keap'); ?></th>

            <th><?php echo esc_html__('WP Field', 'wpski-smart-Keap'); ?></th>

            <th><?php echo esc_html__('Status', 'wpski-smart-Keap'); ?></th>

            <th><?php echo esc_html__('Description', 'wpski-smart-Keap'); ?></th>

            <th><?php echo esc_html__('Action', 'wpski-smart-Keap'); ?></th>

        </thead>



        <tfoot>

            <th><?php echo esc_html__('Id', 'wpski-smart-Keap'); ?></th>

            <th><?php echo esc_html__('Keap Module', 'wpski-smart-Keap'); ?></th>

            <th><?php echo esc_html__('Keap Field', 'wpski-smart-Keap'); ?></th>

            <th><?php echo esc_html__('WP Module', 'wpski-smart-Keap'); ?></th>

            <th><?php echo esc_html__('WP Field', 'wpski-smart-Keap'); ?></th>

            <th><?php echo esc_html__('Status', 'wpski-smart-Keap'); ?></th>

            <th><?php echo esc_html__('Description', 'wpski-smart-Keap'); ?></th>

            <th><?php echo esc_html__('Action', 'wpski-smart-Keap'); ?></th>

        </tfoot>

        <tbody>

            <!-- WP Modules Row -->

            <?php

                if ( $fieldlists ) {

                    foreach ( $fieldlists as $singlelist ) {

                        ?>

                        <tr>

                            <td><?php echo esc_html__($singlelist->id, 'wpski-smart-Keap'); ?></td>

                            <td><?php echo esc_html__($singlelist->Keap_module, 'wpski-smart-Keap'); ?></td>

                            <td><?php echo esc_html__($singlelist->Keap_field, 'wpski-smart-Keap'); ?></td>

                            <td><?php echo esc_html__($singlelist->wp_module, 'wpski-smart-Keap'); ?></td>

                            <td><?php echo esc_html__($singlelist->wp_field, 'wpski-smart-Keap'); ?></td>

                            <td><?php echo ucfirst( esc_html__($singlelist->status, 'wpski-smart-Keap') ); ?></td>

                            <td><?php echo esc_html__($singlelist->description, 'wpski-smart-Keap'); ?></td>

                            <td>

                                <?php if($singlelist->is_predefined != 'yes' ){ ?>

                                    <a href="<?php echo admin_url('admin.php?page=wpski-smart-Keap-mappings&action=trash&id='.$singlelist->id); ?>">

                                        <button type="submit"><?php echo esc_html__('Delete', 'wpski-smart-Keap'); ?></button>

                                    </a>

                                <?php }?>

                            </td>

                        </tr>

                        <?php

                    }   

                } else {

                    ?>

                    <tr>

                        <td colspan="7">

                            <?php echo esc_html__('No Record Found', 'wpski-smart-Keap'); ?>

                        </td>

                    </tr>

                    <?php

                }

            ?>

        </tbody>

    </table>