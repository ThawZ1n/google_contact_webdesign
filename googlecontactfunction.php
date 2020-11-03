<?php






//common start
function runQuery($sql){
    $con = con();
    if(mysqli_query($con,$sql)){
        return true;
    }else{
        die("Query Fail".mysqli_error());
    }
}

function showTime($timestamp,$format="d/M/Y"){
    return date($format,strtotime($timestamp));
}
function showTimeH($timestamp,$format="h:i:s"){
    return date($format,strtotime($timestamp));
}

function fetch($sql){
    $query = mysqli_query(con(),$sql);
    $row= mysqli_fetch_assoc($query);
    return $row;
}

function fetchAll($sql){
    $query = mysqli_query(con(),$sql);
    $rows = [];
    while($row = mysqli_fetch_assoc($query)){
        array_push($rows,$row);
    }
    return $rows;
}
function linkTo($l){
    echo "<script>location.href='$l'</script>";
}

function countTotal($table,$condition = 1){
    $sql = "SELECT COUNT(id) FROM $table WHERE $condition";
    $table = fetch($sql);
    return $table['COUNT(id)'];
}

function alert($str,$color="danger"){
    echo "<P class='alert alert-$color'>$str</P>";
}
function short($str,$length="100"){
    return substr($str,0,$length)."...See More";
}




//common end






function old($inputName){
    if(isset($_POST[$inputName])){
        return $_POST[$inputName];
    }else{
        return "";
    }
}

function textFilter($text){
    $text = trim($text);
    $text = htmlentities($text,ENT_QUOTES);
    $text = stripcslashes($text);
    return $text;
}

function setError($inputName,$message){
    $_SESSION['error'][$inputName] = $message;
}

function getError($inputName){
    if(isset($_SESSION['error'][$inputName])){
        return $_SESSION['error'][$inputName];
    }else{
        return "";
    }
}


function clearError(){
    $_SESSION['error'] = [];
}




function register(){
    $errorStatus = 0;
    $name = "";
    $email = "";
    $phone = "";
    $upload = "";

    if(empty($_POST['name'])){
        setError("name","Name is required");
        $errorStatus=1;
    }else{
        if(strlen($_POST['name']) < 5){
            setError("name","Name is too short");
            $errorStatus=1;
        }else{
            if(strlen($_POST['name']) > 50){
                setError("name","Name is too long");
                $errorStatus=1;
            }else{
                if (!preg_match("/^[a-zA-Z' ]*$/",$_POST['name'])) {
                    setError('name',"Only letters and white space allowed");
                    $errorStatus=1;
                }else{
                    $name = textFilter($_POST['name']);
                }
            }
        }
    }

    if(empty($_POST['email'])){
        setError("email","Email is required");
        $errorStatus=1;
    }else{
        if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
            setError("email","Email format incorrect");
            $errorStatus=1;
        }else{
            $email = textFilter($_POST['email']);
        }
    }

    if(empty($_POST['phone'])){
        setError("phone","Phone is required");
        $errorStatus=1;
    }else{
        if(!preg_match("/^[0-9 ]*$/",$_POST['phone'])){
            setError("phone","Phone format incorrect");
            $errorStatus=1;
        }else{
            $phone = textFilter($_POST['phone']);
        }
    }

    $supportFileType = ['image/jpeg','image/png'];

    if(isset($_FILES['upload']['name'])){
        $tempFile = $_FILES['upload']['tmp_name'];
        $fileName = $_FILES['upload']['name'];
        if(in_array($_FILES['upload']['type'],$supportFileType)){
            $saveFolder = "store/";
            $newName = $saveFolder.uniqid()."_".$fileName;
            if(move_uploaded_file($tempFile,$newName)){
                header("location:contact.php");
            }
        }else{
            setError("upload","File Incorrect");
            $errorStatus=1;
        }

    }else{
        setError("upload","File is required");
        $errorStatus=1;
    }




    if(!$errorStatus){
        $sql = "INSERT INTO googlecontact (name,email,phone,photo) VALUES ('$name','$email','$phone','$newName')";
        if(runQuery($sql)){
            linkTo("googlecontact.php");
        }else{
            
        }
    }else{
        echo "";
    }



}

    function contact(){
        $sql = "SELECT * FROM googlecontact";
        return fetchAll($sql);
    }