<?php
include 'init.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
  $id = $_GET['id'];

  $query = "SELECT * FROM mhahasiwa WHERE id='$id'";
  $result = mysqli_query($koneksi, $query);
  $data = mysqli_fetch_assoc($result);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id = $_POST['id'];
  $nama = $_POST['nama'];
  $nim = $_POST['nim'];
  $jk = $_POST['jk'];
  $alamat = $_POST['alamat'];

  $query = "UPDATE mahasiswa SET nama='$nama',nim='$nim', jk='$jk',alamat='$alamat' WHERE id='$id'";
  mysqli_query($koneksi, $query);

  header('Location: pertemuan2.php');
  exit;
}
?>

<style>
  body {
    font-family: Arial, sans-serif;
    margin: 10px 100px 10px 100px;
  }

  h2 {
    color: #333;
  }

  .button {
    width: auto;
    height: auto;
    border-radius: 3px;
    border: none;
    padding: 5px;
    background-color: #4FC3F7;
  }

  .button:hover {
    background-color: #90A4AE;
    cursor: pointer;
  }

  .button-kembali {
    background-color: #fff;
  }


  form {
    display: flex;
    flex-direction: column;
    gap: 20px;
  }

  form .div {
    display: flex;
    align-items: center;
    gap: 30px;
    height: 30px;
  }

  form div label {
    width: 200px;


  }

  form div .input {

    width: 100%;
    height: 30px;
    border-radius: 5px;
    border: 1px #90A4AE solid;
  }

  form div .input:focus {
    background-color: #E1F5FE;
    outline: none;
    border: 1px #03A9F4 solid;
  }



  a {
    text-decoration: none;
    color: black;

  }
</style>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Mahasiswa</title>
</head>

<body>
  <div>
    <div>
      <h2>Edit Data Mahasiswa</h2>
    </div>
    <div>
      <form action="edit.php" method="post">
        <input type="hidden" name="id" value="<?= $data['id']; ?>">
        <div class="div">
          <label for="inputNama">Nama </label>
          <input class="input" id="inputNama" type="text" value="<?= $data['nama']; ?>" name="nama" required>
        </div>
        <div class="div">
          <label for="inputNim">NIM</label>
          <input class="input" id="inputNim" type="number" value="<?= $data['nim']; ?>" name="nim" required>
        </div>

        <div class="div">
          <label for="inputJk">Jenis Kelamin</label>
          <select id="inputJk" class="input" name="jk">
            <option value="Laki-laki" <?php if ($data['jk'] == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
            <option value="Perempuan" <?php if ($data['jk'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
          </select>
        </div>

        <div class="div">
          <label for="inputAlamat">Alamat</label>
          <input class="input" id="inputAlamat" type="text" value="<?= $data['alamat']; ?>" name="alamat" required>
        </div>

        <div>
          <button class="button" type="submit"> Update </button>
          <button class=" button button-kembali" type="button"> <a href="pertemuan2.php">Kembali </a> </button>
        </div>
      </form>
    </div>
  </div>
</body>

</html>