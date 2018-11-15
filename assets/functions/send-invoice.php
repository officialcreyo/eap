<?php

function mail_att($to, $subject, $message, $sender, $sender_email, $reply_email, $dateien) {   
   if(!is_array($dateien)) {
      $dateien = array($dateien);
   }   
   
   $attachments = array();
   foreach($dateien AS $key => $val) {
      if(is_int($key)) {
        $datei = $val;
        $name = basename($datei);
     } else {
        $datei = $key;
        $name = basename($val);
     }
     
      $size = filesize($datei);
      $data = file_get_contents($datei);
      $type = mime_content_type($datei);
     
      $attachments[] = array("name"=>$name, "size"=>$size, "type"=>$type, "data"=>$data);
   }
 
   $mime_boundary = "-----=" . md5(uniqid(microtime(), true));
 
   $header  = "From:".$sender."<".$sender_email.">\n";
   $header .= "Reply-To:".$reply_email."\n";
 
   $header.= "MIME-Version: 1.0\r\n";
   $header.= "Content-Type: multipart/mixed;\r\n";
   $header.= " boundary=\"".$mime_boundary."\"\r\n";
   $headers .= "Organization: Team Prismatic\r\n";
 
   $encoding = mb_detect_encoding($message, "utf-8, iso-8859-1, cp-1252");
   $content = "This is a multi-part message in MIME format.\r\n\r\n";
   $content.= "--".$mime_boundary."\r\n";
   $content.= "Content-Type: text/html; charset=\"$encoding\"\r\n";
   $content.= "Content-Transfer-Encoding: 8bit\r\n\r\n";
   $content.= $message."\r\n";
 
   //$anhang ist ein Mehrdimensionals Array
   //$anhang enthält mehrere Dateien
   foreach($attachments AS $dat) {
         $data = chunk_split(base64_encode($dat['data']));
         $content.= "--".$mime_boundary."\r\n";
         $content.= "Content-Disposition: attachment;\r\n";
         $content.= "\tfilename=\"".$dat['name']."\";\r\n";
         $content.= "Content-Length: .".$dat['size'].";\r\n";
         $content.= "Content-Type: ".$dat['type']."; name=\"".$dat['name']."\"\r\n";
         $content.= "Content-Transfer-Encoding: base64\r\n\r\n";
         $content.= $data."\r\n";
   }
   $content .= "--".$mime_boundary."--"; 
   
   return mail($to, $subject, $content, $header);
}
 
?>