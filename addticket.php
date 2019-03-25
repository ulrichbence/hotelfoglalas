<?php 
session_start();
                if (isset($_POST["sendTicket"])) {
                    require_once "inc/db.php";
                    $db = db::get();
                    $selectUserDataQuery = "SELECT ID FROM users WHERE userName ='".$_SESSION["userName"]."'";
                    $userData = $db->getArray($selectUserDataQuery);
                     $message = $db->escape($_POST["message"]);
                    $now = date("Y-m-d");

                    foreach ($userData as $user) {
                        $userid = $user["ID"];
                    }

                    $title = $db->escape($_POST["title"]);
                    if (empty($title)) {
                        $title = "No title given.";
                    }

                    if (empty($message)) {
                        header('Location: ' . $_SERVER['HTTP_REFERER']);
                    }

                    $submitTicketQuery = "INSERT INTO `tickets` (`id`, `title`, `message`, `submitted_at`, `user_id`) VALUES (NULL, '$title', '$message', '$now', '$userid')";
                    $submit = $db->query($submitTicketQuery);
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                }
                
             ?>