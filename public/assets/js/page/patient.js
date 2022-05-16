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
    text: 'Sorry, no slots left for this date \n Please choose another date',
    cancel: true,
    icon: 'info'
}

// past date
let passDate = {
    title: 'Past Date',
    text: 'The date selected was already past \n Please select date later than today',
    cancel: true,
    icon: 'warning'
}

var calendarElement = document.getElementById('calendar')
if (calendarElement) {
    var calendar = new FullCalendar.Calendar(calendarElement, {
        initialView: 'dayGridMonth',
        dateClick: function(info) {
            $('#schedule_time').val(info.dateStr)
            $('#schedule_date').val(info.dateStr)

            if (info.date < new Date((new Date()).toLocaleDateString())) {
                swal(passDate)
                return
            }

           slots = typeof(schedules[info.dateStr]) == 'undefined'? 0 : schedules[info.dateStr].length
           if (slots >= 20) {
               swal(full)
            } else {
               available.text = `${20 - slots} slot/s available! \n Do you want to proceed for an appointment and consultation?`
               swal(available)
                .then(yes => {
                    if (yes) {
                        $('#schedule-form').show()
                        $('#schedule-form')[0].scrollIntoView()
                    } else {
                        calendarElement.scrollIntoView()
                        $('#schedule-form').hide()
                    }
                })
           }
        },
        selectable: true
    })
    calendar.render();
}
