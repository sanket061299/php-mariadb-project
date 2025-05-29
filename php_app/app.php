<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Simple User List</title>
	<script src="https://cdn.tailwindcss.com"></script>
	<style>
    	body { @apply bg-gray-100 text-gray-800 font-sans; }
    	.container { @apply max-w-2xl mx-auto p-6 bg-white shadow-lg rounded-lg my-8; }
    	.table-header { @apply px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider; }
    	.table-cell { @apply px-6 py-4 whitespace-nowrap text-sm text-gray-900; }
	</style>
</head>
<body>

	<div class="container">
    	<h1 class="text-3xl font-bold text-center mb-6">User List from MariaDB</h1>

    	<?php
    	// --- Database Configuration (UPDATE THESE VALUES) ---
      $servername = getenv("DB_HOST");
      $username   = getenv("DB_USER");
      $password   = getenv("DB_PASS");
      $dbname     = getenv("DB_NAME");

    	// Create connection
    	$conn = new mysqli($servername, $username, $password, $dbname);

    	// Check connection
    	if ($conn->connect_error) {
        	die("<div class='bg-red-100 text-red-800 border border-red-400 p-4 rounded-md'>
             	<p><strong>Database Connection Failed!</strong></p>
             	<p>Error: " . $conn->connect_error . "</p>
             	<p>Please check:</p>
             	<ul class='list-disc list-inside mt-2'>
                 	<li>Database server IP ($servername) is correct.</li>
                 	<li>MariaDB is running on the database server.</li>
                 	<li>Firewall on database server allows port 3306.</li>
                 	<li>MariaDB's 'bind-address' allows remote connections.</li>
                 	<li>PHP user, password, and host are correct in MariaDB.</li>
                 	<li>SELinux on web server allows HTTP to connect to network DB.</li>
             	</ul>
             	</div>");
    	}

    	echo "<p class='text-center text-green-700 mb-4'>Successfully connected to MariaDB!</p>";

    	// Fetch Data from 'users' table
    	$sql = "SELECT id, name, email, registration_date FROM users ORDER BY id DESC";
    	$result = $conn->query($sql);

    	if ($result && $result->num_rows > 0) {
        	echo "<div class='overflow-x-auto shadow-md rounded-lg'>";
        	echo "<table class='min-w-full divide-y divide-gray-200'>";
        	echo "<thead class='bg-gray-50'>";
        	echo "<tr>";
        	echo "<th class='table-header'>ID</th>";
        	echo "<th class='table-header'>Name</th>";
        	echo "<th class='table-header'>Email</th>";
        	echo "<th class='table-header'>Registration Date</th>";
        	echo "</tr>";
        	echo "</thead>";
        	echo "<tbody class='bg-white divide-y divide-gray-200'>";
        	// Output data of each row
        	while($row = $result->fetch_assoc()) {
            	echo "<tr>";
            	echo "<td class='table-cell font-medium'>" . htmlspecialchars($row["id"]) . "</td>";
            	echo "<td class='table-cell'>" . htmlspecialchars($row["name"]) . "</td>";
            	echo "<td class='table-cell'>" . htmlspecialchars($row["email"]) . "</td>";
            	echo "<td class='table-cell'>" . htmlspecialchars($row["registration_date"]) . "</td>";
            	echo "</tr>";
        	}
        	echo "</tbody>";
        	echo "</table>";
        	echo "</div>";
    	} else {
        	echo "<p class='text-center text-gray-600 p-4 border border-gray-300 rounded-md bg-gray-50'>No users found in the database.</p>";
    	}

    	// Close connection
    	$conn->close();
    	?>
	</div>

</body>
</html>
