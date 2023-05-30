<?php
include('../lib/conexao.php');
require __DIR__ . '\vendor\autoload.php';
$sqllivro = "SELECT livro.*, autor.nome_autor, editora.nome_editora FROM livro INNER JOIN autor ON livro.fk_autor = autor.id_autor INNER JOIN editora ON livro.fk_editora = editora.id_editora";
$resultlivro = mysqli_query($conn, $sqllivro);

date_default_timezone_set('America/Sao_Paulo');
$dataAtual = date('d-m-Y H:i');
echo $dataAtual;

   $html = '<style>

   .header {
      padding: 10px;
      display: flex;
      justify-content: space-between;
      border: 1px solid #c1c1c4;
      margin-bottom: 30px;
   }

   h1, h2, p {
      display: inline;
   }

   h1 {
      margin-left: 8%;
      text-align: center;
   }

   h2 {
      margin-top: -7px;
      float: left;
   }

   p {
      margin-top: 4px;
      float: right;
   }
   
   table {
      text-align: center;
      margin: auto;
   }

   h1 {
      font-size: 20px;
      color: black;
   }

   h2 {
      font-size: 30px;
      color: red;
   }

   thead th, td, tr {
      margin: 0px;
      gap: 0;
      border: none;
      padding: 10px;
   }

   tbody th, td, tr {
      margin: 0px;
      border: none;
      padding: 10px;
   }
   </style>';
   $html .= '<img src="../img/logo.png" alt="Imagem">
   <div class="header">
      
      <h2>Livraria Yalle</h2>
      <h1>Relatório de livros cadastrados</h1>
      <p>'. $dataAtual .'</p>
   </div>';
   $html .= '<table border=1>';	
	$html .= '<thead>';
	$html .= '<tr>';
	$html .= '<th>ID</th>';
	$html .= '<th>Nome</th>';
	$html .= '<th>Autor</th>';
	$html .= '<th>Editora</th>';
	$html .= '<th>Preço</th>';;
	$html .= '</tr>';
	$html .= '</thead>';
	$html .= '<tbody>';
while ($row = mysqli_fetch_array($resultlivro)) {
   $html .= '<tr>';
      $html .= '<td>'.$row['id_livro']."</td>";
      $html .= '<td>'.$row['nome']."</td>";
      $html .= '<td>'.$row['nome_autor']."</td>";
      $html .= '<td>'.$row['nome_editora']."</td>";
      $html .= '<td>R$ '.$row['preco'].".00</td>";
   $html .= '</tr>';
   }
   $html .= '</tbody>';
	$html .= '</table>';

use Dompdf\Dompdf;
$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->render();
header('Content-Type: application/pdf');
$dompdf->stream(
   "relatorioLivros.pdf", 
   array(
      "Attachment" => false //Para realizar o download somente alterar para true
   )
);

?>