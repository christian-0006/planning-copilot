<?php
// app/Models/Event.php

class Event {
    public static function getAllEvents() {
        // Simule une base de données avec un tableau PHP
        return [
            ['title' => 'Réunion projet', 'date' => '2025-10-10', 'location' => 'Nice'],
            ['title' => 'Support technique', 'date' => '2025-10-12', 'location' => 'Remote'],
            ['title' => 'Formation PHP', 'date' => '2025-10-15', 'location' => 'Online']
        ];
    }
}