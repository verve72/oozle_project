$(document).ready(function(){

    //get projects
    $("#submitButton").click(function(){       
        $.ajax({            
            url:"getProjects.php",
            dataType: 'json', 
            cache: false,
            success: function(json){ 
                $('#content').empty();
                $('#content').css("padding", "5px");
                
                $('#content').append('<tr><th>Project Name</th>' + '<th>Project ID</th>' + "&nbsp;" + '<th>LastModified</th></tr>');
               
                $.each(json.data,function(){                
                    $('#content').append('<tr><td>'+ this.name + '</td>' + '<td>' + this.id + '</td>' + 
                        '<td>' + this.modified_at + '</td>' + '</tr>');
                    $('tr,th,td').css("padding", "10px");
                });                
            }   
        });       
    });    
    
    //get specific tasks in a project
    $("#getProjectTasksButton").click(function(){
       
        $.ajax({            
            url:"getProjectTasks.php",
            dataType: 'json', 
            success: function(json){     
                //var info = JSON.stringify(json);
                //alert(info);
                $('#content').empty();
                $.each(json.data,function(){ 
                    $('#content').css('border','none');
                
                    if(this.completed == false){
                        $('#content').append("Task: " + this.name + " ID: " + this.id +
                            "<br/>Notes: " + this.notes + "<br/><br/>");
                    }                                
                });                
            }       
        });       
    });    
    
    //create a new task to project
    $('#createNewTaskButton').click(function(){        
        $.ajax({
            url:"newTaskToProject.php",
            dataType:'json',
            success:function(json){  
                 $('#content').empty();
                var info = JSON.stringify(json);               
                $('#content').css('border','none');
                $('#content').append(info);
            }
        });    
    });    
    
    //creates a single task not based on project
      $('#createSingleTaskButton').click(function(){        
        $.ajax({
            url:"createTask.php",
            dataType:'json',
            success:function(json){  
                 $('#content').empty();
                var info = JSON.stringify(json);               
                $('#content').append(info);
            }
        });    
    });       
    
    
    
   //get user info, based on api key retrieved in php
   $('#getUserInfoButton').click(function(){         
        $.ajax({
            url:"getUserInfo.php",
            dataType:'json',
            success:function(json){ 
                $('#content').empty();
                var info = JSON.stringify(json);                
                $('#content').append(info);
            }
        });    
    });                
        
        //get all data, returns json decoded by php
 $('#getAllButton').click(function(){        
        $.ajax({
            url:"getAll.php",
            dataType:'html',
            success:function(html){ 
                $('#content').empty();
                var info = JSON.stringify(html);                
                $('#content').append(info);
            }
        });    
    });      
    
    
    
    
    
    
    
});