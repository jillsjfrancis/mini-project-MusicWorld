<?php
	class Artist {

		private $con;
		private $id;

		public function __construct($con, $id) {
			$this->con = $con;
			$this->id = $id;
		}

		public function getId() {
			return $this->id;
		}

		public function getName() {
			$artistQuery = mysqli_query($this->con, "SELECT art_name FROM artists WHERE art_id='$this->id'");
			$artist = mysqli_fetch_array($artistQuery);
			return $artist['art_name'];
		}

		public function getSongIds() {

			$query = mysqli_query($this->con, "SELECT s_id FROM songs WHERE art_id='$this->id' ORDER BY plays ASC");

			$array = array();

			while($row = mysqli_fetch_array($query)) {
				array_push($array, $row['s_id']);
			}

			return $array;

		}
	}
?>
