<?php
require_once 'vendor/autoload.php';
use MIM\Row;
use MIM\Invoice;
$row = new Row();
$row->setDescription('Test de description');
$row->setPriceExcludeVat(20);
$row->setHours(15);
$row->setVat(20);
$row1 = new Row();
$row1->setDescription('25h de Travail');
$row1->setPriceExcludeVat(12);
$row1->setHours(25);
$row1->setVat(15);
$invoice = new Invoice();
$invoice->addRow($row);
$invoice->addRow($row1);
foreach ($invoice->getRows() as $row) {
    var_dump($row->getDescription().'pendant '.$row->getHours().' au prix de '.$row->getTotalPrice().'$ TTC ou '.$row->getPriceExcludeVat().'$ de l\'heure HT.');
}
var_dump('Total HT: '.$invoice->getTotalPriceHT().'$');
var_dump('Total TTC: '.$invoice->getTotalPriceTTC().'$');