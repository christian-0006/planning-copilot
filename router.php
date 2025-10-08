<?php
// router.php

require_once __DIR__ . '/app/Controllers/EventController.php';

$controller = new EventController();
$controller->index();