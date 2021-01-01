document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');
  var calendar = window['hebcalFullCalendar'] = new FullCalendar.Calendar(calendarEl, {
      plugins: [ 'dayGrid' ],
      defaultView: 'dayGridMonth',
      header: {
        left: 'title',
        right: 'prev,next today',
      },
      timezone: false,
      events: {
          url: "https://www.hebcal.com/hebcal?cfg=fc&v=1&i=off&maj=on&min=on&nx=on&mf=on&ss=on&mod=on&lg=s&s=on",
          cache: true
      }
  });

  calendar.render();

  document.addEventListener('keydown', function(e) {
    if (e.keyCode == 37) {
      calendar.prev();
    } else if (e.keyCode == 39) {
      calendar.next();
    }
  });
});
