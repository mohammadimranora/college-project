<?php

$conn =  require_once("pdo-connect.php");
class StudentService
{
    /**
     * @param $data array
     * @return $status boolean
     */

    public static function verifyStudent($data)
    {
        //Cleaning the data here
        $data = self::cleanData($data);

        try {
            //preparing the SQL and executing
            $SQL = "SELECT * FROM student_login WHERE sid = :sid AND password = :password";
            $conn = isset($GLOBALS['conn']) ? $GLOBALS['conn'] : '';
            $statement = $conn->prepare($SQL);
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $statement->execute(array('sid' => $data['user_id'], 'password' => $data['password']));
            $studentData = $statement->fetchAll();
        } catch (\PDOException $e) {
            print_r($e->getMessage());
        }
        return (count($studentData) == 1) ? true : false; //returning the boolean
    }

    /**
     * @param $data string
     * @return $data string
     */

    public static function cleanData($data)
    {
        // In case of array passed by reference
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                //cleaning the data here for all keys of the array
                $value = trim($value);
                $value = htmlspecialchars($value);
                $value = stripslashes($value);
                $value = strip_tags($value);
                $data[$key] = $value;
            }
            return $data;
        } else {
            //cleaning the data value of the passed varible
            $data = trim($data);
            $data = htmlspecialchars($data);
            $data = stripcslashes($data);
            $data = strip_tags($data);
            return $data;
        }
    }

    /**
     * @param $userId string
     */
    public static function loadStudentDataSession($userId)
    {

        try {

            $SQL = "SELECT * FROM student_info WHERE sid= :sid";
            $conn = isset($GLOBALS['conn']) ? $GLOBALS['conn'] : '';
            $statement = $conn->prepare($SQL);
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $statement->execute(array('sid' => $userId));
            $studentData = $statement->fetch();
        } catch (\PDOException $e) {
            print_r($e->getMessage());
        }
        $_SESSION['username'] = $studentData["name"];
        $_SESSION['courseid'] = $studentData["courseid"];
        $_SESSION['UserData'] = $studentData;
    }

    /**
     * @return boolean | string
     */
    public static function isAdmissionOpen()
    {

        try {

            $SQL = "SELECT `msg`, `status` FROM `isadmissionopen`";
            $conn = isset($GLOBALS['conn']) ? $GLOBALS['conn'] : '';
            $statement = $conn->prepare($SQL);
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $statement->execute();
            $admissionStatus = $statement->fetch();
        } catch (\PDOException $e) {
            print_r($e->getMessage());
        }
        return ($admissionStatus['status']) ? true : $admissionStatus['msg'];
    }

    /**
     * @param string $userId
     * @return array $studentData
     */
    public static function getStudentData($userId)
    {

        try {

            $SQL = "SELECT * FROM student_info WHERE sid= :sid";
            $conn = isset($GLOBALS['conn']) ? $GLOBALS['conn'] : '';
            $statement = $conn->prepare($SQL);
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $statement->execute(array('sid' => $userId));
            $studentData = $statement->fetch();
        } catch (\PDOException $e) {
            print_r($e->getMessage());
        }
        return (count($studentData)) ? $studentData : array();
    }

    /**
     * @param string $userId
     * @return boolean $status
     */
    public static function isApplied($userId)
    {

        try {

            $SQL = "SELECT * FROM counsell_status WHERE sid= :sid";
            $conn = isset($GLOBALS['conn']) ? $GLOBALS['conn'] : '';
            $statement = $conn->prepare($SQL);
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $statement->execute(array('sid' => $userId));
            $counsellingStatus = $statement->fetch();
        } catch (\PDOException $e) {
            print_r($e->getMessage());
        }
        return (count($counsellingStatus) == 1) ? true : false;
    }

    /**
     * @param string $userId
     * @param array $data
     * @return int $lastinsertedID
     */
    public static function createStudentPersonalDetails($userId, $data)
    {

        //cleaning the data
        $data = self::cleanData($data);

        try {
            $SQL =  "INSERT INTO
                    personal_details(   sid, 
                                        f_name, 
                                        m_name, 
                                        dob, 
                                        nationality, 
                                        religion, 
                                        family_income, 
                                        student_mobile, 
                                        parents_mobile, 
                                        email, 
                                        adhar, 
                                        kashmiri_migrant)
                    VALUES (:sid,
                            :f_name,
                            :m_name,
                            :dob,
                            :nationality,
                            :religion,
                            :family_income,
                            :student_mobile,
                            :parents_mobile,
                            :email,
                            :adhar,
                            :kashmiri_migrant
                    );";
            //data prepration for the student personal details
            $rawData = array(
                "sid" => $userId,
                "f_name" => $data['fname'],
                "m_name" => $data['mname'],
                "dob" => $data['dob'],
                "nationality" => $data['natioanlity'],
                "religion" => $data['religion'],
                "family_income" => $data['income'],
                "student_mobile" => $data['mobile_student'],
                "parents_mobile" => $data['mobile_parents'],
                "email" => $data['email'],
                "adhar" => $data['ano'],
                "kashmiri_migrant" => $data['Migrant']
            );
            $conn = isset($GLOBALS['conn']) ? $GLOBALS['conn'] : '';
            $statement = $conn->prepare($SQL);
            $conn->beginTransaction();
            $statement->execute($rawData);
            $conn->commit();
            return true;
        } catch (\PDOException $e) {
            $conn->rollback();
            print_r($e->getMessage());
            return false;
        }
    }

    /**
     * @param string $userId
     * @return array $studentPRDetails
     */
    public static function loadExistingPRDetails($userId)
    {

        $userId = self::cleanData($userId);

        try {
            $SQL = "SELECT * FROM `personal_details` WHERE sid= :sid";
            $conn = isset($GLOBALS['conn']) ? $GLOBALS['conn'] : null;
            $statement = $conn->prepare($SQL);
            $statement->execute(array('sid' => $userId));
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $studentPRDetails = $statement->fetch();
            return (count($studentPRDetails)) ? $studentPRDetails : array();
        } catch (\PDOException $e) {
            print_r($e->getMessage());
        }
    }

    /**
     * @param int $userId
     * @param array $data
     * @return boolean true|false
     */
    public static function saveAddress($userId, $data)
    {
        //cleaning the data
        $data = self::cleanData($data);

        try {
            $SQL =  "INSERT INTO
                            `address`(   sid, 
                                        c_vill_moh, 
                                        c_post, 
                                        c_ps, 
                                        c_district, 
                                        c_state, 
                                        c_pincode, 
                                        p_vill_moh, 
                                        p_post, 
                                        p_ps, 
                                        p_district, 
                                        p_state, 
                                        p_pincode)
                    VALUES (:sid, 
                            :c_vill_moh, 
                            :c_post, 
                            :c_ps, 
                            :c_district, 
                            :c_state, 
                            :c_pincode, 
                            :p_vill_moh, 
                            :p_post, 
                            :p_ps, 
                            :p_district, 
                            :p_state, 
                            :p_pincode
                    );";
            //data prepration for the student personal details
            $rawData = array(
                'sid' => $userId, 
                'c_vill_moh' => $data['villmoh1'], 
                'c_post' => $data['post1'], 
                'c_ps' => $data['policestation1'], 
                'c_district' => $data['district1'], 
                'c_state' => $data['state1'], 
                'c_pincode' => $data['pin1'], 
                'p_vill_moh' => $data['villmoh2'], 
                'p_post' => $data['post2'], 
                'p_ps' => $data['policestatio2'], 
                'p_district' => $data['district2'], 
                'p_state' => $data['state2'], 
                'p_pincode' => $data['pin2'] 
            );
            $conn = isset($GLOBALS['conn']) ? $GLOBALS['conn'] : '';
            $statement = $conn->prepare($SQL);
            $conn->beginTransaction();
            $statement->execute($rawData);
            $conn->commit();
            return true;
        } catch (\PDOException $e) {
            $conn->rollback();
            print_r($e->getMessage());
            return false;
        }
    }
}
