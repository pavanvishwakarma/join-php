<?php 
include('db.php');



if (isset($_POST['submit'])) {
	$name = $_POST['name'];


	$qry = "INSERT INTO category (name) values ('$name')";

	$res = mysqli_query($conn, $qry);

	if ($res) {
		echo "Success";
		header('location:index.php');
	}
	else {
		echo "failed";
	}
}


if (isset($_POST['send'])) {
	$cat_id = $_POST['cat_id'];
	$subcatName = $_POST['name'];



	$qry = "INSERT INTO sub_category (category_id, subcat_name) values ('$cat_id','$subcatName')";

	$res = mysqli_query($conn, $qry);

	if ($res) {
		echo "Success";
		header('location:index.php');
	}
	else {
		echo "failed";
	}
}
 ?>



<!-- ye sub category show hogi category id ke through -->
<?php 

//$catid = $_GET['catid'];

?>


<div class="container mt-3">
  <h2>Basic Table</h2>
       
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
      </tr>
    </thead>
    <tbody>
<?php 
	$join_qry = "SELECT * FROM sub_category WHERE category_id = $catid";
	$result = mysqli_query($conn, $join_qry);
	while ($row = mysqli_fetch_array($result)) { ?>
		<tr>
        <td><?php echo $row['id'];?></td>
        <td><?php echo $row['subcat_name'];?></td>
      </tr>
	<?php }
		?>

    </tbody>
  </table>
</div>