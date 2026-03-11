<?php
class crud {
    private $db;
    function __construct($conn){
        $this->db = $conn;
    }

    public function insertContact($cname,$email,$subject,$message){
        try{
            $sql = "INSERT INTO contacts (Name, Email, Subject,Message) VALUES (:cname, :email,:subject, :message)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':cname',$cname);
            $stmt->bindparam(':email',$email);
            $stmt->bindparam(':subject',$subject);
            $stmt->bindparam(':message',$message);
            $stmt->execute();
            return true;
        }
        catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function insertAdmission($name, $fatherName, $gender, $age, $birthday, $grade, $religion, $nationality, $address, $contactNumber, $previousSchool, $previouslyApplied, $email, $cnic){
        try{
            // Check for duplicate CNIC
            $sql = "SELECT id FROM admissions WHERE cnic = :cnic";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':cnic', $cnic);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                return "duplicate";
            }
            // Insert new admission
            $sql = "INSERT INTO admissions (name, father_name, gender, age, birthday, grade, religion, nationality, address, contact_number, previous_school, previously_applied, email, cnic)
                    VALUES (:name, :fatherName, :gender, :age, :birthday, :grade, :religion, :nationality, :address, :contactNumber, :previousSchool, :previouslyApplied, :email, :cnic)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':fatherName', $fatherName);
            $stmt->bindParam(':gender', $gender);
            $stmt->bindParam(':age', $age);
            $stmt->bindParam(':birthday', $birthday);
            $stmt->bindParam(':grade', $grade);
            $stmt->bindParam(':religion', $religion);
            $stmt->bindParam(':nationality', $nationality);
            $stmt->bindParam(':address', $address);
            $stmt->bindParam(':contactNumber', $contactNumber);
            $stmt->bindParam(':previousSchool', $previousSchool);
            $stmt->bindParam(':previouslyApplied', $previouslyApplied);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':cnic', $cnic);
            $stmt->execute();
            return true;
        } catch(PDOException $e){
            return false;
        }
    }

    // Get all admissions
    public function getAdmissions(){
        try{
            $sql = "SELECT * FROM admissions";
            $result = $this->db->query($sql);
            return $result;
        }catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    // Get single admission details
    public function getAdmissionDetails($id){
        try{
            $sql = "SELECT * FROM admissions WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        }catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    // Delete admission
    public function deleteAdmission($id){
        try{
            $sql = "DELETE FROM admissions WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            return true;
        }catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getAdmissionsByGrade($grade){
        try{
            $sql = "SELECT * FROM admissions WHERE grade = :grade";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':grade', $grade);
            $stmt->execute();
            return $stmt;
        }catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getLogins() {
        $sql = "SELECT * FROM student_logins"; 
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getContacts() {
        $sql = "SELECT * FROM contacts"; 
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Edit admission
    public function editAdmission($id, $name, $fatherName, $gender, $age, $birthday, $grade, $religion, $nationality, $address, $contactNumber, $previousSchool, $previouslyApplied, $email, $cnic){
        try{
            $sql = "UPDATE admissions SET 
                name = :name,
                father_name = :fatherName,
                gender = :gender,
                age = :age,
                birthday = :birthday,
                grade = :grade,
                religion = :religion,
                nationality = :nationality,
                address = :address,
                contact_number = :contactNumber,
                previous_school = :previousSchool,
                previously_applied = :previouslyApplied,
                email = :email,
                cnic = :cnic
                WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->bindparam(':name', $name);
            $stmt->bindparam(':fatherName', $fatherName);
            $stmt->bindparam(':gender', $gender);
            $stmt->bindparam(':age', $age);
            $stmt->bindparam(':birthday', $birthday);
            $stmt->bindparam(':grade', $grade);
            $stmt->bindparam(':religion', $religion);
            $stmt->bindparam(':nationality', $nationality);
            $stmt->bindparam(':address', $address);
            $stmt->bindparam(':contactNumber', $contactNumber);
            $stmt->bindparam(':previousSchool', $previousSchool);
            $stmt->bindparam(':previouslyApplied', $previouslyApplied);
            $stmt->bindparam(':email', $email);
            $stmt->bindparam(':cnic', $cnic);
            $stmt->execute();
            return true;
        }catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    // Login methods
    public function deleteLogin($id) {
        try {
            $sql = "DELETE FROM student_logins WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getLoginDetails($id) {
        try {
            $sql = "SELECT * FROM student_logins WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function editLogin($id, $name, $cnic, $email, $password) {
        try {
            $sql = "UPDATE student_logins SET name = :name, cnic = :cnic, email = :email, password = :password WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':cnic', $cnic);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    // Contact methods
    public function deleteContact($id) {
        try {
            $sql = "DELETE FROM contacts WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getContactDetails($id) {
        try {
            $sql = "SELECT * FROM contacts WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function editContact($id, $name, $email, $message) {
        try {
            $sql = "UPDATE contacts SET name = :name, email = :email, message = :message WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':message', $message);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
} 