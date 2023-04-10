<?php
	class Album {

		private $con;
		private $alb_id;
		private $alb_name;
		private $art_id;
		private $gn_id;
		private $alb_cvrimg;

		public function __construct($con, $alb_id) {
			$this->con = $con;
			$this->alb_id = $alb_id;

			$query = mysqli_query($this->con, "SELECT * FROM albums WHERE alb_id='$this->alb_id'");
			$album = mysqli_fetch_array($query);

			$this->alb_name = $album['alb_name'];
			$this->art_id = $album['ar_id'];
			$this->gn_id = $album['gn_id'];
			$this->alb_cvrimg = $album['alb_cvrimg'];


		}

		public function getTitle() {
			return $this->alb_name;
		}

		public function getArtist() {
			return new Artist($this->con, $this->art_id);
		}

		public function getGenre() {
			return $this->gn_id;
		}

		public function getArtworkPath() {
			return $this->alb_cvrimg;
		}

		public function getNumberOfSongs() {
			$query = mysqli_query($this->con, "SELECT s_id FROM songs WHERE alb_id='$this->alb_id'");
			return mysqli_num_rows($query);
		}

		public function getSongIds() {

			$query = mysqli_query($this->con, "SELECT * FROM songs WHERE alb_id='$this->alb_id' ORDER BY albumOrder ASC");

			$array = array();

			while($row = mysqli_fetch_array($query)) {
				array_push($array, $row['s_id']);
			}

			return $array;

		}






	}
?>
