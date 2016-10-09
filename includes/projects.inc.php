<?php>

function createProject($conn) {
	if (isset($_POST['opretProjekt'])) {
		
		$PName = $_POST['Project_Name'];
		$PDesc = $_POST['Project_Description'];
		$PStart = $_POST['Project_Startdate'];
		$PEnd = $_POST['Project_Enddate'];
		$CID = $_SESSION['id'];

		$sql ="INSERT INTO Project (Project_Name, Project_Description, Project_Startdate, Project_Enddate, Client_id) VALUES ('$PName', '$PDesc', '$PStart', '$PEnd', $CID)";	
		$result = mysqli_query($conn, $sql);
}

function editProject($conn) {

	if (isset($_POST['projectSubmit'])) {
		$id = $_POST['id'];
		$PName = $_POST['Project_Name'];
		$PDesc = $_POST['Project_Description'];
		$PStart = $_POST['Project_Startdate'];
		$PEnd = $_POST['Project_Enddate'];
		$result = mysqli_query($conn, $sql);
		$sql = "UPDATE Project SET Project_Name='$PName' AND Project_Description='$PDesc' AND Project_Startdate='$PStart' AND Project_Enddate='$PEnd' WHERE id='$id'";
		
	}
}

function deleteProject($conn) {
	if (isset($_POST['projectSubmit'])) {

}

?>


