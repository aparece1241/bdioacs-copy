window.isAutoSwitch = true
let slots = 0

// available date
let available = {
    title: 'Notification',
    text: `${slots} slot/s available! \n Do you want to proceed for an appointment and consultation?`,
    buttons: ['cancel', 'yes'],
    icon: 'info'
}

// full date
let full = {
    title: 'Notification',
    text: 'Sorry, no slots left for this date',
    cancel: true,
    info: 'info'
}

var calendarElement = document.getElementById('calendar')
if (calendarElement) {
    var calendar = new FullCalendar.Calendar(calendarElement, {
        initialView: 'dayGridMonth',
        dateClick: function(info) {
           slots = typeof(schedules[info.dateStr]) == 'undefined'? 0 : schedules[info.dateStr].length
           console.log(slots)
           if (slots >= 20) {
               swal(full)
            } else {
               available.text = `${20 - slots} slot/s available! \n Do you want to proceed for an appointment and consultation?`
               swal(available)
           }
        },
        selectable: true
    })
    calendar.render();
}
