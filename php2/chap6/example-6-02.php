<form method="POST" action="catalog.php">
<input type="text" name="product_id">
<select name="category">
<option value="ovenmitt">Pot Holder</option>
<option value="fryingpan">Frying Pan</option>
<option value="torch">Kitchen Torch</option>
</select>
<input type="submit" name="submit">
</form>
Here are the submitted values:

product_id(post): <?php print isset($_POST['product_id'] ? $_POST['product_id'] : ''; ?>
<br/>
category(post): <?php print isset($_POST['category'] ? $_POST['category']; ?>
<br/>
product_id(post): <?php print $isset($_GET['product_id'] ? $_GET['ptoduct
<br/>
