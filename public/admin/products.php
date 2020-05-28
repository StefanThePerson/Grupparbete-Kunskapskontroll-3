<?php
// Koppling till databas
//Ger även error om filen inte kan hittas
require('../../src/config.php');
require(SRC_PATH . 'dbconnect.php');
$pageTitle = 'products';
$pageId = 'products';

if (isset($_POST['deleteProductBtn'])) {
    deleteProductById($_POST['id']);
  }

$products = fetchAllProducts();



?>
<?php include('layout/header.php'); ?>
<!-- Sidans/Dokumentets huvudsakliga innehåll -->
<div id="content">
  <?= $errorMsg ?>
  <article class="border">
    <h1>Product List</h1>
    
    <table id="product_table">
		<thead>
			<tr>
				<th>title</th>
				<th>price</th>
				<th>description</th>
				<th>product image url</th>
				<th>product image</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($products as $key => $product) { ?>
				<tr>
					<td><?=htmlentities($product['title'])?></td>
					<td><?=htmlentities($product['price'])?></td>
					<td><?=htmlentities($product['description'])?></td>
					<td><?=htmlentities($product['img_url'])?></td>
					<td><img src="<?=htmlentities($product['img_url'])?>"></td>
					<td>
						<form action="edit_product.php" method="GET">
                            <input type="hidden" name="id" value="<?=$product['id']?>">
							<input type="submit" name="" value="Edit">
						</form>
					</td>
					<td>
						<form action="" method="POST">
							<input type="hidden" name="id" value="<?=$product['id']?>">
							<input type="submit" name="deleteProductBtn" value="Delete">
						</form>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>    
  </article>
</div>

<?php include('layout/footer.php'); ?>