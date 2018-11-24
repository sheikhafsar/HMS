# HMS
database project using PHP and MYSQL
#checkout this snippet for disabling individual days
```
$(function() {
   $('#txtDate').datepicker({ beforeShowDay:
    function(dt)
    {
       return [dt.getDay() == 4 || dt.getDay() == 3 ? false : true];
    }
 });
});
```
