<?php
function getInstancePublicIP() {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "http://instance-data/latest/meta-data/public-ipv4");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  $output = curl_exec($ch);
  curl_close($ch);

  return $output;
}

$pip = getInstancePublicIP();
$server = "";

if($pip === "52.43.182.12"){
  $server = "Server";
} else {
  $server = "Instance: $pip";
}
?>
<h1>Welcome to dreams: <?php echo $server;?></h1>
