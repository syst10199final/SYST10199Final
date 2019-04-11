// default funnction that calls js
window.onload = function(){
    var d = new Date();
    // array of months
    var month_name = ['January','February','March','April','May','June','July','August','September','October','November','December'];
    // uses local-time to get month and year
    var month = d.getMonth(); //0-11
    var year = d.getFullYear();
    var first_date = month_name[month] + " " + 1 + " " + year; // should look like "April 1 2019"
    //
    var tmp = new Date(first_date).toDateString();
    var first_day = tmp.substring(0, 3);
    // array of days
    var day_name = ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'];
    //
    var day_no = day_name.indexOf(first_day);
    var days = new Date(year, month+1, 0).getDate(); // getDate will get total days for that specific month
    // method for creating calendar
    var calendar = get_calendar(day_no, days);
    // referencing elements in php document
    document.getElementById('month').innerHTML = month_name[month]+" "+year;
    document.getElementById('dates').appendChild(calendar);
}
// create and display calender
function get_calendar(day_no, days){
    // create calendar
    var table = document.createElement('table');
    var tr = document.createElement('tr');
    // row for week days
    for(var c=0 ; c<=6 ; c++){
        var td = document.createElement('td');
        td.innerHTML = "SMTWTFS"[c]
        tr.appendChild(td);
    }
    table.appendChild(tr);
    // first row of days
    tr = document.createElement('tr')
    var c;
    for(c=0 ; c<=6 ; c++){
        if (c == day_no){
        break;
        }
        var td = document.createElement('td');
        td.innerHTML = "",
        tr.appendChild(td);
    }
    // count amount of printed days
    var count = 1;
    for( ; c<=6; c++){
        var td = document.createElement('td');
        td.innerHTML = count;
        count++;
        tr.appendChild(td);
    }
    table.appendChild(tr);
    for(var r=3 ; r<=6; r++){
        tr = document.createElement('tr');
        for(var c=0 ; c<=6 ; c++){
            if(count > days){
                table.appendChild(tr);
                return table;
            }
            var td = document.createElement('td');
            td.innerHTML = count;
            count++
            tr.appendChild(td);
        }
        table.appendChild(tr);
    }
}/*
// method for counting number of days
function numOfDays(){
    var d = new Date();
    var month = d.getMonth();
    var year = d.getFullYear();
    var days = new Date(year, month+1, 0).getDate();
}
var nod = numOfDays();
*/
