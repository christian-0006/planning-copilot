<?php
// app/Controllers/EventController.php

// Inclusion du modèle Event
require_once __DIR__ . '/../Models/Event.php';

// Contrôleur gérant l'affichage des événements
class EventController {
    public function index() {
        // Récupération des événements via le modèle
        $events = Event::getAllEvents();

        // Inclusion de la vue pour afficher les événements
        require_once __DIR__ . '/../Views/events.php';
    }
}