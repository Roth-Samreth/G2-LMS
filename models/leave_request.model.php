<?php

// ======== post insert in data ======== 
function postLeaveData(string $title, string $description): bool
{

    global $connection;
    $statement = $connection->prepare("insert into leave_status (title, description) values (:title, :description)");
    $statement->execute([
        ':title' => $title,
        ':description' => $description
    ]);

    return $statement->rowCount() > 0;
}

// ======== get select data All =========
function getLeaveData(): array
{
    global $connection;
    $statement = $connection->prepare("select * from leave_status");
    $statement->execute();

    return $statement->fetchAll();
}

// ========= get select All of total requests ======== 
function getALlleaves()
{
    global $connection;
    $statement = $connection->prepare("select * from total_requests");
    $statement->execute();

    return $statement->fetchAll();
}

// ======= Update data ========
function updateLeaveData(int $status, int $request_id): bool
{
    global $connection;
    $statement = $connection->prepare("update leave_requests set status_id =:status_id where request_id = :request_id");
    $statement->execute([
        ':request_id' => $request_id,
        ':status_id' => $status
    ]);

    return $statement->rowCount() > 0;
}

// ========= Remove All of data ==========
function removeAll(): bool
{
    global $connection;
    $statement = $connection->prepare("delete from leave_requests");
    $statement->execute();
    return $statement->rowCount() == 0;
}

// ======== delete data =========
function deleteLeaveData(int $request_id): bool
{
    global $connection;
    $statement = $connection->prepare("delete from leave_requests where request_id = :request_id");
    $statement->execute([':request_id' => $request_id]);
    return $statement->rowCount() > 0;
}
// =========Get leave request on specific date======

function allLeavesToday($date)
{
    global $connection;
    $statement = $connection->prepare("select * from total_requests where start_date=:date");
    $statement->execute(
        [':date' => $date]
    );

    return $statement->fetchAll();
}
function allLeavesNotify()
{
    global $connection;
    $statement = $connection->prepare("select * from total_requests order by request_id limit 5");
    $statement->execute();

    return $statement->fetchAll();
}
function hm_time_ago($timestamp)
{
    date_default_timezone_set('Asia/Bangkok');
    $time_ago = strtotime($timestamp);
    $current_time = time();
    $time_difference = $current_time - $time_ago;
    $seconds = $time_difference;
    $minutes      = round($seconds / 60);           // value 60 is seconds  
    $hours           = round($seconds / 3600);           //value 3600 is 60 minutes * 60 sec  
    $days          = round($seconds / 86400);          //86400 = 24 * 60 * 60;  
    $weeks          = round($seconds / 604800);          // 7*24*60*60;  
    $months          = round($seconds / 2629440);     //((365+365+365+365+366)/5/12)*24*60*60  
    $years          = round($seconds / 31553280);     //(365+365+365+365+366)/5 * 24 * 60 * 60  
    if ($seconds <= 60) {
        return "Just Now";
    } else if ($minutes <= 60) {
        if ($minutes == 1) {
            return "one minute ago";
        } else {
            return "$minutes minutes ago";
        }
    } else if ($hours <= 24) {
        if ($hours == 1) {
            return "an hour ago";
        } else {
            return "$hours hours ago";
        }
    } else if ($days <= 7) {
        if ($days == 1) {
            return "yesterday";
        } else {
            return "$days days ago";
        }
    } else if ($weeks <= 4.3) //4.3 == 52/12  
    {
        if ($weeks == 1) {
            return "a week ago";
        } else {
            return "$weeks weeks ago";
        }
    } else if ($months <= 12) {
        if ($months == 1) {
            return "a month ago";
        } else {
            return "$months months ago";
        }
    } else {
        if ($years == 1) {
            return "one year ago";
        } else {
            return "$years years ago";
        }
    }
}
//==========get user leaves today
function getuserLeaveToday(int $uid, $date): array
{
    global $connection;
    $statement = $connection->prepare("select * from total_requests where start_date=:date and uid=:uid");
    $statement->execute(
        [
            ':date' => $date,
            ':uid' => $uid
        ]
    );
    return $statement->fetchAll();
}
//==========get  all leave requests of a user=======
function getUserLeavesNotify(int $uid, int $status)
{
    global $connection;
    $statement = $connection->prepare("select * from total_requests where uid=:uid and seen order by request_id limit 5");
    $statement->execute();

    return $statement->fetchAll();
}
