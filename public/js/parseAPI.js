function getThiryDayBefore() {
    var arr = [];
    var result = {};
    var today = new Date();
    var year = today.getFullYear();
    var month = today.getMonth() + 1;
    var day = today.getDate();
    for (var i = 30 - 1; i >= 0; i--) {
        var date = new Date(year, month - 1, day - i);
        var numDay = date.getDate();
        var numMonth = date.getMonth() + 1;
        var numYear = date.getFullYear();
        arr.push(numYear + '-' + numMonth + '-' + numDay);
    }
    result.startDate = arr[0];
    result.endDate = arr[arr.length - 1];
    return result;
}


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

function dailyOmzet(start,end){
    if (start == undefined || end == undefined) {
        start = getThiryDayBefore().startDate;
        end = getThiryDayBefore().endDate;
    }
    daily = getJson('omzet-daily', start, end);
    return daily;
}
