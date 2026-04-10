<?php
$host = "sh00082.hostgator.com.br";
$usuario = "hg066431_dba";
$senha = "Jr@17042023.";
$banco = "hg066431_movvi";
$conn = new mysqli($host, $usuario, $senha, $banco);

$sql = "SELECT updated_at, leads_id, leads_critico FROM leads";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {

        $updated = $row['updated_at'];
        $lead_id = $row['leads_id'];
        $leads_critico = $row['leads_critico'];
        $dataUpdated = new DateTime($updated);
        $diffAtualUpdated = $dataUpdated->diff(new DateTime());
        if ($diffAtualUpdated->days >= 3) {
            $update = "UPDATE leads SET leads_critico = 1 WHERE leads_id = $lead_id";
            $conn->query($update);
        }else if($diffAtualUpdated->days < 3 && $leads_critico){
            $update = "UPDATE leads SET leads_critico = 0 WHERE leads_id = $lead_id";
            $conn->query($update);
        }

    }

}
echo "Processo finalizado";

$conn->close();

?>
