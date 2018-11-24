# HMS
database project using PHP and MYSQL

# checkout this snippet for disabling individual days
```
$(function() {
   $('#txtDate').datepicker({ beforeShowDay:
    function(dt)
    {
    //console.log(dt)
    var mon = "Tuesday"
    var val = 0
    switch(mon){
    	case "Sunday":
      	val = 0
        break;
       case "Monday":
       val = 1;
       break;
       case "Tuesday":
       val = 2;
       break;
       case "Wednesday":
       val = 3;
       break;
       case "Thursday":
       val = 4;
       break;
       case "Friday":
       val = 5;
       break;
       case "Saturday":
       val = 6;
       break;
       default:
       break;
    }
    
    //console.log(date)
       return [dt.getDay() == val  ? true : false];
    }
 });
});
```
# Checkout this [fiddle](http://jsfiddle.net/Pt2Mr/1254/) for the execution of the above code
