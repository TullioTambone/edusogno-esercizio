<?php
//import del model
include __DIR__ . '/event.php';

//controller in cui chiamare i metodi e slavare e modificare i dati

class EventController {
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function getEvents($userEmail) {
        $event = new Event();
        $events = $event->getAll($userEmail, $this->connection);

        return $events;
    }

    public function addEvent($attendees, $nome_evento, $data_evento) {
        $event = new Event();
        return $event->addEvent($attendees, $nome_evento, $data_evento, $this->connection);
    }

    public function updateEvent($id, $nome_evento, $data_evento){
        $event = new Event();
        return $event->updateEvent($id, $nome_evento, $data_evento, $this->connection);
    }

    public function deleteEvent($id, $attendees) {
        $event = new Event();
        return $event->deleteEvent($id, $attendees, $this->connection);
    }
}


?>