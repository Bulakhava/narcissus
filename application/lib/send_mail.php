<?php

function send_mail($mailer_arr)
{
    $mailer_arr = array_merge(array('to' => '', 'from' => '', 'subject' => '', 'message' => '', 'cc' => '', 'bcc' => '', 'file_name' => '', 'file_path' => ''), $mailer_arr);
    $EmailTo = strip_tags($mailer_arr['to']);
    $EmailFrom = strip_tags($mailer_arr['from']);
    $EmailSubject = $mailer_arr['subject'];
    $EmailMessage = stripslashes($mailer_arr['message']);
    $EmailCc = strip_tags($mailer_arr['cc']);
    $EmailBcc = strip_tags($mailer_arr['bcc']);
    $filepath = $mailer_arr['file_path'];
    $tmp = explode("/", $filepath);
    $filename = $mailer_arr['file_name'] ? $mailer_arr['file_name'] : end($tmp);
    $eol = PHP_EOL;
    $headers = "";
    if (!empty($EmailFrom))
        $headers .= "From: " . $EmailFrom . $eol;
    if (!empty($EmailFrom))
        $headers .= "Reply-To: " . $EmailFrom . $eol;
    if (!empty($EmailCc))
        $headers .= "CC: " . $EmailCc . $eol;
    if (!empty($EmailBcc))
        $headers .= "BCC: " . $EmailBcc . $eol;
    $headers .= "MIME-Version: 1.0" . $eol;
    /** in case file path is not set then send html mail with no attachment **/
    if (!isset($mailer_arr['file_path']) || $mailer_arr['file_path'] == '') {
        $headers .= "Content-type: text/html" . $eol;
        if (mail($EmailTo, $EmailSubject, $EmailMessage, $headers))
            return true;
        else
            return false;
    }
    $attachment = chunk_split(base64_encode(file_get_contents($filepath)));
    $separator = md5(time());
    $headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"";
    $body = "";
    $body .= "--" . $separator . $eol;
    $body .= "Content-Type: text/html; charset=\"iso-8859-1\"" . $eol;
    $body .= "Content-Transfer-Encoding: 7bit" . $eol . $eol;//optional defaults to 7bit
    $body .= $EmailMessage . $eol;
    $body .= "--" . $separator . $eol;
    $body .= "Content-Type: application/octet-stream; name=\"" . $filename . "\"" . $eol;
    $body .= "Content-Transfer-Encoding: base64" . $eol;
    $body .= "Content-Disposition: attachment" . $eol . $eol;
    $body .= $attachment . $eol;
    $body .= "--" . $separator . "--";
    if (mail($EmailTo, $EmailSubject, $body, $headers)) {
        return true;
    } else {
        return false;
    }
}
