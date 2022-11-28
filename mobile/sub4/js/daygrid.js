document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var cdate = new Date();
    var cy = cdate.getFullYear();
    var cm = cdate.getMonth();
    var cd = cdate.getDate();

    if(cm<10)cm='0'+cm;
    if(cd<10)cd='0'+cd;

    var ctoday=cy+'-'+cm+'-'+cd;

    // console.log(cy,cm,cd,ctoday);

    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'prevYear,prev,next,nextYear today',
        center: 'title',
        right: 'dayGridMonth,dayGridWeek,dayGridDay'
      },
      initialDate: ctoday,
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      dayMaxEvents: true, // allow "more" link when too many events
      events: [
        {
          title: '면접',
          start: '2022-10-22',
          
        },
        {
          start: '2022-10-22',
          display: 'background',
          color: 'red'
        },
        {
          title: '서류접수',
          start: '2022-10-03',
          end: '2022-10-19'
        },
        {
          groupId: 999,
          title: '서류전형',
          start: '2022-10-22T16:00:00'
        },
        {
          groupId: 999,
          title: '면접전형',
          start: '2022-10-25T16:00:00'
        },
        {
          title: '최종합격 발표',
          start: '2022-11-14',
          end: '2020-11-15'
        },
        {
          title: '1분기 1차 면접',
          start: '2023-01-12T10:30:00',
          end: '2023-01-29T12:30:00',
          color: '#f00'
          
        },
        {
          title: 'Lunch',
          start: '2020-06-12T12:00:00'
        },
        {
          title: 'Meeting',
          start: '2020-06-12T14:30:00'
        },
        {
          title: 'Happy Hour',
          start: '2020-06-12T17:30:00'
        },
        {
          title: 'Dinner',
          start: '2020-06-12T20:00:00'
        },
        {
          title: 'Birthday Party',
          start: '2020-06-13T07:00:00'
        },
        {
          title: 'Click for Google',
          url: 'http://google.com/',
          start: '2020-06-28'
        }
      ]
    });

    calendar.render();
  });