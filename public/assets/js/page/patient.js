window.isAutoSwitch = true
var calendarElement = document.getElementById('calendar')
console.log(calendarElement)
var calendar = new FullCalendar.Calendar(calendarElement, {
    initialView: 'dayGridMonth'
})

calendar.render();
