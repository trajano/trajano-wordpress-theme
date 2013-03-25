<?php
/**
 * This is responsible for dispatching to the templates in the content folder.
 */
if (is_single()) {
  require("content/single.php");
} else {
  require("content/masonry.php");
}
