<?php

/*** EXAMPLE 1 ***
 * This example shows how you can add fields and a section to an existing page.
 */

/*** ADMIN INIT HOOK ***/
add_action('admin_init', 'admin_examples_settings_initialization');
function admin_examples_settings_initialization() {
    
    // add a section to the Settings->General page
    add_settings_section(
        'admin_examples_general_section',  // <- ID identifying the section
        'Admin examples general settings', // <- Title of section
        'admin_examples_general_section',  // <- callback functions, which displays anything before the section
        'general'                          // <- page where the section will be
    );
    
    // adding fields to the general section
    add_settings_field(
        'admin_examples_general_field_boolean', // <- field ID
        'Boolean field',                        // <- field label
        'admin_examples_general_field_boolean', // <- field callback function
        'general',                              // <- page ID where the field will be displayed
        'admin_examples_general_section',       // <- section ID where the field will be (optional)
        array (
            'Explanation stuff for the checkbox' 
        ) // <- parameter array handled to the function
    );
    add_settings_field(
        'admin_examples_general_field_text', 
        'Text field',                        
        'admin_examples_general_field_text', 
        'general',                              
        'admin_examples_general_section'
    );
    add_settings_field(
        'admin_examples_general_field_select', 
        'Select field',                        
        'admin_examples_general_field_select', 
        'general',                              
        'admin_examples_general_section'
    );
    add_settings_field(
        'admin_examples_general_field_longtext', 
        'Long Text Field',                        
        'admin_examples_general_field_longtext', 
        'general',                              
        'admin_examples_general_section'
    );
    
    // register our settings with the group name (group: this is separate from the section, the thing is that the saving is done by groups)
    register_setting(
        'general',                              // <- group ID
        'admin_examples_general_field_boolean'  // <- field ID
    );
    register_setting(
        'general',                              // <- group ID
        'admin_examples_general_field_text'     // <- field ID
    );
    register_setting(
        'general',                              // <- group ID
        'admin_examples_general_field_select'   // <- field ID
    );
    register_setting(
        'general',                              // <- group ID
        'admin_examples_general_field_longtext' // <- field ID
    );
}


/*** ADMIN SECTION CALLBACKS ***/
function admin_examples_general_section() {
    echo '<p>This is the general section of the Admin examples plugin</p>';
}


/*** ADMIN FIELD CALLBACKS ***/
function admin_examples_general_field_boolean($args) {
    // Note the ID and the name attribute of the element should match that of the ID in the call to add_settings_field
    $html = '<input type="checkbox" id="admin_examples_general_field_boolean" name="admin_examples_general_field_boolean" value="1" ' . checked(1, get_option('admin_examples_general_field_boolean'), false) . '/>';
     
    // Here, we will take the first argument of the array and add it to a label next to the checkbox
    $html .= '<label for="admin_examples_general_field_boolean"> '  . $args[0] . '</label>';
     
    echo $html;    
}

function admin_examples_general_field_text() {
    $html = '<input type="text" class="regular-text" id="admin_examples_general_field_text" name="admin_examples_general_field_text" value="' . get_option('admin_examples_general_field_text') . '"/>';
     
    echo $html;     
}

function admin_examples_general_field_select() {
    $value = get_option('admin_examples_general_field_select');
    $options = array('aaa', 'bbb', 'ccc');
    
    $html = '<select text" id="admin_examples_general_field_select" name="admin_examples_general_field_select">';
    $html .= '  <option>Válassz egyet</option>';
    foreach ($options as $option) {
        $html .= '  <option ' . selected($value, $option, false) . '>' . $option . '</option>';
    }
    $html .= '</select>';
    
     
    echo $html;     
}

function admin_examples_general_field_longtext() {
    $html = '<textarea id="admin_examples_general_field_longtext" name="admin_examples_general_field_longtext" rows="10" cols="100">';
    $html .= get_option('admin_examples_general_field_longtext');
    $html .= '</textarea>';
     
    echo $html;     
}


