<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
</html>
<?php
class Adatbazis{
	public $servername = "localhost:3307";
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

        <table class="table table-hover">
        <tr>
            <th>Ár</th>
            <th>Típus</th>
            <th>Márka</th>
            <th>Gyártási idő</th>
            <th>Törlés</th>
            <th>Módosítás</th>
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
                    </td>
                    <td>
                <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Módosítás
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Módosítás</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  	<div style="padding: 2%; margin:auto">
		<input type="number" id="input_upd_ar" placeholder="Ár" value="<?php echo $this->row["ar"]; ?>"><br /><br />
		<input type="text" id="input_upd_tipus" placeholder="Típus" value="<?php echo $this->row["tipus"]; ?>"><br /><br />
		<input type="text" id="input_upd_marka" placeholder="Márka" value="<?php echo $this->row["marka"]; ?>"><br /><br />
		<input type="date" id="input_upd_gyartasiIdo" placeholder="Gyártási idő" value="<?php echo $this->row["gyartasiIdo"]; ?>"><br /><br />
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="update(<?php echo $this->row['id']; ?>)" data-dismiss="modal">Mentés</button>
      </div>
    </div>
  </div>
</div>
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
    public function update($id)
	{
        $this->sql = "UPDATE hangszer SET ar='".$_GET["input_ar"]."', tipus='".$_GET["input_tipus"]."', marka='".$_GET["input_marka"]."', gyartasiIdo='".$_GET["input_gyartasiIdo"]."'
                        WHERE id=".$id;
        $this->conn->query($this->sql);
	}
    
	public function kapcsolatbontas() {
		$this->conn->close();	
	}
} ?>	