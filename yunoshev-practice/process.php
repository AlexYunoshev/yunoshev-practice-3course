<?php
include 'header.php';
include 'functions.php';
?>

<section>

<?php
if (isset($_POST['button-verify'])) {
    $url = $_POST['url'];
    $handle = curl_init($url);
    curl_setopt($handle,  CURLOPT_RETURNTRANSFER, TRUE);

    $response = curl_exec($handle);
    $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
    $totalExecuteTime = curl_getinfo($handle, CURLINFO_TOTAL_TIME);
    $connectTime = curl_getinfo($handle, CURLINFO_CONNECT_TIME);
    $startTransferTime = curl_getinfo($handle, CURLINFO_STARTTRANSFER_TIME);
    $primaryIP = curl_getinfo($handle, CURLINFO_PRIMARY_IP);
    $primaryPort = curl_getinfo($handle, CURLINFO_PRIMARY_PORT);
    $localIP = curl_getinfo($handle, CURLINFO_LOCAL_IP);
    $localPort = curl_getinfo($handle, CURLINFO_LOCAL_PORT);
    $openSSLEngines = curl_getinfo($handle, CURLINFO_SSL_ENGINES);
    $openSSLEnginesString = implode(", ", $openSSLEngines);
  
    echo "<table class='result-table'>";
        echo "<tr>";
            echo "<td>URL: </td>";
            echo "<td>$url</td>";
        echo "</tr>";

        echo "<tr>";
            echo "<td>Status code: </td>";
            echo "<td>$httpCode</td>";
        echo "</tr>";

        echo "<tr>";
            echo "<td>Status code type: </td>";
            if($response == false) echo "<td>".curl_error($handle)."</td>";
            else
            {
                $codeType = getStatusType($httpCode);
                echo "<td>$codeType</td>";
            }
        echo "</tr>";

        echo "<tr>";
            echo "<td>Status code text: </td>";
            if($response == false)  echo "<td>".curl_error($handle)."</td>";
            else
            {
                $codeText = getStatusText($httpCode);
                echo "<td>$codeText</td>";
            }
        echo "</tr>";

        echo "<tr>";
            echo "<td>Status code description: </td>";
            if($response == false) echo "<td>".curl_error($handle)."</td>";
            else
            {
                $descrText = getDefaultErrorSpecifications($httpCode);
                echo "<td>$descrText</td>";
            }
        echo "</tr>";

        echo "<tr>";
            echo "<td>Domain address: </td>";
            if($response == false) echo "<td>".curl_error($handle)."</td>";
            else
            { 
                $domain = parse_url($url);
                if (isset($domain['scheme']) && isset($domain['host'])) 
                    echo "<td>".$domain['scheme']."://".$domain['host']."</td>";
                else  echo "<td>Unknown</td>";
            }
        echo "</tr>";

        echo "<tr>";
            echo "<td>Total execute time: </td>";
            if($response == false)  echo "<td>".curl_error($handle)."</td>";
            else
            {    
                echo "<td>$totalExecuteTime sec</td>";
            }
        echo "</tr>";

        echo "<tr>";
            echo "<td>Connect time: </td>"; 
            if($response == false) echo "<td>".curl_error($handle)."</td>";
            else
            {    
                echo "<td>$connectTime sec</td>";
            }
        echo "</tr>";

        echo "<tr>";
            echo "<td>Time from execute start to 1 byte data transfer: </td>";
            if($response == false) echo "<td>".curl_error($handle)."</td>";
            else
            {    
                echo "<td>$startTransferTime sec</td>";
            }
        echo "</tr>";

        echo "<tr>";
            echo "<td>Primary IP: </td>";
            if($response == false)  echo "<td>".curl_error($handle)."</td>";
            else
            {    
                echo "<td>$primaryIP</td>";
            }
        echo "</tr>";

        echo "<tr>";
            echo "<td>Local IP: </td>";
            if($response == false)  echo "<td>".curl_error($handle)."</td>";
            else
            {    
                echo "<td>$localIP</td>";
            }
        echo "</tr>";

        echo "<tr>";
            echo "<td>Primary port: </td>";
            if($response == false)  echo "<td>".curl_error($handle)."</td>";
            else
            {    
                echo "<td>$primaryPort</td>";
            }
        echo "</tr>";

        echo "<tr>";
            echo "<td>Local port: </td>";
            if($response == false) echo "<td>".curl_error($handle)."</td>";
            else
            {    
                echo "<td>$localPort</td>";
            }
        echo "</tr>";

        echo "<tr>";
            echo "<td>SSL engines: </td>";
            if($response == false)  echo "<td>".curl_error($handle)."</td>";
            else
            {    
                echo "<td>$openSSLEnginesString</td>";
            }
        echo "</tr>";

    echo "</table>";

    curl_close($handle);
}

?>

</section>
<?php
include 'footer.php';
?>