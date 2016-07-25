<?php
    // All database manipulation described here

    require_once(ROOT_DIR . "entities/message.php");
     
    
    function CountMessages()
    {
        $sql = "SELECT COUNT(*) FROM messages";
        $result = $GLOBALS['sqli']->query($sql);
        $row = $result->fetch_row();
        return $row[0];
    }
    
    function GetAllMessages()
    {
        $messages = array();
        $sql = "SELECT * FROM messages";
        $result = $GLOBALS['sqli']->query($sql);
        while($row = $result->fetch_array())
        {
            $message = new Message($row['id'], $row['header'],
                    $row['content'], $row['brief']);
            array_push($messages, $message);
        }
        return $messages;
    }
    
    function GetWholeMessage($message_id)
    {
        $sql = "SELECT * FROM messages WHERE id=" . $message_id . ";";
        $result = $GLOBALS['sqli']->query($sql);
        $row = $result->fetch_array();
        $message = new Message($row['id'], $row['header'],
                $row['content'], $row['brief']);
        return $message;
    }
?>
