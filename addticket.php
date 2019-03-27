<?php 
session_start();
                if (isset($_POST["sendTicket"])) {
                    require_once "inc/db.php";
                    $db = db::get();

                    $title = $db->escape($_POST["title"]);
                    $message = $db->escape($_POST["message"]);
                    $now = date("Y-m-d");

                    if (isset($_SESSION["userName"])) {
                        $selectUserDataQuery = "SELECT ID FROM users WHERE userName ='".$_SESSION["userName"]."'";
                        $userData = $db->getArray($selectUserDataQuery); 

                        foreach ($userData as $user) {
                            $userid = $user["ID"];
                        }
                    }

                    else
                    {
                        $userid = 9;
                    }

                    if (empty($title)) {
                        $title = "No title given.";
                    }

                    if (empty($message)) {
                        header('Location: ' . $_SERVER['HTTP_REFERER']);
                    }
                    else
                    {
                        $submitTicketQuery = "INSERT INTO `tickets` (`id`, `title`, `message`, `submitted_at`, `user_id`) VALUES (NULL, '$title', '$message', '$now', '$userid')";
                        $submit = $db->query($submitTicketQuery);
                        header('Location: ' . $_SERVER['HTTP_REFERER']);
                    }

                    
                }
                
             ?>