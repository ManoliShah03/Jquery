<?php
$keywords = array("java", "php", "Python", "magento", "bootstrap", "Html", "Css", "Android", "Javascript", "Java");

usort($keywords, 'strcasecmp');

foreach ($keywords as $keyword) {
    echo $keyword . "<br>";
}
