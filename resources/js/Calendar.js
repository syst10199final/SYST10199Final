/*
 * Script handling calendar functionality.
 * 
 * @author Willem Wantenaar
 */

// Default function that calls js
window.onload = function(){
    var d = new Date();
    // Array of months
    var month_name = ['January','February','March','April','May','June','July','August','September','October','November','December'];
    // Uses local time to get month and year
    var month = d.getMonth(); //0-11
    var year = d.getFullYear();
    var first_date = month_name[month] + " " + 1 + " " + year; // Should look like "April 1 2019"
    
    var tmp = new Date(first_date).toDateString();
    var first_day = tmp.substring(0, 3);
    // Array of days
    var day_name = ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'];
    
    var day_no = day_name.indexOf(first_day);
    var days = new Date(year, month+1, 0).getDate(); // getDate will get total days for that specific month
    // Method for creating calendar
    var calendar = get_calendar(day_no, days);
    // Referencing elements in php document
    document.getElementById('month').innerHTML = month_name[month]+" "+year;
    document.getElementById('dates').appendChild(calendar);
}
// Create and display calendar
function get_calendar(day_no, days){
    // Create calendar
    var table = document.createElement('table');
    var tr = document.createElement('tr');
    // Row for week days
    for(var c=0 ; c<=6 ; c++){
        var td = document.createElement('td');
        td.innerHTML = "SMTWTFS"[c]
        tr.appendChild(td);
    }
    table.appendChild(tr);
    // First row of days
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
    // Count amount of printed days
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
}
