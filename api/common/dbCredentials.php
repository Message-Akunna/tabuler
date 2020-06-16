<?php
    error_reporting(0);
    /**
     * Author: Akunna Message
     * Created at: 26 May, 2020
     * Description: Database Connection
     */

    date_default_timezone_set('Africa/Lagos'); //Nigeria timezone

    define('ONE_SIGNAL_APP_ID',"");
    $currentDateTime = gmdate("Y-m-d H:i:s");
    $currentDate = gmdate("Y-m-d");

    class Database{
        private $host;
        private $user;
        private $pass;
        private $db;
        private $port;
        public $mysqli;
        // public $last_id;

        var $table;
        var $columns;
        var $values;

        public function __construct() {
            $this->db_connect();
        }

        private function db_connect() {

                if(!$this->isLocalhost()){
                    #######Tabular################
                    //    $this->host = '';
                    
                    // 	// $this->user = 'root';
                    // 	$this->user = '';
                    // 	// $this->pass = '';
                    // 	$this->pass = '';
                    //  // $this->db = '';
                    // 	$this->db = '';

                    // 	$this->port = '3306';

                }else{
                    // $this->host = 'localhost';
                    $this->host = 'localhost';
                
                    // $this->user = 'root';
                    $this->user = 'root';
                    // $this->pass = '';
                    $this->pass = '';
                    // $this->db = 'schooling_database';
                    $this->db = 'tabuler';

                    $this->port = '3306';

                }
                //echo $this->host;
        
            
            $this->mysqli = new mysqli($this->host, $this->user, $this->pass, $this->db, $this->port);
            // mysqli_set_charset($this->mysqli,"utf8mb4");
            
            //mysqli_character_set_name($this->mysqli);
            //$this->mysqli->query('SET names=utf8mb4');
            //$this->mysqli->query('SET character_set_results=utf8mb4');
            //$this->mysqli->query("SET collation_connection = utf8mb4_unicode_ci");

            /*$this->mysqli->query('SET character_set_results=utf8mb4');
            $this->mysqli->query('SET names=utf8mb4');
            $this->mysqli->query('SET character_set_client=utf8mb4');
            $this->mysqli->query('SET character_set_connection=utf8mb4');
            $this->mysqli->query('SET character_set_results=utf8mb4');
            $this->mysqli->query('SET collation_connection=utf8mb4_unicode_ci');*/

            //$this->mysqli->error_reporting();
            return $this->mysqli;
        }

        public function prepare($query){
            return $this->mysqli->prepare($query);
        }

        public function query($query){
            return $this->mysqli->query($query);
        }

        /**
         * generateFileName method
         *
         * Generated a file name by uploading
         * @return boolean
         */
        function isLocalhost($whitelist = ['127.0.0.1', '::1', 'localhost']) {
            return in_array($_SERVER['REMOTE_ADDR'], $whitelist);
        }
        //Check user email
        public function check_user_email($email){
            $queryValidation = $this->mysqli->prepare("SELECT user.email FROM user WHERE email = ?");
            $queryValidation->bind_param("s", $email);
            $queryValidation->execute();
            $queryValidation->bind_result($email);
            $queryValidation->store_result();
            //$queryValidation->fetch();

            if($queryValidation->num_rows() == 1 && $queryValidation->errno == 0){
                //$queryValidation->fetch();
                return true;
            }else{
                return false;
            }
            $queryValidation->close();  
        } 
        // Get user data
        public function get_user_data($id){
            $user_id = $id;
            $array_user_data = [];
            $first_name = ""; $last_name = ""; $other_names = ""; $gender = ""; 
            $address = ""; $phoneno = ""; $email = ""; $password = ""; $user_type = "";
            $queryValidation = $this->mysqli->prepare("SELECT * FROM user WHERE id = $id");
            $queryValidation->execute();
            $queryValidation->bind_result($id, $first_name, $last_name, $other_names, $gender, $address, $phoneno, $email, $password, $user_type);
            $queryValidation->store_result();

            if($queryValidation->num_rows() > 0  && $queryValidation->errno == 0){
                while($queryValidation->fetch()){
                    $result['id'] = (string)$id; 
                    $result['first_name'] = (string)$first_name; 
                    $result['last_name'] = (string)$last_name; 
                    $result['other_names'] = (string)$other_names; 
                    $result['gender'] = (string)$gender; 
                    $result['address'] = (string)$address; 
                    $result['phoneno'] = (string)$phoneno; 
                    $result['email'] = (string)$email; 
                    $result['password'] = (string)$password; 
                    $result['user_type'] = $this->get_user_type_data((string)$user_type, $user_id);
                    // $result['user_type'] = (string)$user_type;
                    
                    array_push($array_user_data, $result);
                }
                return $array_user_data;
            }else{
                return "NIL";
            }
            $queryValidation->close();
        }
        // Get user type data
        public function get_user_type_data($user_type, $user_id){

            $array_user_type_data = [];
            // $optionalQuery = "";
            // if(strlen($otherOption) > 0){$otherOption
            //     $optionalQuery = "";
            // }
            if($user_type == "staff"){
                //get unique staff data from staff table
                $id = ""; $reg_no = ""; 
                $queryValidation = $this->mysqli->prepare("SELECT * FROM staff WHERE reg_no = $user_id");
                $queryValidation->execute();
                $queryValidation->bind_result($id, $reg_no);
                $queryValidation->store_result();
    
                if($queryValidation->num_rows() > 0  && $queryValidation->errno == 0){
                    while($queryValidation->fetch()){
                        $result['id'] = (string)$id; 
                        $result['reg_no'] = (string)$reg_no; 
                        $result['user_type'] = (string)$user_type;
                        array_push($array_user_type_data, $result);
                    }
                    return $array_user_type_data;
                }else{
                    return "NIL";
                }
                $queryValidation->close();
            }else if($user_type == "lecturer"){
                //get unique lecturers data from lecturer table
                $id = ""; $department = ""; $course = ""; $reg_no = ""; 
                $queryValidation = $this->mysqli->prepare("SELECT * FROM lecturer WHERE reg_no = $user_id");
                $queryValidation->execute();
                $queryValidation->bind_result($id, $department, $course, $reg_no);
                $queryValidation->store_result();
    
                if($queryValidation->num_rows() > 0  && $queryValidation->errno == 0){
                    while($queryValidation->fetch()){
                        $result['id'] = (string)$id;
                        $result['department'] = $this->get_department_data($department);
                        $result['course'] = $this->get_course_data((int)$course);
                        $result['reg_no'] = (string)$reg_no;
                        $result['user_type'] = (string)$user_type;
                        array_push($array_user_type_data, $result);
                    }
                    return $array_user_type_data;
                }else{
                    return "NIL";
                }
                $queryValidation->close();
            }else if($user_type == "student"){
                //get unique students data from student table
                $id = ""; $session = ""; $department = ""; $reg_no = ""; 
                $queryValidation = $this->mysqli->prepare("SELECT * FROM student WHERE reg_no = $user_id");
                $queryValidation->execute();
                $queryValidation->bind_result($id, $session, $department, $reg_no);
                $queryValidation->store_result();
    
                if($queryValidation->num_rows() > 0  && $queryValidation->errno == 0){
                    while($queryValidation->fetch()){
                        $result['id'] = (string)$id;
                        $result['session'] = (string)$session;
                        $result['department'] = $this->get_department_data((int)$department);
                        $result['reg_no'] = (string)$reg_no;
                        $result['user_type'] = (string)$user_type;

                        array_push($array_user_type_data, $result);
                    }
                    return $array_user_type_data;
                }else{
                    return "NIL";
                }
                $queryValidation->close();
            }
        }

        // Get lecturer with course id data
        public function get_course_lecturer_data($course_id){
            $array_user_type_data = [];
            //get unique lecturers data from lecturer table
            $id = ""; $department = ""; $user_type = "lecturer";  $course = (int)$course_id; $reg_no = ""; 
            $queryValidation = $this->mysqli->prepare("SELECT * FROM lecturer WHERE course = $course_id");
            $queryValidation->execute();
            $queryValidation->bind_result($id, $department, $course, $reg_no);
            $queryValidation->store_result();

            if($queryValidation->num_rows() > 0  && $queryValidation->errno == 0){
                while($queryValidation->fetch()){
                    $result['id'] = (string)$id;
                    $result['department'] = $this->get_department_data($department);
                    $result['course'] = (string)$course;
                    $result['reg_no'] = (string)$reg_no;
                    $result['user_type'] = $user_type;
                    array_push($array_user_type_data, $result);
                }
                return $array_user_type_data;
            }else{
                return null;
            }
        }

        // Get department data
        public function get_department_data($department_id){
            $array_department_data = []; $id = ""; $department_name = ""; 
            $queryValidation = $this->mysqli->prepare("SELECT * FROM department WHERE id = $department_id");
            $queryValidation->execute();
            $queryValidation->bind_result($id, $department_name);
            $queryValidation->store_result();

            if($queryValidation->num_rows() > 0  && $queryValidation->errno == 0){
                while($queryValidation->fetch()){
                    $result['id'] = (string)$id;
                    $result['department_name'] = (string)$department_name;

                    array_push($array_department_data, $result);
                }
                return $array_department_data;
            }else{
                return "NIL";
            }
            $queryValidation->close();
        }
        // Get course data
        public function get_course_data($course_id){
            $array_course_data = []; $id = ""; $name = ""; $course_code = ""; $department = ""; 
            $queryValidation = $this->mysqli->prepare("SELECT * FROM course WHERE id = $course_id");
            $queryValidation->execute();
            $queryValidation->bind_result($id, $name, $course_code, $department);
            $queryValidation->store_result();

            if($queryValidation->num_rows() > 0  && $queryValidation->errno == 0){
                while($queryValidation->fetch()){
                    $result['id'] = (string)$id;
                    $result['name'] = (string)$name;
                    $result['course_code'] = (string)$course_code;
                    $result['department'] = $this->get_department_data($department);
                    array_push($array_course_data, $result);
                }
                return $array_course_data;
            }else{
                return "NIL";
            }
            $queryValidation->close();
        }
        // Get period data
        public function get_period_data($period_id){
            // 
            $array_period_data = []; $id = ""; $period_name = ""; $time = ""; 
            $queryValidation = $this->mysqli->prepare("SELECT * FROM period WHERE id = $period_id");
            $queryValidation->execute();
            $queryValidation->bind_result($id, $period_name, $time);
            $queryValidation->store_result();

            if($queryValidation->num_rows() > 0  && $queryValidation->errno == 0){
                while($queryValidation->fetch()){
                    $result['id'] = (string)$id;
                    $result['period_name'] = (string)$period_name;
                    $result['time'] = (string)$time;
                    array_push($array_period_data, $result);
                }
                return $array_period_data;
            }else{
                return "NIL";
            }
            $queryValidation->close();
        }
        // Get week day data
        public function get_week_day_data($week_day_id){
            //
            $array_week_day_data = []; $id = ""; $day = ""; 
            $queryValidation = $this->mysqli->prepare("SELECT * FROM calender WHERE id = $week_day_id");
            $queryValidation->execute();
            $queryValidation->bind_result($id, $day);
            $queryValidation->store_result();

            if($queryValidation->num_rows() > 0  && $queryValidation->errno == 0){
                while($queryValidation->fetch()){
                    $result['id'] = (string)$id;
                    $result['day'] = (string)$day;
                    array_push($array_week_day_data, $result);
                }
                return $array_week_day_data;
            }else{
                return "NIL";
            }
            $queryValidation->close();
        }
        // Get hall data
        public function get_lecture_hall_data($lecture_hall_id){
            // 
            $array_week_day_data = []; $id = ""; $hall_name = ""; $capacity = ""; 
            $queryValidation = $this->mysqli->prepare("SELECT * FROM lecture_halls WHERE id = $lecture_hall_id");
            $queryValidation->execute();
            $queryValidation->bind_result($id, $hall_name, $capacity);
            $queryValidation->store_result();

            if($queryValidation->num_rows() > 0  && $queryValidation->errno == 0){
                while($queryValidation->fetch()){
                    $result['id'] = (string)$id;
                    $result['hall_name'] = (string)$hall_name;
                    $result['capacity'] = (string)$capacity;
                    array_push($array_week_day_data, $result);
                }
                return $array_week_day_data;
            }else{
                return "NIL";
            }
            $queryValidation->close();
        }
        
        // Close Mysql connection
        public function close(){
            return $this->mysqli->close();
        }

    }

?>