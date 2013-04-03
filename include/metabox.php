<?php
function twp_magazine_appearance_box($post)
{
  wp_nonce_field(plugin_basename(__FILE__), "twp_nonce");
  $columns = get_post_meta($post->ID, "twp_columns", true);
  $columns_check_1 = $columns_check_2 = $columns_check_3 = "";
  if ($columns == 2) {
    $columns_check_2 = "checked='checked'";
  } elseif ($columns == 3) {
    $columns_check_3 = "checked='checked'";
  } else {
    $columns_check_1 = "checked='checked'";
  }

  ?>
  <p><?php _e("Number of columns to use on display") ?></p>
  <div>
    <input type="radio" value="1" name="twp_columns" id="twp-one-column"
        <?php echo $columns_check_1 ?> />
    <label for="twp-one-column"><?php _e("Single column")?></label>
  </div>
  <div>
    <input type="radio" value="2" name="twp_columns" id="twp-two-column"
        <?php echo $columns_check_2 ?> />
    <label for="twp-two-column"><?php _e("Two columns")?></label>
  </div>
  <div>
    <input type="radio" value="3" name="twp_columns" id="twp-three-column"
        <?php echo $columns_check_3 ?> />
    <label for="twp-three-column"><?php _e("Three columns")?></label>
  </div>

<?php

}

function twp_magazine_appearance_box_save($post_id)
{
  if ('page' == $_POST['post_type']) {
    if (!current_user_can('edit_page', $post_id)) {
      return;
    }
  } else {
    if (!current_user_can('edit_post', $post_id)) {
      return;
    }
  }
  if (!isset($_POST["twp_nonce"]) ||
      !wp_verify_nonce($_POST["twp_nonce"], plugin_basename(__FILE__))
  ) {
    return;
  }
  update_post_meta($_POST['post_ID'], "twp_columns", sanitize_text_field($_POST["twp_columns"]));
}

function twp_add_meta_boxes()
{
  add_meta_box("twp-magazine-appearance", _("Magazine appearance"), 'twp_magazine_appearance_box', "post", "side");
}

add_action('add_meta_boxes', 'twp_add_meta_boxes');
add_action("save_post", "twp_magazine_appearance_box_save");
