<?php
/*
 * @Author: Matthew Auld 
 * @Date: 2019-03-25 16:21:24 
 * @Last Modified by: Matthew Auld
 * @Last Modified time: 2019-03-25 17:31:31
 * Copyright 2019 JumpButton North - All rights reserved. 
 */


 // This is the array of people I was provided to create a dynamic table in PHP.
$people = array(
	array('id'=>1, 'first_name'=>'John', 'last_name'=>'Smith', 'email'=>'john.smith@hotmail.com'),
	array('id'=>2, 'first_name'=>'Paul', 'last_name'=>'Allen', 'email'=>'paul.allen@microsoft.com'),
	array('id'=>3, 'first_name'=>'James', 'last_name'=>'Johnston', 'email'=>'james.johnston@gmail.com'),
	array('id'=>4, 'first_name'=>'Steve', 'last_name'=>'Buscemi', 'email'=>'steve.buscemi@yahoo.com'),
	array('id'=>5, 'first_name'=>'Doug', 'last_name'=>'Simons', 'email'=>'doug.simons@hotmail.com')
);

// Being as this was an extremely simple task, I decided to have a little fun with it and made it fancy using Bootstrap v4 for styling the page/table.
// Then I added a simple splash of jQuery and SweetAlert2 to make the buttons dynamic but fixed to the PHP data. Also the fancy "Alert" that was requested.

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<title>Names in a table with an alert.</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha256-YLGeXaapI0/5IgZopewRJcFXomhRMlYYjugPLSyNjTY=" crossorigin="anonymous" />
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="table-responsive">
					<table class="table table-bordered table-striped">
						<tr>
							<th>#</th>
							<th>First name</th>
							<th>Last name</th>
							<th>Email</th>
							<th>Tools</th>
						</tr>
						<?php
						foreach ($people as $person) {
							echo"<tr>";
							print("<td>{$person["id"]}</td>");
							print("<td>{$person["first_name"]}</td>");
							print("<td>{$person["last_name"]}</td>");
							print("<td>{$person["email"]}</td>");
							print("<td><button data-id=\"{$person["id"]}\">View Details</button></td>");
							echo"</tr>";
						}
						?>
					</table>
				</div>
			</div>
		</div>
	</div>
	<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
	<script type="text/javascript">
	const people = <?php echo json_encode($people,true); ?>;

	$(document).ready(function() {
		$('button').each(function() {
			$(this).click(() => {
				const id = parseInt($(this).data("id"));
				console.log(id);
				let person = people.filter(a => {
					return a.id === id;
				})[0];
				if (person) {
					Swal.fire({
						titleText: person.first_name + " " + person.last_name,
						text: person.email,
						type: "info"
					})
				}
			});
		})
	});
	</script>
</body>

</html>