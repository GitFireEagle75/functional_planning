<html>
<?php
$Wachen = 'FW1300';
?>
    <head>
<title>Register</title>
</head>
<body>
	<script>
        function show(){
            var option = document.getElementById("Direktion").value;
            if(option == "1")
                  {
            	<label>Dienststelle:<select id="Dienststelle" name="Dienststelle">
            	<option value="1">FW 1300</option>
		        <option value="2">FW 2200</option>
				<option value="3">FW 2400</option>
				<option value="4">FW 2600</option>
				<option value="5">FW 6100</option>
				<option value="6">FW 6300</option>
				<option value="7">FW 6600</option>
				<option value="8">FW 2300</option>
					;
                  }
            if(option == "2")
                  {
            	<label>Dienststelle:<select id="Dienststelle" name="Dienststelle">
            	<option value="1">FW 4400</option>
				<option value="2">FW 4500</option>
                  }
            if(option == "3")
                  {
            	<label>Dienststelle:<select id="Dienststelle" name="Dienststelle">
            	<option value="1">FW 1100</option>
				<option value="2">FW 1200</option>
                  }
        }
    </script>
	<form action="#" method="post">
		
			<label>Direktion:</label>
			<table>
			<tr><td><select id="Direktion" onchange="show()">
					<!--onchange show methos is call-->
					<option value="1">Nord</option>
					<option value="2">Süd</option>
					<option value="3">West</option>
			</select> <label>Dienststelle:<select id="Dienststelle"
					name="Dienststelle"></select></label></td></tr>
		</table>
		<br /> <input type="submit" value="Sign Up">
	</form>
</body>
</html>