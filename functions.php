<?php
	require_once("./db/db.php");

	class Participant {
		public $id;
		public $name;
		public $city;
		public $car;
		public $attempts;

		public function __construct($id, $name, $city, $car, $attempts) {
			$this->id = $id;
			$this->name = $name;
			$this->city = $city;
			$this->car = $car;
			$this->attempts = $attempts;
		}

		public function getFinalResult() {
			return array_sum($this->attempts);
		}
	}

	function getSortedResults() {
		$db = new DB();
		$results = [];

		// Fill associative array results with "participant id" => [...results]
		foreach ($db->getAttemptsQuery() as $attempt) {
			["id" => $id, "result" => $result] = $attempt;
	
			// If there is no needed key yet, then define it and continue
			if (!array_key_exists($id, $results)) {
				$results[$id] = [$result];
	
				continue;
			}
	
			array_push($results[$id], $result);
		}
	
		// Map through participants array and create new objects of Participants class
		$participants = array_map(
			fn($p) => new Participant($p["id"], $p["name"], $p["city"], $p["car"], $results[$p["id"]]),
			$db->getParticipantsQuery()
		);

		// Sort participants array by their final result
		uasort(
			$participants,
			fn($a, $b) => $b->getFinalResult() <=> $a->getFinalResult()
		);

		return $participants;
	}
?>