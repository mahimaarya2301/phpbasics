<?php 
	//Class Declaration
	class Db{
		//1.Property
		
		public $hostname='localhost';//Declaration and Initialization
		public $mysql_user='root';//Declaration and Initialization
		public $mysql_password='';//Declaration and Initialization
		public $db_name='phpbasics_db';//Declaration and Initialization
		public $con;//Declaration
		
		//2.Constructor
		public function __construct(){
			//1.DB Connection Open
			$this->con=mysqli_connect($this->hostname,$this->mysql_user,$this->mysql_password,$this->db_name);
		}
		//3.Method
		public function getContacts(){
			//2.Build the query
			$sql="SELECT * FROM contacts_tbl";
			//3.Execute the query
			$result=mysqli_query($this->con,$sql);
			
			//var_dump($result);
			
			$data=[];
			//4.Display the query
			while($row=mysqli_fetch_assoc($result)){
				$data[]=$row;
			}
			
			//5.DB Connection Close
			mysqli_close($this->con);
			
			
			return $data;
		}
	}
	//Create an external object of the class
	$obj = new Db();
	//Access the member using -> member selection operator
	$data=$obj->getContacts();

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Bootstrap 4 Example</title>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
	</head>
	<body>

		<div class="container">
			<ul class="list-group">
				<?php
					foreach($data as $d){
						//var_dump($d);
						echo '<li class ="list-group-item">'.$d['fname'].''.$d['lname'].''.$d['mobno'].'</li>';
					}
				?>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	</body>
</html>

