<?php

namespace app\controllers;

use app\components\MyBehavior;
use app\models\Student;
use Yii;
use yii\db\Query;
use yii\web\Controller;

class FirstController extends Controller
{
    //CALL BEHAVIOR FOR ALL THE FUNCTIONS INSIDE THIS CONTROLLER
    public function behaviors()
    {
        return [
            //Anonymous behavoir
            // MyBehavior::class,
            // [
            //     'class' => MyBehavior::class,
            //     'prop1' => '1',
            //     'prop2' => '2'
            // ],
            //named behavoir
            // 'behavior1' => MyBehavior::class,
            // 'behavior2' => [
            //     'class' => MyBehavior::class,
            //     'prop1' => '1',
            //     'prop2' => '2'
            // ]
        ];
    }
    public function actionIndex()                          // url - http://localhost:8080/first/index
    {

        //$this->layout = false; // Removes the default header footer from main.php
        //return $this->renderPartial('index'); // Removes the default header footer from main.php

        //return $this->render('index');

        //PASS DATA IN THE VIEW
        $response = [];
        $response['pageTitle'] = 'First Application Test';
        $response['demoList'] = ['One', 'Two', 'Three', 'Four', 'Five'];
        // $data = Student::find()->all();
        // echo "<pre>";
        // print_r($data);
        // die;

        //////// INSERT //////////////
        /* $data = new Student();
        $data->name = "Pallavi Gope";
        $data->email = "pallavi@gmail.com";
        $data->phone_no = "7970668997";
        $data->profile_pic = "pallavi.jpg";
        $data->password = "1234";
        $data->created_at = date('Y-m-d H:i:s');
        $data->save();*/

        /////////// UPDATE /////////////////
        /* $data = Student::findOne(7);
        $data->name = "Test Name";
        $data->email = "testname@gmail.com";
        $data->phone_no = "9608798989";
        $data->profile_pic = "testname.jpg";
        $data->password = "1234";
        $data->created_at = date('Y-m-d H:i:s');
        $data->save(); */

        ////////// DELETE //////////////////
        //Student::findOne(9)->delete();

        /////////// SELECT ////////////////
        // $data = Student::findOne(21);
        // $data = Student::find()->one();
        // $data = Student::findAll(['id' => 21]);
        // foreach($data as $row){
        //     echo $row->name.'<br/>';
        // }
        // echo "<pre>"; print_r($data); die;

        // $data = Student::find()->asArray()->all();
        // foreach($data as $row){
        //     echo $row['name'].'<br/>';
        // }

        // $data = Student::find()->where(['id' => 7])->all();

        ///// GET SQL COMMAND /////////////
        // $data = Student::find()->where(['id' => 7, 'name' => 'Test Name'])->orderBy('name', 'DESC')->groupBy('name')->createCommand()->getRawSql();
        // $data = Student::find()->where(['id' => [7,8], 'name' => 'Test Name'])->createCommand()->getRawSql(); // FOR WHERE IN

        //// JOIN ////////
        $data = Student::find()
            ->select('student.*, subject.name as subject_name')
            ->leftJoin('subject', 'subject.student_id=student.id')
            ->where(['student.id' => [7, 8, 9, 10, 11, 12, 21]])
            ->groupBy('student.id')
            ->orderBy('student.name')
            ->all();

        // echo "<pre>";
        // print_r($data);
        foreach ($data as $row) {
            echo "<pre>";
            print($row->name);
        }
        die;

        return $this->render('index', $response);
    }
    public function actionFirstApp()                    //url - http://localhost:8080/first/first-app
    {
        //CALL BEHAVIOR FOR A PARTICULAR FUNCTION
        // $this->attachBehavior('behavior1', [
        //     'class' => MyBehavior::class,
        //     'prop1' => '1',
        //     'prop2' => '2'
        // ]);
        //REMOVE BEHAVIOR FROM A PARTICULAR FUNCTION
        $this->detachBehavior('behavior2');
        echo "test";
        die;
    }
    public function actionInfo()
    {
        $data = Yii::$app->request->get();
        echo "<h4>INFO PAGE: </h4>";
        echo '<pre>';
        print_r($data);
        die;
    }
    public function actionDbconnection()
    {
        echo "<h3>TEST DATABASE CONNECTION: </h3>";

        //GET DATA FROM DATABASE TABLE
        echo "<h1>DATABASE 1</h1>";
        $data = Yii::$app->db->createCommand("SELECT * FROM `student`")->queryAll();
        echo "<pre>";
        print_r($data);

        //GET DATA FROM SECOND DATABASE TABLE
        echo "<h1>DATABASE 2</h1>";
        $data2 = Yii::$app->db2->createCommand("SELECT * FROM `students`")->queryAll();
        echo "<pre>";
        print_r($data2);

        die;
    }
    public function actionQueryBuilder()
    {
        echo "<h4>QUERY BUILDER: </h4>";

        $data = new Student();
        // echo $data->saveData();
        // echo $data->updateData(26);
        // echo $data->deleteData(11);
        echo $data->getData();
    }
    public function actionComponent()
    {
        echo "<h4>COMPONENT: </h4>";

        echo Yii::$app->common->getToken(); // common -> defined key in web.php, getToken() -> function inside CommonComponent
        echo Yii::$app->common->getData();
    }
    public function actionSetSession()
    {
        echo "<h4>SET SESSION: </h4>";
        Yii::$app->session->set('userName', 'Pallavi Gope');

        //SET FLASH MESSAGE
        Yii::$app->session->setFlash('message', 'Session set successfully!');
        //GET FLASH MESSAGE
        echo '<p class="text-success">' . Yii::$app->session->getFlash('message') . '</p>';
    }
    public function actionGetSession()
    {
        echo "<h4>GET SESSION: </h4>";
        echo Yii::$app->session->get('userName');
    }
    public function actionUnsetSession()
    {
        echo "<h4>UNSET SESSION: </h4>";
        // unset(Yii::$app->session['userName']);
        // Yii::$app->session->remove('userName');
        Yii::$app->session->destroy();  //Destroy all the sessions
    }
}
