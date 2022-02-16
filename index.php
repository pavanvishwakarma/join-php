<!DOCTYPE html>
<html lang="en">
<head>
  <title>JOIN Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Category form</h2>
  <form action="insert.php" method="post">
    <div class="mb-3 mt-3">
      <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
  </form>
</div>



<?php 
include('db.php');


 ?>





<div class="container mt-3">
  <h2>Sub Category form</h2>
  <form action="insert.php" method="post">
  	<div class="mb-3 mt-3">
  		<select class="form-control" name="cat_id">
  			<option selected hidden disabled>Select Category</option>
  			<?php 
			$select_qry = "SELECT * FROM category";
			$result = mysqli_query($conn, $select_qry);
			while ($row = mysqli_fetch_array($result)) { ?>
				<option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
			<?php }
  			?>
  			
  		</select>
    </div>
    <div class="mb-3 mt-3">
      <input type="text" class="form-control" placeholder="Enter Name" name="name">
    </div>
    <button type="submit" class="btn btn-primary" name="send">Submit</button>
  </form>
</div>



<div class="container mt-3">
  <h2>Basic Table</h2>
       
  <table class="table">
    <thead>
      <tr>
        <th>S no.</th>
        <th>Name</th>
        <th>Main Category</th>
      </tr>
    </thead>
    <tbody>
<?php 
	$join_qry = "SELECT * FROM category INNER JOIN sub_category ON category.id = sub_category.category_id";
	$result = mysqli_query($conn, $join_qry);
	$i = 1;
	while ($row = mysqli_fetch_array($result)) { ?>

		
		<tr>
        <td><?php echo $i++;?></td>
        <td><?php echo $row['subcat_name'];?></td>
        <td><?php echo $row['name'];?></td>
        <!--
        	ye wala next page pr subcategory show karwane ke liye hai
         <td>
        	<a href="insert.php?catid=<?php echo $row['category_id'];?>">
        		<?php echo $row['name'];?>
        	</a>
        </td> -->
      </tr>

	<?php  }
		?>
      
      

    </tbody>
  </table>
</div>

</body>
</html>
