<?php
session_start();
session_destroy();
header("Location: /planning-copilot/public/");
exit;
