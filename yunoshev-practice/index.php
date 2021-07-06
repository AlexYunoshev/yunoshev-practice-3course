<?php
include 'header.php';
?>

<section>
  <div class="input-url-div">
    <form action="process.php" method="post" target="_blank" class="input-url-form">
      <div class="form-row">
        <span>URL:</span>
        <input required type="text" name="url">
      </div>
      <div>
        <input type="submit" value="Verify" name="button-verify">
      </div>
    </form>
  </div>
</section>

<?php
include 'footer.php';
?>