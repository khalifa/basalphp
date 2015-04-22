<?php

/**
 * The test controller
 */
class TestController extends Controller
{
    /**
     * The default controller method.
     *
     * @return void
     */
    public function defaultMethod($param_1 = 'defaultValue')
    {
        //echo 'method defaultMethod(' . $param_1 . ')<br>';

        // Create a model
        $defaultModel = $this->model('DefaultModel');
        $defaultModel->param_1 = $param_1;
        //echo 'defaultModel->param_1 '. $defaultModel->param_1 . '<br>';

        // Receive data from view
        $postData = $this->model('DefaultModel');
        if(isset($_POST['postData_1'])){
            //echo 'postData_1 ' . $_POST['postData_1']. '<br>';
            $postData->param_1 = $_POST['postData_1'];
        }

        // Create a view
        $this->view('TestView', ['param_1' => $defaultModel->param_1], ['param_1' => $postData->param_1]);
    }
}

?>