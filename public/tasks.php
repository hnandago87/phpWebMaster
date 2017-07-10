<?php require_once("../includes/db_connections_open.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include("../includes/layouts/header.php") ?>
<?php if(isset($_POST["taskName"])){
    $task_title = $_POST["taskName"];
    echo $task_title;
    }
?>
<div class="container">
    <div class="task_title"><div class="task_text"><span>Task for students</span></div></div>
    <div class="task_title task_container">
        <div class="display-60 task_container">
            <div><h3>Create a new task</h3></div>
             <div class="create_new_task">
                <label class="crc crc-text">Add new task</label>
                <button id="myBtn" class="btn crc" onclick="showModal()">Task</button>
            </div>
            <div id="myModal" class="modal" onclick="closeFromOutside()">
                <div class="modal-content" id="modal_content">
                    <span class="close" onclick="closeModal()">&times;</span>
                    <div id="display_task" class="display-60-modal">
                    <h5>Display the taska and step</h5>
                        <form>
                            <div id="list_of_task">
                                <input id="taskDisplayed" class="listOfTask" type="text" readonly style="display:none;">
                            </div>
                            <div id="stepsForTask">
                                <div class="steps_entered"><input name="step_0" id="step_initial" type="text" readonly style="display:none;"></div>
                            </div>
                            <div id="finalSubmit">
                                <input type="button" value="submit">
                            </div>
                        </form>
                    </div>
                    <div id="taskForm" class="display-60-modal">
                    <div id="create_task">
                        <div>
                            <p>Enter the goal:</p>
                            <input type="text" name="taskName" id="taskName" pattern=".{3,}" maxlength=50>
                        </div>
                        <div>
                            <p>Select completion date for your goal:</p>
                            <input type="date" name="completeDate" id="completeDate" >
                        </div>
                        <div>
                            <input type="button" value="Add Task" onclick="addTask()">
                            <!-- <input type="button" value="Cancel" > -->
                        </div>
                    </div>
                    <div id="create_step">
                        <div>
                            <p>Enter the step for your task:</p>
                            <input type="text" name="stepName" id="stepName" pattern=".{3,}" maxlength=100>
                        </div>
                        <div>
                            <input type="button" value="Add Step" onclick="addStep()">
                            <!-- <input type="button" value="Cancel" > -->
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="display-60">
            <div class="list_task">
                <h3>List of the current pending task</h3>
            </div>
        </div>
    </div>
</div>
<?php include("../includes/layouts/footer.php") ?>