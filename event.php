<?php 
// model, sintassi ad oggetti con metodi per modificare ed aggiornare il db

class Event {
    private $id;
    private $attendees;
    private $nome_evento;
    private $data_evento;

    public function __construct($id = null, $attendees = null, $nome_evento = null, $data_evento = null) {
        $this->id = $id;
        $this->attendees = $attendees;
        $this->nome_evento = $nome_evento;
        $this->data_evento = $data_evento;
    }

    //setter -----------------------------------------------------------------
    public function setId($id) {
        $this->id = $id;
    }

    public function setAttendees($attendees) {
        $this->attendees = $attendees;
    }

    public function setNomeEvento($nome_evento) {
        $this->nome_evento = $nome_evento;
    }

    public function setDataEvento($data_evento) {
        $this->data_evento = $data_evento;
    }

    // getter ----------------------------------------------------------------
    public function getId() {
        return $this->id;
    }

    public function getAttendees() {
        return $this->attendees;
    }

    public function getNomeEvento() {
        return $this->nome_evento;
    }

    public function getDataEvento() {
        return $this->data_evento;
    }

    // metodi chiamate ----------------------------------------------------
    public function getAll($userEmail, $connection) {

        $query = "SELECT * FROM eventi WHERE FIND_IN_SET('$userEmail', eventi.attendees) > 0";
        $result = mysqli_query($connection, $query);

        if (!$result) {
            echo 'query errata';
        }

        $events = array();

        while ($row = mysqli_fetch_assoc($result)) {

            $event = new Event(
                $row['id'],
                $row['attendees'],
                $row['nome_evento'],
                $row['data_evento']
            );
            $events[] = $event;
        }

        return $events;
    }

    public function addEvent($attendees, $nome_evento, $data_evento, $connection) {

        $query = "INSERT INTO eventi (attendees, nome_evento, data_evento) VALUES ('$attendees', '$nome_evento', '$data_evento')";
        $result = mysqli_query($connection, $query);
    }

    public function updateEvent($id, $nome_evento, $data_evento, $connection){
        
        $query = "UPDATE eventi SET nome_evento='$nome_evento', data_evento='$data_evento' WHERE id = '$id'";
        $result = mysqli_query($connection,$query);
    }

    public function deleteEvent($id, $attendees, $connection){

        $query = "DELETE FROM eventi WHERE attendees = '$attendees' AND id = '$id'";
        $result = mysqli_query($connection, $query);
    }
}
?>