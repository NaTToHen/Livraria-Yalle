<?php
include('../lib/conexao.php');
require __DIR__ . '\vendor\autoload.php';
$sqlUser = "SELECT * FROM usuario ORDER BY id_user DESC";
$resultUser = mysqli_query($conn, $sqlUser);
   $html = '<style>
      table {
         background-color: #8888;
      }
   </style>';
   $html .= '<table border=1>';	
	$html .= '<thead>';
	$html .= '<tr>';
	$html .= '<th>ID</th>';
	$html .= '<th>Nome</th>';
	$html .= '<th>Cpf</th>';
	$html .= '<th>Email</th>';
	$html .= '<th>Telefone</th>';;
	$html .= '</tr>';
	$html .= '</thead>';
	$html .= '<tbody>';
while ($row = mysqli_fetch_array($resultUser)) {
   $html .= '<tr>';
      $html .= '<td>'.$row['id_user']."</td>";
      $html .= '<td>'.$row['nome']."</td>";
      $html .= '<td>'.$row['cpf']."</td>";
      $html .= '<td>'.$row['email']."</td>";
      $html .= '<td>'.$row['telefone']."</td>";
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
   "relatorioUsers.pdf", 
   array(
      "Attachment" => false //Para realizar o download somente alterar para true
   )
);

?>