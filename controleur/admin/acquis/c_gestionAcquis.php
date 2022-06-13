<?php
require_once './modele/manager/AcquisManager.php';

use manager\AcquisManager;

$acquisManager = new AcquisManager();

$lesCompetences = $acquisManager->getAcquisAdmin();

include_once "./vue/admin/acquis/v_gestionAcquis.php";
