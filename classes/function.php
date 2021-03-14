<?php 
    class database {

        public static $instance = null;
        public $conn;
        
        function __construct() {
            $this->conn = new mysqli("localhost","root","","lks_fotografi") or die($this->conn->error);
            session_start();
        }

        // singleton pattern : mencegah koneksi berulang
        public static function getInstance() {
            if(!isset( self::$instance)) {
                self::$instance = new database();
            }

            return self::$instance;
        }

        function login($data) {
            $email = $data['email'];
            $pass = $data['password'];
            $cek_email = $this->conn->query("SELECT * FROM user WHERE email='$email' ");
            // cek email
            if( mysqli_num_rows($cek_email) === 1 ) {
                $row = $cek_email->fetch_all(MYSQLI_BOTH)[0];
                // cek password
                if(password_verify($pass,$row['password'])) {
                    $_SESSION['login'] = true;
                    $_SESSION['role'] = $row['role'];
                    $_SESSION['id_user'] = $row['id'];
                    echo "<script>alert('berhasil login');document.location.href='../index.php';</script>";
                    exit;
                }

            }
            // jika gagal
            header("location:../index.php?page=login&notif=true");
        }

        function logout() {
            session_destroy();
            header("location:../index.php");
        }

        function fetch($table,$where = null) {
            $sql = "SELECT * FROM $table";
            if($where != null){
                $sql .= " WHERE $where";
            }
            $query = $this->conn->query($sql) or die ($this->conn->error);
            return $query->fetch_all(MYSQLI_BOTH);
        }

        function insert($table,$data = null){
            
            $sql = "INSERT INTO $table";
            $column = null;
            $value = null;
            foreach($data as $key => $isi) {
                $column .= ",".$key;
                $value .= ", '".$isi."'";
            }
            // column
            $sql .= "(".substr($column,1).")";
            // value
            $sql .= " VALUES(".substr($value,1).")";
            
            $query = $this->conn->prepare($sql) or die ($this->conn->error);
            $query->execute();

        }
        public function upload() {
            
            // photo
                $nameFile = $_FILES['foto']['name'];
                $size = $_FILES['foto']['size'];
                $error = $_FILES['foto']['error'];
                $tmpName = $_FILES['foto']['tmp_name'];

                if($error === 4){
                    echo "<script>
                            alert('pilih gambar terlebih dahulu');
                        </script>";
                    return false;
                }

                $extensionValid = ['jpg','jpeg','png'];
                $photoExtension = explode('.',$nameFile);
                $photoExtension = strtolower(end($photoExtension));

                if( !in_array($photoExtension,$extensionValid)){
                    echo "<script>
                            alert('tambahkan gambar yg berformat jpg/jpeg/png');
                        </script>";
                    return false;
                }

                if($size > 1400000){
                    echo "<script>
                            alert('masukkan gambar dengan ukuran dibawah 1MB');
                        </script>";
                    return false;
                }
                $newFileName = uniqid();
                // .= : untuk menyambung string 
                $newFileName .='.';
                $newFileName  .=$photoExtension;
                move_uploaded_file($tmpName,"../asset/images/upload/".$newFileName);
                return $newFileName;
        }

        function update($table,$column = null,$where = null) {
            $sql = "UPDATE $table SET ";
            $set = null;
            foreach($column as $key => $values){
                $set .= ", ".$key." = '".$values."'";
            }
            $sql .= substr($set,1). " WHERE $where";
            $query = $this->conn->prepare($sql) or die($this->conn->error);
            $query->execute();
            
        }

        function delete($table,$where = null) {
            $sql = "DELETE FROM $table WHERE $where";
            $query = $this->conn->prepare($sql) or die ($this->conn->error);
            $query->execute();
        }
        
    }
?>