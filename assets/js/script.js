const alerts = [
    {
        name: 'update',
        message: "Ti è stata inviata una mail con l'avvenuto successo di modifica",
    },
    {
        name: 'addEvent',
        message: "Ti è stata inviata una mail di conferma della creazione dell'evento",
    },
    {
        name: 'password',
        message: "Ti è stata inviata una mail per il cambio password",
    }
];


alerts.forEach(e => {
    const element = document.getElementById(e.name);
    
    if (element){
        element.addEventListener('click', () => {
            alert(e.message);
        });
    }
});