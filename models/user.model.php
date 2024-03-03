<?php

// ======== create Users ========
function createUser(string $fsname, string $lsname, string $dateOfbirth, string $phoneNumer, string $email, string $password, string $salary, string $positions,string $roles,string $departments,string $leaves) : bool
{
    global $connection;
    $statement = $connection->prepare("insert into users (first_name, last_name, date_of_birth, phone_number, email, password,salary, position_id, role_id, department_id,total_allowed_leave)
    values (:first_name, :last_name,:date_of_birth, :phone_number, :email, :password, :salary, :postion_id, :role_id, :department_id, :total_allowed_leave)");

    $statement->execute([
        ':first_name' => $fsname,
        ':last_name' => $lsname,
        ':date_of_birth' => $dateOfbirth,
        ':phone_number' => $phoneNumer,
        ':email' => $email,
        ':password' => $password,
        ':salary' => $salary,
        ':postion_id'=> $positions,
        ':role_id'=> $roles,
        ':department_id'=>$departments,
        ':total_allowed_leave'=>$leaves,
    ]);

    return $statement->rowCount() > 0;
}

// ======== get select of departments ==========
function getDepartments():array{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM departments");
    $statement->execute();
    return $statement->fetchAll();
}

// ======= delete of users ======== 
function deleteUser(int $id) : bool
{
    global $connection;
    $statement = $connection->prepare("delete from users where uid = :id");
    $statement->execute([':id' => $id]);
    return $statement->rowCount() > 0;
}

// ======== get select of postions =========
function getPositions():array{
    global $connection;
    $statment = $connection->prepare("SELECT * FROM postions");
    $statment->execute();
    return $statment->fetchAll();
}

// ======== get select of user roles ========
function getUserrole():array{
    global $connection;
    $statment = $connection->prepare("SELECT * FROM userroles");
    $statment->execute();
    return $statment->fetchAll();
}

// ======== get select of users ========
function getUsers():array{
    global $connection;
    $statment = $connection->prepare("SELECT * FROM users");
    $statment->execute();
    return $statment->fetchAll();
}


function getRolesAll(): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM userroles");
    $statement->execute();
    return $statement->fetchAll();
}

// ===== get All user manager =====
function getAllManager(): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM user_manager");
    $statement->execute();
    return $statement->fetchAll();
}