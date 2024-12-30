<!DOCTYPE html>
<html>
<head>
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>NetFood</title>
	<style>
body {font-family: Arial, Helvetica, sans-serif;}

.navbar {
  width: 100%;
  background-color: #3b424f;
  overflow: auto;
}

.navbar a {
  float: left;
  padding: 12px;
  color: white;
  text-decoration: none;
  font-size: 17px;
   border-radius: 4px;
}

.navbar a:hover {
  background-color: #04AA6D;

}

.active {
  background-color: #0087bd;
}

@media screen and (max-width: 768px) {
  .navbar a {
    float: none;
    display: block;
  }
}
body {
  background-color: #313742;
}

/* Membuat halaman menjadi responsif */
@media only screen and (max-width: 768px) {
  body {
    padding: 10px;
  }
}
/* width */
::-webkit-scrollbar {
  width: 20px;
}

/* Track */
::-webkit-scrollbar-track {
  box-shadow: inset 0 0 5px grey; 
  border-radius: 10px;
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: red; 
  border-radius: 10px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #b30000; 
}
.search-form {
  float: right;
}

.search-form input[type="text"] {
  border: none;
  padding: 8px;
  font-size: 16px;
  background-color: #fff;
  border-radius: 5px 0 0 5px;
  width: 200px;
}

.search-form button[type="submit"] {
  border: none;
  padding: 8px;
  background-color: #0087bd;
  color: #fff;
  font-size: 16px;
  border-radius: 0 5px 5px 0;
  cursor: pointer;
}

.search-form button[type="submit"]:hover {
  background-color: #6f00ff;
}

		table {
			border-collapse: collapse;
			width: 100%;
			background-color: #3b424f;
			text-decoration-color: white;
			font-family: arial;
			color: #dbdbff;
	
		}
		th{
			padding: 8px;
			text-align: left;
			background-color: #0087bd;
			color: white;
		} 

		td {
			padding: 8px;
			text-align: left;
			border-bottom: 1px solid black;

		}
		.bold-text {
  		color: #cfcfcf;
		}
		tr:hover {
			background-color: #170b2a;

		}
	  h2 {
    color: #333;
    font-family: Arial, sans-serif;
    text-align: center;
    margin: 0.6% auto;
    color: white;
  }

  /* Membuat teks menjadi responsif */
  @media screen and (max-width: 768px) {
    h2 {
      margin: 20px auto;
      font-size: 24px;
    }
  }
		

		  /* CSS untuk membuat tombol login floating di pojok kanan atas */
        .login-button {
            position: fixed;
            top: 10px;
            right: 10px;
            background-color: #0087bd;
            color: white;
            padding: 7px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .login-button:hover {
            background-color: #6f00ff;
            text-decoration: none;
       
    </style>

</head>
<body>
<div class="navbar">
  <a class="active" href="index.php"><i class="fa fa-fw fa-home"></i> Home</a> 
  <h2>ABOUT US</h2>
</div>
		<!-- Membuat form pencarian -->
	</div>
	<table style="color: white;">
		<thead>
			<tr>
				<th><center>Nama Ownwer</th></center>
				<th><center>NPM</th></center>			
			</tr>
		</thead>
<br></br>
			<tr>	
				<td><div class="bold-text" align="center">Danu Subma Wijaya</td>
				<td><div class="bold-text" align="center">10122331</td>
			<tr>				
				<td><div class="bold-text" align="center">Rosa Linda Salsabila</td>
				<td><div class="bold-text" align="center">11122313</td>
			</tr>
			<tr>	
			<td><div class="bold-text" align="center">Mifta Rizaldirahmat</td>
				<td><div class="bold-text" align="center">10122764</td>
			</tr></center>
		</tbody>
	</table>
</body>
</html>