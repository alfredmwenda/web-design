<?php
	if (isset($_POST['first_name'])) {
		$first_name = $_POST['first_name'];
	}
	if (isset($_POST['last_name'])) {
		$last_name = $_POST['last_name'];
	}
	if (isset($_POST['title'])) {
		$title = $_POST['title'];
	}
    if (isset($_POST['Name_of_the_product'])) {
		$Name_of_the_product = $_POST['Name_of_the_product'];
	}
    $Location = $_POST['Location'];
    $ID_no = $_POST['ID_no'];
	if (isset($_POST['email'])) {
        $email = $_POST['email'];
	}
	if (isset($_POST['quantity'])) {
        $quantity = $_POST['quantity'];
	}
	if (isset($_POST['number'])) {
		$number = $_POST['number'];
	}

	// Database connection
	$conn = new mysqli('localhost','root','','project');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(first_name, last_name, title, Name_of_the_product, Location, ID_no, email, quantity, number) values(?,?, ?, ?, ?, ?, ?,?,?)");
		$stmt->bind_param("sssssisis", $first_name, $last_name, $title, $Name_of_the_product, $Location, $ID_no, $email, $quantity, $number);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		echo "Thanks for shopping with us";
		$stmt->close();
		$conn->close();
	}
?>