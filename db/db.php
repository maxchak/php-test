<?php
  // Defining DB class to work with *database* (JSON)
  class DB {
    private function getJSONContent($path) {
      return json_decode(
        file_get_contents($path), 
        true
      );
    }

    public function getParticipantsQuery() {
      return $this->getJSONContent(__DIR__."/data/data_cars.json");
    }
  
    public function getAttemptsQuery() {
      return $this->getJSONContent(__DIR__."/data/data_attempts.json");
    }
  }
?>