<?php

class DefaultController extends Controller
{
    public function defaultMethod($param_1 = 'defaultValue')
    {
        echo 'method defaultMethod(' . $param_1 . ')<br>';

        // Create a model
        $defaultModel = $this->model('DefaultModel');
        $defaultModel->param_1 = $param_1;
        echo 'defaultModel->param_1 '. $defaultModel->param_1 . '<br>';

        // Create a view
        $this->view('DefaultView', ['param_1' => $defaultModel->param_1, 'param_2' => 'defaultValue_2']);

        // Receive data from view
        if(isset($_POST['postData_1'])){
            echo 'postData_1 ' . $_POST['postData_1']. '<br>';
        }
    }
}

?>