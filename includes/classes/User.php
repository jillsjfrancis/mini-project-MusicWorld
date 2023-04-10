<?php
	class User {

		private $con;
		private $usr_uname;

		public function __construct($con, $usr_uname) {
			$this->con = $con;
			return $this->usr_uname = $usr_uname;
		}

		public function getUsername() {
			return $this->usr_uname;
		}

		public function getEmail() {
			$query = mysqli_query($this->con, "SELECT usr_email FROM users WHERE usr_uname='$this->usr_uname'");
			$row = mysqli_fetch_array($query);
			return $row['usr_email'];
		}

		public function getFirstAndLastName() {
			$query = mysqli_query($this->con, "SELECT usr_name as 'name'  FROM users WHERE usr_uname='$this->usr_uname'");
			$row = mysqli_fetch_array($query);
			return $row['name'];
		}

	}
?>
