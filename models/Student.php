<?php

namespace app\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "student".
 *
 * @property int $id
 * @property string $name
 * @property string|null $email
 * @property string $phone_no
 * @property string|null $profile_pic
 * @property string $password
 * @property string $created_at
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'phone_no', 'password'], 'required'],
            [['created_at'], 'safe'],
            [['name'], 'string', 'max' => 40],
            [['email'], 'string', 'max' => 20],
            [['phone_no'], 'string', 'max' => 14],
            [['password'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'phone_no' => 'Phone No',
            'profile_pic' => 'Profile Photo',
            'password' => 'Password',
            'created_at' => 'Created At',
        ];
    }
    public function saveData()
    {
        // ------------- INSERT --------------//
        $sql = Yii::$app->db->createCommand()->insert('student', [
            'name' => 'Test Name 2',
            'email' => 'testname2@gmail.com',
            'phone_no' => '7876767676',
            'profile_pic' => 'testname.jpg',
            'password' => '1234',
            'created_at' => date('Y-m-d H:i:s')
        ])->execute();
        $lastId = Yii::$app->db->getLastInsertID();
        return $lastId;
    }
    public function updateData($id)
    {
        Yii::$app->db->createCommand()->update('student', [
            'name' => 'Test Name 3',
            'email' => 'testname3@gmail.com',
            'phone_no' => '7876237676',
            'profile_pic' => 'testname3.jpg',
            'password' => '1234',
        ], array('id' => $id))->execute();
        return $id;
    }
    public function deleteData($id)
    {
        Yii::$app->db->createCommand()->delete('student', array('id' => $id))->execute();
        return $id;
    }
    public function getData()
    {
        // $query = (new Query())->select('student.*')->from('student')->where(['name' => 'DSSR'])->all();

        //********** JOINING ***********/
        $query = (new Query())->select('student.*')->from('student')
                ->where(['name' => 'DSSR'])
                ->andWhere(['email' => 'dssr@gmail.com'])
                ->orWhere(['email' => 'dssr@gmail.com'])
                ->andFilterWhere([
                    'or',
                    ['like', 'email', 'dssr'] 
                ])
                ->groupBy(['name', 'email'])
                ->having('id>1')
                ->orderBy('name')
                ->limit(10)
                ->offset(5)
                ->all();

        echo "<pre>";
        print_r($query);
    }
}
