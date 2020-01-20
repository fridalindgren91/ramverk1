<?php

namespace Anax\Controller;

?>

<?= $content ?>

<p>Skriv in den ip-adress du vill kolla position för nedan</p>

<form method="post" action="checkIP">
    <input type="text" name="ipadress" value=<?=$userIp?> style="width: 300px">
    <input type="submit" value="Skicka" style="width: 180px">
</form>

<?php

if (isset($result) && isset($host)) {
    echo "<br>Resultat";
    echo $result;
    echo "Domännamn: " . $host;
    echo "<br>Address: " . $location['city'] . " " . $location['country_name'];
} elseif (isset($result)) {
    echo "<br>Resultat";
    echo $result;
}

?>

<?= $contentJSON ?>

<p>Skriv in den ip-adress du vill kolla position för nedan</p>

<form method="get" action="checkIPJSON">
    <input type="text" name="ipadressJSON" value=<?=$userIp?> style="width: 300px">
    <input type="submit" value="Skicka" style="width: 180px">
</form>

<h3>Mitt JSON API</h3>
<p>Mitt api nås via denna url: http://www.student.bth.se/~frlg18/dbwebb-kurser/ramverk1/me/redovisa/htdocs/geo/checkIPJSON</p>
<p>Du hämtar data med parametern "ipadressJSON". Där finns följande information:<br>
"ipadress" -> den angivna ipadressen<br>
"ipRes" -> information om den angivna ip adressen är en giltig v4 eller v6 adress<br>
"hostJSON" -> domännamnet, ip adressens host<br>
"location" -> en array med stad och land där ip-adressen finns</p>
<p>Nedan finns en länk där jag angett facebooks ip-adress</p>
<a href="http://www.student.bth.se/~frlg18/dbwebb-kurser/ramverk1/me/redovisa/htdocs/geo/checkIPJSON?ipadressJSON=2a03:2880:f003:c07:face:b00c::2">http://www.student.bth.se/~frlg18/dbwebb-kurser/ramverk1/me/redovisa/htdocs/geo/checkIPJSON?ipadressJSON=2a03:2880:f003:c07:face:b00c::2</a>
