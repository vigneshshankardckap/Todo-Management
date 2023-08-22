<?php

require 'model/model.php';

class UserController
{

    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModule();
    }

    public function LandingPage()
    {
        $tasks = $this->userModel->addedTaskDetails();
        require "View/homepage.php";
    }

    public function login()
    {
        require "signup.php";
    }

    public function loginLogic()
    {

        $this->userModel->logincheck($_POST);

    }

    public function signUp()

    {
        require "signup.php";
    }

    public function list()
    {


        $category_id =  $_REQUEST['category_id'];

        $fetchAllDataDo = $this->userModel->fetchDataFromDo($category_id);
        $fetchAllDataDefer = $this->userModel->fetchDataFromdefer($category_id);
        $fetchAllDataDelegate = $this->userModel->fetchDataFromdelegate($category_id);
        $fetchAllDataDelete = $this->userModel->fetchDataFromdelete($category_id);
        // $all = $this->userModel->fetchedComment($_REQUEST);





        // $category_id =  $_REQUEST['category_id'];
        // $this->userModel->fetchDataFromDo($category_id);
        // // $this->userModel->fetchDataFromdefer($category_id);
        // // $this->userModel->fetchDataFromdelegate($category_id);
        // // $this->userModel->fetchDataFromdelete($category_id);

        // $this->userModel->addedTaskDetails();
       
       require "View/listing.php";
    //    $this->userModel->fetchDataFromDo();
    //   $this->fetchDatas($_REQUEST['category_id']);

    }

    public function list_page(){
       $category_id = intval($_POST["Id"]);
       $this->userModel->list_page($category_id);

    }


    public function fetch_proofession()
    {
        $this->userModel->fetch_proofession();
    }


    public function signupLogic()

    {
        $this->userModel->signUp($_POST);
    }

    public function store()
    {

        $this->userModel->store($_REQUEST);
        
    }

    public function addTask()

    {
        $this->userModel->addTask($_REQUEST);
    } 

    public function addedTaskDetails()

    {
        require "View/homepage.php";
    }

    public function logout()

    {
        session_start();
        unset($_SESSION["name"]);
        unset($_SESSION["email"]);
        unset($_SESSION["picture"]);
        session_destroy();
        header("location:/");
    }

    public function deleteAddedTask()

    {

        $this->userModel->deleteAddedTask($_REQUEST);
    }

    public function editTask()

    {       
            $this->userModel->editTask($_REQUEST);
    }
    
     public function updateTask()

     {

        
        $EditId = intval($_POST["editId"]);
        $editTaskName = $_POST["editTaskName"];
        $user_id = intval($_POST["user_id"]);

        $data = [
            "EditId"=>$EditId,
            "editTaskName"=>$editTaskName,
            "editTaskDate"=>$_POST["editTaskdate"],
            "user_id"=>$user_id
        ];

        $this->userModel->updateTask($data);

    }

    public function addComment()

    {
        $this->userModel->addComment($_REQUEST);
    }

    public function completedTask()

    {
        $this->userModel->completedTask($_REQUEST['id']);
    }

    public function deleteTask()

    {

        $this->userModel->deleteTask($_REQUEST['id']);
    }

    public function particulartask()

    {
        $this->userModel->viewAllTask($_REQUEST);
    }

    public function completed()

    {

        $this->userModel->completed($_REQUEST);
    }

    public function commFetch() {
        // var_dump($_REQUEST);
        $this->userModel->commFetch($_REQUEST);
    }
    public function permanentDel()

    {
        $this->userModel->permanentDel($_REQUEST['id']);
    }
    
}
