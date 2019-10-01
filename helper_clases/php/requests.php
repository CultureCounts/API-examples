<?php
include_once('CCapi.php');

// Create class object
$obj = new CCRequest();

// Perform various functions

$login = [
	$obj->ccURL("login"),
	$obj->login()
];
$status = [
	$obj->ccURL("status"),
	$obj->get("status")
];
$view_evaluations = [
	$obj->ccURL("evaluation"),
	$obj->get("evaluation")
];
$add_evaluation = [
	$obj->ccURL("evaluation"),
	$obj->post("evaluation", array("name" => "test evaluation"))
];
$eval_data = json_decode($add_evaluation[1]);
$eval_id = $eval_data->data->id;
$view_specific_evaluation = [
	$obj->ccURL("evaluation", $eval_id),
	$obj->get("evaluation", $eval_id)
];
$view_evaluations_2 = [
	$obj->ccURL("evaluation"),
	$obj->get("evaluation")
];
$view_evaluation_shares = [
	$obj->ccURL("share", false, array("object_id" => $eval_id, "object_type" => "evaluation", "include_organisation_shares" => true)),
	$obj->get("share", false, array("object_id" => $eval_id, "object_type" => "evaluation", "include_organisation_shares" => true))
];


$data = array(
	"Login Using Apikey" => $login,
	"User Status" => $status,
	"Evaluations Apikey can view" => $view_evaluations,
	"Add Evaluation with name of test evaluation" => $add_evaluation,
	"Evaluations After Adding a new Evaluation" => $view_evaluations_2,
	"View specifc evaluation" => $view_specific_evaluation,
	"Evaluation shares" => $view_evaluation_shares,
)

?>

<!DOCTYPE html>
<html>
<head>
	<title>CC Example</title>
	<link rel="stylesheet" href="assets/css/jjsonviewer.css">
</head>
<body>
<?php foreach ($data as $key => $value) { ?>
 	<h3><?php echo $key; ?></h3>
 	<p>Response of Query: <?php echo $value[0]; ?></p>
 	<pre><?php echo $value[1]; ?></pre>
<?php } ?>
</body>
<script type="text/javascript" src="assets/js/lib/jquery.js"></script>
	<script type="text/javascript" src="assets/js/jjsonviewer.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$("pre").each(function(){
				let val = $(this).html();
				$(this).jJsonViewer(val);
			});

			$(".object .expanded").click();
		});
	</script>
</html>
