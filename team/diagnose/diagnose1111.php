<?php
if (isset($_POST['worries']) && is_array($_POST['worries'])) {
  foreach( $_POST['worries'] as $value ){
      echo "{$value}, ";
  }
}
echo '</p>';
?>