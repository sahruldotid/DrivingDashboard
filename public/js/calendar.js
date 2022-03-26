// document.getElementById('day').innerHTML = today.toLocaleString('en-us', { weekday: 'long' });
// document.getElementById('date').innerHTML = today.getDate();
// document.getElementById('month').innerHTML = today.toLocaleString('en-us', { month: 'long' });
// document.getElementById('year').innerHTML = today.getFullYear();


// create function that return string date in indonesa, example Sabtu, 26 Desember 2022
function getToday() {
    var today = new Date();
    var day = today.toLocaleString('id-ID', { weekday: 'long', timeZone: 'Asia/Jakarta' });
    var date = today.getDate();
    var month = today.toLocaleString('id-ID', { month: 'long', timeZone: 'Asia/Jakarta' });
    var year = today.getFullYear();
    var dateIndo = day + ", " + date + " " + month + " " + year;
    return dateIndo;
}


document.getElementById('left-date').innerHTML = "<i class='fa fa-clock-o'></i> " + getToday();



