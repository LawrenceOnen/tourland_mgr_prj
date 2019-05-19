<?php

class Utils{
    //define function name
    function m_log($arMsg)
    {
        //define empty string
        $stEntry="";
        //get the event occur date time,when it will happened
        $arLogData['event_datetime']='['.date('D Y-m-d h:i:s A').'] [client '.$_SERVER['REMOTE_ADDR'].']';
        //if message is array type
        if(is_array($arMsg))
        {
            //concatenate msg with datetime
            foreach($arMsg as $msg)
                $stEntry.=$arLogData['event_datetime']." ".$msg."\r\n";
        }
        else
        {   //concatenate msg with datetime
            
            $stEntry.=$arLogData['event_datetime']." ".$arMsg."\r\n ";
        }
        //create file with current date name
        $stCurLogFileName='log_'.date('Ymd').'.txt';
        //open the file append mode,dats the log file will create day wise
        $fHandler=fopen(LOG_PATH.$stCurLogFileName,'a+');
        //write the info into the file
        fwrite($fHandler,$stEntry);
        //close handler
        fclose($fHandler);
    }
    
    function uuid()
    {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
            );
    }
}