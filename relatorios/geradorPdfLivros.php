<?php
include('../lib/conexao.php');
require __DIR__ . '\vendor\autoload.php';
$sqlLivro = "SELECT livro.*, autor.nome_autor FROM livro INNER JOIN autor ON livro.fk_autor = autor.id_autor";
$resultLivro = $conn->query($sqlLivro);
var_dump($sqlLivro);
var_dump($resultLivro);

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
      border: none;
      padding: 10px;
   }

   tbody th, td, tr {
      margin: 0px;
      border: none;
      border-top: 1 px solid #c1c1c4;
      padding: 10px;
   }
   </style>';
   $html .= '<div class="header">
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
/*while ($row) {
   $html .= '<tr>';
      $html .= '<td>'.$row['id_livro']."</td>";
      $html .= '<td>'.$row['nome']."</td>";
      //$html .= '<td>'.$row['autor']."</td>";
      //$html .= '<td>'.$row['email']."</td>";
      //$html .= '<td>'.$row['telefone']."</td>";
   $html .= '</tr>';
*/
   $html .= '</tbody>';
	$html .= '</table>';
/*
use Dompdf\Dompdf;

$dompdf = new Dompdf(['isRemoteEnabled' => true]);
$dompdf->loadHtml($html);
$dompdf->render();
header('Content-Type: application/pdf');
$dompdf->stream(
   "relatorioUsers.pdf", 
   array(
      "Attachment" => false //Para realizar o download somente alterar para true
   )
);*/

?>