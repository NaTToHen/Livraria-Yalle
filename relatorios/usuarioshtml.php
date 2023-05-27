<html>

<body>
   <table>
      <thead>
         <tr>
            <th>id</th>
            <th>nome</th>
            <th>cpf</th>
            <th>email</th>
            <th>telefone</th>
         </tr>
      </thead>
      <tbody>
         <?php
         //include('C:\wamp64\www\livraria Yalle\Livraria-Yalle\lib\conexao.php');
         //require dirname(__DIR__, 1) . "/vendor/autoload.php";
         //$sqlUser = "SELECT * FROM usuario ORDER BY id_user DESC";
         //$resultUser = mysqli_query($conn, $sqlUser);

         $pdo = new PDO('mysql:host=localhost; dbname=yalledb;', 'root', '');
         $query = $pdo->prepare("SELECT * FROM usuario ORDER BY id_user DESC");
         $query->execute();
         $row = $query->fetchAll(PDO::FETCH_ASSOC);
         foreach($row as $info){
            $info['nome'];
            $id = $info['id_user'];//$id = $row['id_user'];
            $nome = $info['nome']; //$nome = $row['nome'];
            $cpf = $info['cpf']; //$cpf = $row['cpf'];
            $email = $info['email']; //$email = $row['email'];
            $telefone = $info['telefone']; //$telefone = $row['telefone'];
            echo ("
                   <tr class='linhaTabela'>
                     <td>$id</td>
                     <td>$nome</td>
                     <td>$cpf</td>
                     <td>$email</td>
                     <td>$telefone</td>
                  </tr>");
               }
         ?>
      </tbody>
   </table>
</body>

</html>