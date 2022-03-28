function getJson(options, startDate, endDate) {
    var json;
    $.ajax({
        url: '/api/' + options,
        type: "GET",
        data: {
            "startDate": startDate,
            "endDate": endDate
        },
        async: false,
        success: function (data) {
            json = data;
        },
        error: function (xhr, status, error) {
            console.log(error);
        }
    });
    return json;
}

function getArrBeforeToday(today) {
    var arr = [];
    var year = today.getFullYear();
    var month = today.getMonth() + 1;
    var day = today.getDate();
    for (var i = 30 - 1; i >= 0; i--) {
        var date = new Date(year, month - 1, day - i);
        var strWeekday = date.toLocaleString('en-us', { weekday: 'short' });
        var numDay = date.getDate();
        arr.push([numDay, strWeekday]);
    }
    return arr;
}

function dateToString(date) {
    var year = date.getFullYear();
    var month = date.getMonth() + 1;
    var day = date.getDate();
    return year + '-' + month + '-' + day;
}

function getShortDay(date) {
    var date = new Date(date);
    var day = date.getDay();
    var dayArr = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    return dayArr[day];
}

// create function that return month name by given date in string format yyyy-mm-dd
function getMonthName(data) {
    var monthArr = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nop', 'Des'];
    return monthArr.slice(0, data.total.length);
}




function getDailyOmzet(year, month, day) {
    var today = new Date(year, month - 1, day);
    var priorDate = new Date(today);
    priorDate.setDate(today.getDate() - 30);
    var start = dateToString(priorDate);
    var end = dateToString(today);
    daily = getJson('omzet-daily', start, end);
    return daily;
}

function getOmzetMonthly(year, month, day) {
    var start = new Date(year, 0, 1);
    var end = new Date(year, month - 1, day);
    monthly = getJson('omzet-monthly', dateToString(start), dateToString(end));
    return monthly;
}


function getOmzetMonthlyZT3(year, month, day) {
    var start = new Date(year, 0, 1);
    var end = new Date(year, month - 1, day);
    monthly = getJson('omzet-monthly-zt3', dateToString(start), dateToString(end));
    return monthly;
}


function parseOmzet(data) {
    var omzet = {
        "guest": [],
        "member": [],
        "total": [],

    };
    data.guest.forEach(element => {
        omzet.guest.push(element.jumlah);
    });
    data.member.forEach(element => {
        omzet.member.push(element.jumlah);
    });
    data.total.forEach(element => {
        omzet.total.push(element.jumlah);
    });
    return omzet;

}

