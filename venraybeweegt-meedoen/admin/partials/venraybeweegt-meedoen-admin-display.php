<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://www.venraybeweegt.nl
 * @since      1.0.0
 *
 * @package    Venraybeweegt_Meedoen
 * @subpackage Venraybeweegt_Meedoen/admin/partials
 */
?>          

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="wrap">
<h2>Venray Beweegt<?php esc_attr_e(' Settings', 'vb_options_name' ); ?></h2>
    <table> 
        <tbody class="vb_table_container">
            <tr>
                <form method="post" name="<?php echo $this->vb_options_name; ?>" action="options.php">
                <?php
                //Grab all options
                $options = get_option( $this->vb_options_name );
            
                $example_select = ( isset( $options['example_select'] ) && ! empty( $options['example_select'] ) ) ? esc_attr( $options['example_select'] ) : '1';
                $example_text = ( isset( $options['example_text'] ) && ! empty( $options['example_text'] ) ) ? esc_attr( $options['example_text'] ) : 'default';
                $example_textarea = ( isset( $options['example_textarea'] ) && ! empty( $options['example_textarea'] ) ) ? sanitize_textarea_field( $options['example_textarea'] ) : 'default';
                $example_checkbox = ( isset( $options['example_checkbox'] ) && ! empty( $options['example_checkbox'] ) ) ? 1 : 0;

                settings_fields($this->vb_options_name);
                do_settings_sections($this->vb_options_name);
                add_option('vb_options_name', $options)

                
                ?>
            </tr>
            <tr>
                <fieldset>
                    <label for="example_select">
                        <th>
                            <span><?php esc_attr_e( 'Plain Text 1', 'vb_options_name' ); ?></span>
                        </th>
                        <td>
                            <select name="<?php echo $this->vb_options_name; ?>example_select" id="<?php echo $this->vb_options_name; ?>-example_select" class="vb_dropdown">
                                <option <?php if ( $example_select == 'top' ) echo 'selected="selected"'; ?> value="top">Top</option>
                                <option <?php if ( $example_select == 'bottom') echo 'selected="selected"'; ?> value="bottom">Bottom</option>
                                <option <?php if ( $example_select == 'left') echo 'selected="selected"'; ?> value="left">Left</option>
                                <option <?php if ( $example_select == 'right') echo 'selected="selected"'; ?> value="right">Right</option>
                            </select>
                        </td>
                    </label>
                </fieldset>
            </tr>
            <tr>
                <fieldset>
                    <label for="example_select">
                        <th>
                            <span><?php esc_attr_e( 'Plain Text 2', 'vb_options_name' ); ?></span>
                        </th>
                        <td>
                            <select name="<?php echo $this->vb_options_name; ?>example_select" id="<?php echo $this->vb_options_name; ?>-example_select" class="vb_dropdown">
                                <option <?php if ( $example_select == 'top' ) echo 'selected="selected"'; ?> value="top">Top</option>
                                <option <?php if ( $example_select == 'bottom') echo 'selected="selected"'; ?> value="bottom">Bottom</option>
                                <option <?php if ( $example_select == 'left') echo 'selected="selected"'; ?> value="left">Left</option>
                                <option <?php if ( $example_select == 'right') echo 'selected="selected"'; ?> value="right">Right</option>
                            </select>
                        </td>
                    </label>
                </fieldset>
            </tr>
            <tr>
                <fieldset>
                    <label for="example_select">
                        <th>
                            <span><?php esc_attr_e( 'Plain Text 3', 'vb_options_name' ); ?></span>
                        </th>
                        <td>
                            <select name="<?php echo $this->vb_options_name; ?>example_select" id="<?php echo $this->vb_options_name; ?>-example_select" class="vb_dropdown">
                                <option <?php if ( $example_select == 'top' ) echo 'selected="selected"'; ?> value="top">Top</option>
                                <option <?php if ( $example_select == 'bottom') echo 'selected="selected"'; ?> value="bottom">Bottom</option>
                                <option <?php if ( $example_select == 'left') echo 'selected="selected"'; ?> value="left">Left</option>
                                <option <?php if ( $example_select == 'right') echo 'selected="selected"'; ?> value="right">Right</option>
                            </select>
                        </td>
                    </label>
                </fieldset>
            </tr>
            <!-- Checkbox -->
            <tr>
                <fieldset>
                    <th>
                        <span><?php esc_attr_e( 'Checkbox', 'vb_options_name'); ?></span>
                    </th>
                    <td>
                        <label for="<?php echo $this->vb_options_name; ?>-example_checkbox" class="vb_checkbox">
                            <!-- <input type="radio" id="<?php echo $this->vb_options_name; ?>-example_checkbox" name="<?php echo $this->vb_options_name; ?>[example_checkbox]" value="1" <?php checked( $example_checkbox, 1); ?> checked="checked"/> -->
                            <input type="radio" name="vb_cbx1" value="1" checked="checked"></input>
                            <span><?php esc_attr_e('Example Checkbox', 'vb_options_name1' ); ?></span>  
                            <br>          
                            <!-- <input type="radio" id="<?php echo $this->vb_options_name; ?>-example_checkbox" name="<?php echo $this->vb_options_name; ?>[example_checkbox]" value="2" <?php checked( $example_checkbox, 2); ?> /> -->
                            <input type="radio" name="vb_cbx1" value="2"></input>
                            <span><?php esc_attr_e('Example Checkbox', 'vb_options_name2' ); ?></span>
                            <br>
                            <!-- <input type="radio" id="<?php echo $this->vb_options_name; ?>-example_checkbox" name="<?php echo $this->vb_options_name; ?>[example_checkbox]" value="3" <?php checked( $example_checkbox, 3); ?> /> -->
                            <input type="radio" name="vb_cbx1" value="3"></input>
                            <span><?php esc_attr_e('Example Checkbox', 'vb_options_name3' ); ?></span>
                            <br>
                            <!-- <input type="radio" id="<?php echo $this->vb_options_name; ?>-example_checkbox" name="<?php echo $this->vb_options_name; ?>[example_checkbox]" value="4" <?php checked( $example_checkbox, 4); ?> /> -->
                            <input type="radio" name="vb_cbx1" value="4"></input>
                            <span><?php esc_attr_e('Example Checkbox', 'vb_options_name4' ); ?></span>
                        </label>
                    </td>
                </fieldset>
            </tr>
            <tr>
                <fieldset>
                    <th>
                        <span><?php esc_attr_e( 'Checkbox', 'vb_options_name'); ?></span>
                    </th>
                    <td>
                    <label for="<?php echo $this->vb_options_name; ?>-example_checkbox" class="vb_checkbox">
                            <!-- <input type="radio" id="<?php echo $this->vb_options_name; ?>-example_checkbox" name="<?php echo $this->vb_options_name; ?>[example_checkbox]" value="1" <?php checked( $example_checkbox, 1); ?> checked="checked"/> -->
                            <input type="radio" name="vb_cbx2" value="1" checked="checked"></input>
                            <span><?php esc_attr_e('Example Checkbox', 'vb_options_name5' ); ?></span>  
                            <br>          
                            <!-- <input type="radio" id="<?php echo $this->vb_options_name; ?>-example_checkbox" name="<?php echo $this->vb_options_name; ?>[example_checkbox]" value="2" <?php checked( $example_checkbox, 2); ?> /> -->
                            <input type="radio" name="vb_cbx2" value="2"></input>
                            <span><?php esc_attr_e('Example Checkbox', 'vb_options_name6' ); ?></span>
                            <br>
                            <!-- <input type="radio" id="<?php echo $this->vb_options_name; ?>-example_checkbox" name="<?php echo $this->vb_options_name; ?>[example_checkbox]" value="3" <?php checked( $example_checkbox, 3); ?> /> -->
                            <input type="radio" name="vb_cbx2" value="3"></input>
                            <span><?php esc_attr_e('Example Checkbox', 'vb_options_name7' ); ?></span>
                            <br>
                            <!-- <input type="radio" id="<?php echo $this->vb_options_name; ?>-example_checkbox" name="<?php echo $this->vb_options_name; ?>[example_checkbox]" value="4" <?php checked( $example_checkbox, 4); ?> /> -->
                            <input type="radio" name="vb_cbx2" value="4"></input>
                            <span><?php esc_attr_e('Example Checkbox', 'vb_options_name8' ); ?></span>
                        </label>
                    </td>
                </fieldset>
            </tr>
                <!-- Text -->
            <tr>
                <fieldset>
                <th>    
                    <p class="vb_textfield_header"><?php esc_attr_e( 'Input Textfield', 'vb_options_name' ); ?></p>
                </th>
                <td class="vb_inputfield">
                    <legend class="screen-reader-text">
                            <span><?php esc_attr_e( 'Example Text', 'vb_options_name' ); ?></span>
                    </legend>
                    <textarea class="vb_lg_textfield" id="<?php echo $this->vb_options_name; ?>-example_text" name="<?php echo $this->vb_options_name; ?>[example_text]" rows="1" cols="50"></textarea>
                    <br>
                    <legend class="screen-reader-text">
                            <span><?php esc_attr_e( 'Example Text', 'vb_options_name' ); ?></span>
                    </legend>
                    <textarea class="vb_lg_textfield" id="<?php echo $this->vb_options_name; ?>-example_text" name="<?php echo $this->vb_options_name; ?>[example_text]" rows="1" cols="50"></textarea>
                    <br>
                    <legend class="screen-reader-text">
                            <span><?php esc_attr_e( 'Example Text', 'vb_options_name' ); ?></span>
                    </legend>
                    <textarea class="vb_lg_textfield" id="<?php echo $this->vb_options_name; ?>-example_text" name="<?php echo $this->vb_options_name; ?>[example_text]" rows="1" cols="50"></textarea>
                    <br>
                    <legend class="screen-reader-text">
                            <span><?php esc_attr_e( 'Example Text', 'vb_options_name' ); ?></span>
                    </legend>
                    <textarea class="vb_lg_textfield" id="<?php echo $this->vb_options_name; ?>-example_text" name="<?php echo $this->vb_options_name; ?>[example_text]" rows="1" cols="50"></textarea>
                    <br>
                    <legend class="screen-reader-text">
                            <span><?php esc_attr_e( 'Example Text', 'vb_options_name' ); ?></span>
                    </legend>
                    <textarea class="vb_lg_textfield" id="<?php echo $this->vb_options_name; ?>-example_text" name="<?php echo $this->vb_options_name; ?>[example_text]" rows="1" cols="50"></textarea>
                    <br>
                    <legend class="screen-reader-text">
                            <span><?php esc_attr_e( 'Example Text', 'vb_options_name' ); ?></span>
                    </legend>
                    <textarea class="vb_lg_textfield" id="<?php echo $this->vb_options_name; ?>-example_text" name="<?php echo $this->vb_options_name; ?>[example_text]" rows="1" cols="50"></textarea>
                </td>
                </fieldset>
            </tr>
            
                <!-- Textarea -->
            <tr>
                <fieldset>
                    <th>
                        <p><?php esc_attr_e( 'Example Text.', 'vb_options_name' ); ?></p>
                    </th>
                    <td>
                        <legend class="screen-reader-text">
                            <span><?php esc_attr_e( 'Example Text', 'vb_options_name' ); ?></span>
                        </legend>
                        <textarea class="vb_lg_textfield" id="<?php echo $this->vb_options_name; ?>-example_textarea" name="<?php echo $this->vb_options_name; ?>[example_textarea]" rows="4" cols="50"></textarea>
                    </td>
                </fieldset>
            <tr>
                <td>
                    <?php submit_button( __( 'Save all changes', 'vb_options_name'), 'primary','submit', TRUE); ?>
                </td>
            </tr>
        </form>
            <div id="icon-themes" class="icon32"></div>
    </tbody>
</table>
</div>