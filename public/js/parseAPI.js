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


function dateToString(date) {
    var year = date.getFullYear();
    var month = date.getMonth() + 1;
    var day = date.getDate();
    return year + '-' + month + '-' + day;
}

function checkDailyDate(date) {
    var arr = [];
    var result = {};
    var today = new Date();
    var year = yr || today.getFullYear();
    var month = mo || today.getMonth() + 1;
    var day = dy || today.getDate();
    for (var i = 30 - 1; i >= 0; i--) {
        var date = new Date(year, month - 1, day - i);
        var numDay = date.getDate();
        var numMonth = date.getMonth() + 1;
        var numYear = date.getFullYear();
        arr.push(numYear + '-' + numMonth + '-' + numDay);
    }
    result.startDate = arr[0];
    result.endDate = arr[arr.length - 1];
    if (range != undefined) {
        return arr;
    } else {
        return result;
    }
}

function getDailyOmzet(year, month, day) {
    var today = new Date(year, month - 1, day);
    var priorDate = new Date(today);
    priorDate.setDate(today.getDate() - 29);
    var start = dateToString(priorDate);
    var end = dateToString(today);
    daily = getJson('omzet-daily', start, end);
    return daily;
}
