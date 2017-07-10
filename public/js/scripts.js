    var objectAtTest = {};
    var createTasks = {
                        taskTitle:''
                        };
    var createSteps = [];
    //working
    var loadData = function(user){
            objectAtTest = user;
        }
    
    //Working
    //change the name parameter in the selection to support deletion and dynamic insertion
    var updateUser = function(){
        var e = document.getElementById("skillList");
        var value = e.options[e.selectedIndex].value;
        var text = e.options[e.selectedIndex].text;
        var y = '<input type="text" name="'+value+'" class="skills" id="selectedSkill'+document.getElementById("skills")+(document.getElementById("skills").childElementCount+1)+ '" name="selectedSkill" value="'+ value +'" readonly/><input type="button" value="remove" onclick="removeSelection(this)">';
        document.getElementById("skills").insertAdjacentHTML('beforeend', y);
        console.log(document.getElementById("skills").childElementCount);
    }

    //working but add stlye to cover the removed space
    //function to remove a selection after adding from drop-down list
    var removeSelection = function(link){
        link.parentNode.removeChild(link.previousSibling);
        link.parentNode.removeChild(link);
    }

    //working
    //Adding the edit(true) parameter to the url on click
    function loadingData(e){
        e.preventDefault();
        var url = window.location.href.split("?");
        //console.log(url);
        if(url[1].split("&").length===2){
           return null;
        } else{
             window.location.href += '&edit=true';
        }
    }

    //modal display for task form
    var showModal = function(){
        // Get the modal
        var modal = document.getElementById('myModal');

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        //btn.onclick = function() {
        modal.style.display = "block";
    }
    
    var closeModal = function() {
            document.getElementById('taskName').value='';
            document.getElementById('myModal').style.display = 'none';
            document.getElementById('create_task').style.display = 'block';
            document.getElementById('create_step').style.display = 'none';
            document.getElementById('display_task').style.display = 'none';
            document.getElementById('display_task').className = "display-60-modal";
            document.getElementById('taskForm').className = "display-60-modal";
            createSteps = [];
            if(document.getElementsByClassName('task_entered').length){
            for(var i=0;i<document.getElementsByClassName('task_entered').length;i++){
                document.getElementById('list_of_task').removeChild(document.getElementsByClassName('task_entered')[i]);
                }
            }
            if(document.getElementsByClassName('steps_entered').length){
            for(var i=0;i<=document.getElementsByClassName('steps_entered').length;i++){
                document.getElementById('stepsForTask').removeChild(document.getElementsByClassName('steps_entered')[i]);
                }
            }
    }
    
    var closeFromOutside = function(e){
        if(!document.getElementById('modal_content').contains(event.target)){
            console.log("success");
            document.getElementById('taskName').value='';
            document.getElementById('myModal').style.display = 'none';
            document.getElementById('create_task').style.display = 'block';
            document.getElementById('create_step').style.display = 'none';
            document.getElementById('display_task').style.display = 'none';
            document.getElementById('display_task').className = "display-60-modal";
            document.getElementById('taskForm').className = "display-60-modal";
            if(document.getElementsByClassName('task_entered').length){
            for(var i=0;i<document.getElementsByClassName('task_entered').length;i++){
                document.getElementById('list_of_task').removeChild(document.getElementsByClassName('task_entered')[i]);
                }
            }
            if(document.getElementsByClassName('steps_entered').length){
            for(var i=0;i<=document.getElementsByClassName('steps_entered').length;i++){
                document.getElementById('stepsForTask').removeChild(document.getElementsByClassName('steps_entered')[i]);
                }
            }
        }
    }
        
    var addTask = function(){
        console.log(document.getElementById('completeDate').value);
        createTasks['taskTitle'] = document.getElementById('taskName').value;
        var taskElement = '<div class="task_entered"><input type="text" name="task_title" class="submitted-task-title" id="taskTitle" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" name="selectedStep" value="'+  createTasks['taskTitle'] +'" readonly/><input id="task_remove" type="button" value="remove" onclick="removeStep(this)"><input id="select_to_edit" type="button" value="edit" onclick="editTaskTitle()"><input id="edit_task_after_creating" type="button" value="save" onclick="saveChanges()"></div>';
        document.getElementById("list_of_task").insertAdjacentHTML('beforeend', taskElement);
        document.getElementById('create_task').style.display = 'none';
        document.getElementById('create_step').style.display = 'block';
        document.getElementById('display_task').style.display = 'block';
        document.getElementById('display_task').className = "display-60-modals";
        document.getElementById('taskForm').className = "display-60-modals";    
    }
    
    //work on it for final submit display and hide
    var checkForSteps = function(){
        console.log(document.getElementsByClassName('steps_entered').length);
        if(!(document.getElementById('stepsForTask').childElementCount >=1)){
            document.getElementById('finalSubmit').style.display = 'none';
        } else {
            document.getElementById('finalSubmit').style.display = 'block';
        }
    }
    //-------End of this need to work ----------//
    
    var addStep = function(){
        //console.log(document.getElementById('stepName').value);
        if(createSteps.length == 0){
            createSteps[0] = document.getElementById('stepName').value;
            stepsInsertInitial(document.getElementById('stepName').value);
            document.getElementById('stepName').value = '';
        }else {
            createSteps[createSteps.length] = document.getElementById('stepName').value;
            stepsInsert(document.getElementById('stepName').value);
            document.getElementById('stepName').value = '';
        }
        //document.getElementById('stepName').value = '';
        console.log(document.getElementsByClassName('steps_entered').length);
    }
    var stepsInsertInitial = function(steps){
        var stepDiv = document.createElement("div");
        stepDiv.className="steps_entered";
        
        var step = document.createElement("input");
        step.type = "text";
        step.name = "step_1";
        step.className="steps-insert submitted-task-step";
        step.value= steps;
        step.readOnly = true;
        
        stepDiv.appendChild(step);
        stepDiv.appendChild(removeButton());
        stepDiv.appendChild(editButton());
        stepDiv.appendChild(saveButton());
        document.getElementById('stepsForTask').appendChild(stepDiv);
        
        document.getElementById('finalSubmit').style.display = 'block';
    }
     function removeButton(){
         var remove = document.createElement("input");
         remove.type = "button";
         remove.className= "removeStep";
         remove.value = "remove";
         remove.addEventListener("click", removeStep, true);
         return remove;
     }
    function editButton(){
         var edit = document.createElement("input");
         edit.type = "button";
         edit.className = "editStep";
         edit.value = "edit";
         edit.addEventListener("click", editStep, true);
         return edit;
     }
    function saveButton(){
         var save = document.createElement("input");
         save.type = "button";
         save.className = "saveStep";
         save.value = "Save";
         save.addEventListener("click", saveStep, true);
         return save;
     }
    var stepsInsert = function(steps){
        var stepDiv = document.createElement("div");
        stepDiv.className="steps_entered";
        
        var step = document.createElement("input");
        step.type = "text";
        step.name = "step_"+setTaskFormName();
        step.className="steps-insert submitted-task-step";
        step.value= steps;
        step.readOnly = true;
        
        stepDiv.appendChild(step);
        stepDiv.appendChild(removeButton());
        stepDiv.appendChild(editButton());
         stepDiv.appendChild(saveButton());
         document.getElementById('stepsForTask').appendChild(stepDiv);
    }
    
    var editTaskTitle = function(e){
        document.getElementById('taskTitle').readOnly = false;
        document.getElementById('select_to_edit').style.display = "none";
        document.getElementById('edit_task_after_creating').style.display = "block";
        
    }
    var saveChanges = function(e){
        createTasks['taskTitle'] = document.getElementById('taskTitle').value;
        document.getElementById('taskTitle').readOnly = true;
        document.getElementById('select_to_edit').style.display = "block";
        document.getElementById('edit_task_after_creating').style.display = "none";
    }
    function removeStep(){
        this.parentNode.style.display = 'none';
        this.previousSibling.disabled = true;
        checkForSteps();
        
    }
    var setTaskFormName = function(){
        return document.getElementsByClassName("steps_entered").length;
    }
    var editStep = function(ele){
        this.previousSibling.previousSibling.readOnly = false;
        this.nextSibling.style.display = "block";
        this.style.display = "none";
    }
    var saveStep = function(ele){
        this.previousSibling.previousSibling.previousSibling .readOnly = true;
        this.previousSibling.style.display = "block";
        this.style.display = "none";
    }
    