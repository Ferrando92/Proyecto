<?php

$result = [
	"passed" => 0,
	"failed" => 0
];

foreach ($this->unit->result() as $key => $value) {
	if($value["Result"] === "Passed"){
		$result["passed"] += 1;
	}else{
		$result["failed"] += 1;
	}
}

echo "<span style='color: green'>Passed: {$result["passed"]}</span>
		<span style='color: red'>Failed: {$result["failed"]}</span>
		Total: " . ($result["passed"] + $result["failed"]);

echo $this->unit->report();