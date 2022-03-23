function getArrBeforeToday() {
    var arr = [];
    var today = new Date();
    var year = today.getFullYear();
    var month = today.getMonth() + 1;
    var day = today.getDate();
    for (var i = 30 - 1; i >= 0; i--) {
        var date = new Date(year, month - 1, day - i);
        // var dateStr = date.getFullYear() + '-' + (date.getMonth() + 1) + '-' + date.getDate();
        var strWeekday = date.toLocaleString('en-us', { weekday: 'short' }).charAt(0);
        var numDay = date.getDate();
        arr.push([numDay, strWeekday]);
    }
    return arr;
}


var today = new Date();
document.getElementById('day').innerHTML = today.toLocaleString('en-us', { weekday: 'long' });
document.getElementById('date').innerHTML = today.getDate();
document.getElementById('month').innerHTML = today.toLocaleString('en-us', { month: 'long' });
document.getElementById('year').innerHTML = today.getFullYear();



