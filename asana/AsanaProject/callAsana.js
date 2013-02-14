window.onload = init;

var request;

function init(){    
       
    submitButton.onclick = getProjectsDetails;    
    getProjectTasksButton.onclick = getProjectTasks;    
}

function createRequest() {
    
    request = null;

    try {
        request = new XMLHttpRequest();
    } catch(IE) {
        try {
            request = new ActiveXObject("Msxml2.XMLHTTP");
        } catch(olderIE) {
            try {
                request = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (failed) {
                request = null;
            }
        }
    }
    return request;
}

function getProjectsDetails(){
    
    request = createRequest();
    
    if(request == null){
        alert("unable to make request");
    }       
    else{
        //var apiKey = "QNyYOUi.VD2XA4kGCLGGGwRmo7DUCOBr";
        var url = "getProjects.php";// + escape(apiKey);
        request.open("GET", url, true);
        request.onreadystatechange = displayProjects;
        request.send(null);   
    }
}

function displayProjects(){
    
    if(request.readyState == 4){
        if(request.status == 200){                
            
            var divDetail = document.getElementById("content");
          
            divDetail.innerHTML = " ";
            var info = JSON.parse(request.responseText);          
           
            for(var i = 0; i < info.data.length; i++){
               
                divDetail.innerHTML += "<br/>";
                var projName = info.data[i].name;
                var projID = info.data[i].id;
                if(info.data[i].notes == null){
                    divDetail.innerHTML += projName + " " + projID + '<br/>';
                }
                else{
                    var notes = info.data[i].notes;
                    divDetail.innerHTML += projName + " " + projID + " <br/>" + notes + '<br/>';    
                }
            }
                   
        }
    }  
}

function getProjectTasks(){
    request = createRequest();
    
    if(request == null){
        alert("unable to make request");
    }    
    
    else{
        var url = "getProjectTasks.php";
        request.open("GET", url, true);
        request.onreadystatechange = displayProjectTasks;
        request.send(null);   
    }   
}

function displayProjectTasks(){
   
  if(request.readyState == 4){
        if(request.status == 200){                
            
            var divDetail = document.getElementById("content");
          
            divDetail.innerHTML = " ";
            var info = JSON.parse(request.responseText);          
           
            for(var i = 0; i < info.data.length; i++){
               
                divDetail.innerHTML += "<br/>";
                var projName = info.data[i].name;
                var projID = info.data[i].id;
                
                    divDetail.innerHTML += projName + " " + projID + '<br/>';                
            }
                   
        }
    }  
} 