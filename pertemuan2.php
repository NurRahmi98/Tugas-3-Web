<?php

include 'init.php';

$keyword = '';
if (isset($_GET['keyword'])) {
   $keyword = $_GET['keyword'];
}

// Tampilkan data berdasarkan filter pencarian
$query = "SELECT * FROM mahasiswa WHERE nim LIKE '%$keyword%' OR nama LIKE '%$keyword%' OR jk LIKE '%$keyword%'";
$result = mysqli_query($koneksi, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Data Mahasiswa</title>
</head>

<style>
   body {
      font-family: Arial, sans-serif;
      margin: 10px 100px 10px 100px;
      box-sizing: border-box;

   }

   h2 {
      color: #333;
   }

   .cari {
      display: flex;
      justify-content: space-between;
   }

   .cari form {
      display: flex;
      gap: 5px;
      align-items: center;
   }



   .button {
      width: auto;
      height: auto;
      border-radius: 3px;
      border: none;
      padding: 5px;
   }

   .button:hover {
      background-color: #90A4AE;
      cursor: pointer;
   }

   .button-cari {
      background-color: #FFF176;
   }

   /* .button-cari:hover {
    
      background-color: #FFF100;
   } */

   .button-edit {
      background-color: #4FC3F7;
   }

   /* 
   .button-edit:hover {
      background-color: #4FC1F7;
   } */

   .button-delete {
      background-color: #EF5350;
   }

   .tambah-mahasiswa {
      background-color: #64B5F6;

      /* margin: 20px; */
   }



   table {
      top: 10px;
      width: 100%;
      position: relative;
      border-collapse: collapse;
      margin-top: 10px;
   }

   table,
   th,
   td {
      border: 1px solid #ddd;

   }

   th,
   td {
      padding: 10px;
      text-align: center;
   }





   th {
      background-color: #f2f2f2;
      text-align: center;
   }

   a {
      text-decoration: none;
      color: white;

   }

   .inputCari {
      height: 25px;
      border-radius: 5px;
      border: 1px #90A4AE solid;
   }

   .inputCari:focus {
      background-color: #E1F5FE;
      outline: none;
      border: 1px #03A9F4 solid;
   }
</style>

<body>
   <div class="judul">
      <h2>Data Mahasiswa</h2>
   </div>

   <div class="cari">
      <div class="button tambah-mahasiswa">
         <a href="input.php">Tambah Data Mahasiswa</a>
      </div>
      <form action="index.php" method="get">
         <label for="keyword">Cari:</label>
         <input class="inputCari" type="text" name="keyword" id="keyword" value="<?= $keyword; ?>">
         <button class="button button-cari" type="submit"> Cari</button>
      </form>
   </div>



   <table border="1">
      <thead>

         <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Aksi</th>
         </tr>
      </thead>
      <tbody>
         <?php $index = 1; ?>
         <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
               <td><?= $index++; ?></td>
               <td><?= $row['nim']; ?></td>
               <td><?= $row['nama']; ?></td>
               <td><?= $row['jk']; ?></td>
               <td><?= $row['alamat']; ?></td>
               <td>
                  <a class="button button-edit" href="edit.php?id=<?= $row['id']; ?>">Edit</a>
                  <a class="button button-delete" href="delete.php?id=<?= $row['id']; ?>">Hapus</a>
               </td>
            </tr>
         <?php endwhile; ?>
      </tbody>
   </table>
</body>
