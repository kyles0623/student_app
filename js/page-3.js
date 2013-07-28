var AllClasses = new Array();
var UniqueClassNames = new Array();
window.loadedClasses = false;

//Current Number of classes
var num_classes = 0;

//Maximum number of classes
var max_classes = 4;

$(document).ready(function()  
{  

        //Sets classes if session is available
        setAllClasses();

        if(loadedClasses)
            setOtherVariables();
        else
        {
            setTimeout(function()
            {
                if(loadedClasses)
                    setOtherVariables();
                else
                    setTimeout(this);
            },300);
        }
        //Add Class Button Trigger
        $("#add-class").click(function()
        {
            if(num_classes >= max_classes)
            {
                alert('You are allowed a maximum of '+max_classes+' classes');
            }
            else if(loadedClasses)
            {
                addClass('');
                num_classes++;
            }

            return false;
            


        });



}); 
function addClass(name)
{
    var html = "<section class='new-class'><button class='remove-class'>Remove</button>";
    html += getListOfClasses(name);
    html += "</section>";
    $("#classes").append(html);
    setOnClickEvents();

    return $('#classes .new-class:last-child');
}

//Adds the time to the parent class
//Sets the selected option if set
function addTimes(parent,selectedRegNum)
{
   
           
            //Removes the time selection if already there
            if(parent.children(".class-times").length > 0 )
            {
                parent.remove();
            }
            if(parent.children(".course-info").length > 0 )
            {
                parent.children(".course-info").remove();
            }

            //Puts the time section there for this class
            parent.append(getListOfTimes(parent,selectedRegNum));
            setOnClickEvents();
}

//The onclick events for each button and select tag
function setOnClickEvents()
{
        $(".class_names").off();
        $(".remove-class").off();
        $(".class_times").off();
        $(".class_names").change(function()
        {
            addTimes($(this).parent().parent(),'');
            
        });
        //Adds class info to side of selection
        $(".class_times").change(function()
        {
            var course_number = $(this).val();
            setClassInfo($(this).parent().parent(),course_number);
        });
        //Removes the current class from the page
        $(".remove-class").click(function()
        {
            parent = $(this).parent();

            parent.remove();
            num_classes--;
        });
} 
//sets class info to side of selection
//
function setClassInfo(parent, course_number)
{
    var courseInfo = getCourseByCourseNumber(course_number);
    if(parent.children('.course-info').length > 0)
        parent.children('.course-info').remove();
    html = "<section class='course-info'><h4>Course Info</h4><ul>";
    html += "<li><strong>Title:</strong> "+courseInfo.title+"</li>";
    html += "<li><strong>Subject:</strong> "+courseInfo.subj+"</li>";
    html += "<li><strong>Section:</strong> "+courseInfo.sect+"</li>";
    html += "<li><strong>Registration Number:</strong> "+courseInfo.reg_num+"</li>";
    html += "<li><strong>Units:</strong> "+courseInfo.units+"</li>";
    html += "<li><strong>Instructor:</strong> "+(courseInfo.instructor==""?"Instructor TBA":courseInfo.instructor)+"</li>";
    html += "<li><strong>Days:</strong> "+(courseInfo.days==""?"Days TBA":courseInfo.days)+"</li>";
    html += "<li><strong>Time:</strong> "+(courseInfo.time==""?"Time TBA":courseInfo.time)+"</li>";        
    html +="</ul>";

    //Hidden Fields for submission
    html += "<input type='hidden' name=\"classes["+num_classes+"][title]\" value='"+courseInfo.title+"' />";
    html += "<input type='hidden' name=\"classes["+num_classes+"][subj]\" value='"+courseInfo.subj+"' />";
    html += "<input type='hidden' name=\"classes["+num_classes+"][section]\" value='"+courseInfo.sect+"' />";
    html += "<input type='hidden' name=\"classes["+num_classes+"][reg_num]\" value='"+courseInfo.reg_num+"' />";
    html += "<input type='hidden' name=\"classes["+num_classes+"][instructor]\" value='"+(courseInfo.instructor==""?"Instructor TBA":courseInfo.instructor)+"' />";
    html += "<input type='hidden' name=\"classes["+num_classes+"][days]\" value='"+(courseInfo.days==""?"Days TBA":courseInfo.days)+"' />";
     html += "<input type='hidden' name=\"classes["+num_classes+"][time]\" value='"+(courseInfo.time==""?"Time TBA":courseInfo.time)+"' />";
    
    html += "</section>";
    parent.prepend(html);
    parent.children('.course-info').fadeTo(1000,1);
    
}
//Returns a list of the times for the selected class
function getListOfTimes(parent,selectedRegNum)
{
        if(parent.children(".time").children(".class_times").length > 0 )
        {
            parent.children(".time").remove();

        }
    //Begins the HTML for the Time section
    var html = "<section class='time'><label for='class-times' >Time: </label><select class='class_times' >";
    html +="<option value='blank'></option>";

    //Goes through each of the classes and grabs the different times for the class.
    $.each(AllClasses,function(i)
    {
       
        if(AllClasses[i].title ==  parent.children(".name").children(".class_names").val())
        {   
            days = AllClasses[i].days;
            time = AllClasses[i].time;

            if(days == "")
                days = "Days TBA";
            if(time == "")
                time = "Times TBA";
            
            if(selectedRegNum != '' && AllClasses[i].reg_num == selectedRegNum)
            {
                html += "<option value='"+AllClasses[i].reg_num+"' selected='selected'>"+days+"    "+time+"</option>";
            }
            else
            {
                html += "<option value='"+AllClasses[i].reg_num+"' >"+days+"    "+time+"</option>";
            }
                
            
        }
    });
    html +="</select>";

    return html;   
}
function getListOfClasses(name)
{
    var html = "<section class='name'><label for='classes' >Class Name: </label><select class='class_names' >";
    html +="<option></option>";
    $.each(UniqueClassNames,function(index)
    {
        if(name != '' && name == UniqueClassNames[index])
        {
            html += "<option selected='selected'>"+UniqueClassNames[index]+"</option>";
        }
        else
        {
            html += "<option>"+UniqueClassNames[index]+"</option>";
        }
        
    });
    html +="</select></section>";
 
    return html;
}
function setOtherVariables()
{
        var unique = new Array();
        $.each(AllClasses,function(index)
        {
            if (!unique[AllClasses[index].title]) {
                 UniqueClassNames.push(AllClasses[index].title);
                 unique[AllClasses[index].title] = true;
             }
        });

        UniqueClassNames.sort();
        
       
}

//Returns the details of the course by the course reg_num
function getCourseByCourseNumber(number)
{
    
    var course;
   $.each(AllClasses,function(index)
    {
        if(AllClasses[index].reg_num == number)
        {
            course =  AllClasses[index];
        }
    });
   return course;
    
}
function hideLoading()
{
    $("#loading").hide();
    $("#class-select").fadeTo(1000,1);

}
function setCurrentClasses()
{
    $.ajax({
        url:'http://lamp.cse.fau.edu/~kshambli/MP2/includes/getClasses.php',
        type:'POST',
        async: 'false',
        success: function(result)
        {
            if(result != 'empty')
            {
                classes = jQuery.parseJSON(result);
                console.log(classes);

               $.each(classes,function(index,currClass)
                {
                    setSingleClass(currClass);
                    num_classes++;
                });
            }

            hideLoading();  
        }

    });
    


}
function setSingleClass(currClass)
{
    parent = addClass(currClass.title);
    console.log(parent);
    addTimes(parent,currClass.reg_num);
    parent.children('.time').children('.class_times').trigger('change');
}
function setAllClasses()
{
    $.get('classes.xml', function(d){ 

        
  
        $(d).find('course').each(function(){  
            var course = $(this);
            var array = new Object();
             
            array = {
                  'reg_num': course.find("reg_num").text(),
            'subj': course.find("subj").text(),
            'crse': course.find("crse").text(),
            'sect': course.find("sect").text(),
            'title': course.find("title").text(),
            'units': course.find("units").text(),
            'instructor': course.find("instructor").text(),
            'days': course.find("days").text(),
            'time': course.find("time").find("start_time").text()+"-"+course.find("time").find("end_time").text(),
            'building':course.find("place").find("building").text(),
            'room':course.find("place").find("room").text()
            };
            
            

            AllClasses.push(array);    
        });  
        setCurrentClasses();
        
        
        window.loadedClasses = true;
        
    }); 
} 
