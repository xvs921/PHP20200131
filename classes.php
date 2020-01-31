<?php
class Adatbazis{
	public $servername = "localhost:3306";
	public $username = "root";
	public $password = "";
	public $dbname = "hangszerek";
	public $conn = NULL;
	public $sql = NULL;
	public $result = NULL;
	public $row = NULL;
	
	public function __construct() { self::kapcsolodas(); }
	public function __destruct() { self::kapcsolatbontas(); }
    
    public function kapcsolodas() {
		$this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		if ($this->conn->connect_error) {
			die ("Connection failed: " . $this->conn->connect_error);
		}
		$this->conn->query("SET NAMES 'UTF8';");
	}

	public function insert() {
        $this->sql = "INSERT INTO hangszer (ar,tipus,marka,gyartasiIdo)
                        VALUES ('".$_GET["input_ar"]."',
                                '".$_GET["input_tipus"]."',
                                '".$_GET["input_marka"]."',
                                ".$_GET["gyartasiIdo"].")";
        $this->conn->query($this->sql);
    }
	
	public function list() {
        $this->sql = "SELECT * FROM hangszer";
		$this->result = $this->conn->query($this->sql); ?>

        <table>
        <tr>
            <th>Ár</th>
            <th>Típus</th>
            <th>Márka</th>
            <th>Gyártási idő</th>
        </tr> <?php
		if ($this->result->num_rows > 0) {
			while($this->row = $this->result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $this->row["ar"]; ?></td>
                    <td><?php echo $this->row["tipus"]; ?></td>
                    <td><?php echo $this->row["marka"]; ?></td>
                    <td><?php echo $this->row["gyartasiIdo"]; ?></td>
					<td>
                        <button onclick=torles(<?php echo $this->row["id"]; ?>)>Törlés</button>
                    </td> <?php
			}
        }
        else { ?>
            <tr><td colspan="5">Nincs még rögzített felhasználó</td></tr> <?php
        } ?>
        </table> <?php
	}
    
    public function delete($id) {
        $this->sql = "DELETE FROM hangszer WHERE id=" . $id;
        $this->conn->query($this->sql);
    }
		public function update($id,$ar,$tipus,$marka,$gyartasiIdo)
	{
		$this->sql = "Update hangszer SET ar=".$ar.",  tipus =". $tipus.", marka=".$marka.", gyartasiIdo=".$gyartasiIdo.", WHERE id=" . $id;
        $this->conn->query($this->sql);
	}
    
	public function kapcsolatbontas() {
		$this->conn->close();	
	}
} ?>	
