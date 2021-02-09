<?php

require '../vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

$htmltoPdf = new Html2Pdf();
ob_start();
require_once 'pdf.php';
$html = ob_get_clean();

$htmltoPdf->writeHTML($html);
$htmltoPdf->output();