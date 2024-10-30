<?php
// create menu link
function cfb_options_menu_link() {
    add_options_page(
        'Covid Float Button Options',
        'Covid Float Button',
        'manage_options',
        'cfb-options',
        'cfb_options_content'
    );
}

// Create options page content
function cfb_options_content() {

    // Init Options Global
    global $cfb_options;

    ob_start(); ?>
        <div class="wrap">
            <h2><?php _e('COVID-19 Float Button Settings', 'cfb_domain'); ?></h2>
            <p><?php _e('You can configure all the button settings here.', 'cfb_domain'); ?></p>
            <form method="POST" action="options.php">
                <?php settings_fields('cfb_settings_group');?>
                <table class="form-table">
                    <tbody>
                        <tr>
                            <th scope="row"><label for="cfb_settings[enable]"><?php _e('Enable', 'cfb_domain'); ?></label></th>
                            <td><input name="cfb_settings[enable]" type="checkbox" id="cfb_settings[enable]" value="1" <?php checked('1', $cfb_options['enable']); ?>></td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="cfb_settings[text]"><?php _e('Text', 'cfb_domain'); ?></label></th>
                            <td><input name="cfb_settings[text]" type="text" id="cfb_settings[text]" value="<?php echo $cfb_options['text']?>" class="regular-text">
                            <p class="description"><?php _e('Enter the text for the button here', 'cfb_domain'); ?></p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="cfb_settings[link]"><?php _e('Link', 'cfb_domain'); ?></label></th>
                            <td><input name="cfb_settings[link]" type="text" id="cfb_settings[link]" value="<?php echo $cfb_options['link']?>" class="regular-text">
                            <p class="description"><?php _e('Enter the link to the page with COVID-19 information', 'cfb_domain'); ?></p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="cfb_settings[newpage]"><?php _e('Open in new window', 'cfb_domain'); ?></label></th>
                            <td><input name="cfb_settings[newpage]" type="checkbox" id="cfb_settings[newpage]" value="1" <?php checked('1', $cfb_options['newpage']); ?>>
                            <p class="description"><?php _e('Open the link in a new window/tab?', 'cfb_domain'); ?></p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="cfb_settings[textcolor]"><?php _e('Button text color', 'cfb_domain'); ?></label></th>
                            <td><input name="cfb_settings[textcolor]" type="text" id="cfb_settings[textcolor]" value="<?php echo $cfb_options['textcolor']?>" class="regular-text">
                            <p class="description"><?php _e('The textcolor of the button (name or HEX value)', 'cfb_domain'); ?></p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="cfb_settings[bgcolor]"><?php _e('Button background color', 'cfb_domain'); ?></label></th>
                            <td><input name="cfb_settings[bgcolor]" type="text" id="cfb_settings[bgcolor]" value="<?php echo $cfb_options['bgcolor']?>" class="regular-text">
                            <p class="description"><?php _e('The background color of the button (name or HEX value)', 'cfb_domain'); ?></p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="cfb_settings[icon]"><?php _e('Icon', 'cfb_domain'); ?></label></th>
                            <td>
                                <p style="margin-bottom:5px;"><i class="fas fa-info-circle fa-2x" style="margin-right:5px;"></i><i class="fas fa-virus fa-2x" style="margin-right:5px;"></i><i class="fas fa-question-circle fa-2x" style="margin-right:5px;"></i><i class="fas fa-exclamation-circle fa-2x" style="margin-right:5px;"></i></p>
                                <select name="cfb_settings[icon]" type="text" id="cfb_settings[icon]" value="<?php echo $cfb_options['icon']?>" class="regular-text">
                                    <option value="1" <?php selected( $cfb_options['icon'], 1 ); ?>>Info icon</option>
                                    <option value="2" <?php selected( $cfb_options['icon'], 2 ); ?>>Virus icon</option>
                                    <option value="3" <?php selected( $cfb_options['icon'], 3 ); ?>>Question mark icon</option>
                                    <option value="4" <?php selected( $cfb_options['icon'], 4 ); ?>>Exclamation mark icon</option>
                                </select>
                                <p class="description"><?php _e('Choose the icon you want to use', 'cfb_domain'); ?></p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="cfb_settings[position]"><?php _e('Position', 'cfb_domain'); ?></label></th>
                            <td>
                                <select name="cfb_settings[position]" type="text" id="cfb_settings[position]" value="<?php echo $cfb_options['position']?>" class="regular-text">
                                    <option value="1" <?php selected( $cfb_options['position'], 1 ); ?>>Bottom right</option>
                                    <option value="2" <?php selected( $cfb_options['position'], 2 ); ?>>Bottom left</option>
                                    <option value="3" <?php selected( $cfb_options['position'], 3 ); ?>>Top right</option>
                                    <option value="4" <?php selected( $cfb_options['position'], 4 ); ?>>Top left</option>
                                </select>
                                <p class="description"><?php _e('Where do you want the button to appear?', 'cfb_domain'); ?></p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="cfb_settings[offset-vertical]"><?php _e('Offset to vertical border', 'cfb_domain'); ?></label></th>
                            <td><input name="cfb_settings[offset-vertical]" type="text" id="cfb_settings[offset-vertical]" value="<?php echo $cfb_options['offset-vertical']?>" class="regular-text">
                            <p class="description"><?php _e('The offsett to the vertical border (left or right). E.g. 10px or 10%', 'cfb_domain'); ?></p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="cfb_settings[offset-horizontal]"><?php _e('Offset to horizontal border', 'cfb_domain'); ?></label></th>
                            <td><input name="cfb_settings[offset-horizontal]" type="text" id="cfb_settings[offset-horizontal]" value="<?php echo $cfb_options['offset-horizontal']?>" class="regular-text">
                            <p class="description"><?php _e('The offsett to the horizontal border (top or bottom). E.g. 10px or 10%', 'cfb_domain'); ?></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="<?php _e('Save settings', 'cfb_domain'); ?>"></p>
            </form>
        </div>
    <?php
    echo ob_get_clean();
}

add_action( 'admin_menu', 'cfb_options_menu_link' );

// Register Settings
function cfb_register_settings() {
    register_setting( 'cfb_settings_group', 'cfb_settings' );
}

add_action( 'admin_init', 'cfb_register_settings' );