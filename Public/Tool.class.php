<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/2
     * Time: 9:41
     */

    class Tool{
        static public function alertLocation ($info,$url)
        {
            if (!empty($info)) {
                echo "<script type='text/javascript'>alert('$info');location.href='$url';</script>";
                exit();
            } else {
                header('Location:'.$url);
                exit();
            }
        }
        static public function alertBack ($info)
        {
            echo "<script type='text/javascript'>alert('$info');history.back();</script>";
            exit();
        }

        //unset session
        static public function unSession() {
            if (session_start()) {
                session_destroy();
            }
        }
        //display html filter

        static public function htmlString ($data)
        {
                                     //简单的递归使用
            if (is_array($data)) {
                foreach ($data as $key => $value) {
                    $string[$key]=self::htmlString($value);
                }
            } elseif (is_object($data)) {
                foreach ($data as $key => $value) {
                    @$string->$key=self::htmlString($value);
                }
            } else {
                $string=htmlspecialchars($data);
            }

            return @$string;
        }

        //
        //sql data filter
        static public function mysqlString ($data)
        {
            return  !get_magic_quotes_gpc() ?addcslashes($data) : $data;
        }


        //弹窗赋值关闭(上传专用)
        static public function alertOpenerClose($_info,$_path) {
            echo "<script type='text/javascript'>alert('$_info');</script>";
            echo "<script type='text/javascript'>opener.document.content.thumbnail.value='$_path';</script>";
            echo "<script type='text/javascript'>opener.document.content.pic.style.display='block';</script>";
            echo "<script type='text/javascript'>opener.document.content.pic.src='$_path';</script>";
            echo "<script type='text/javascript'>window.close();</script>";
            exit();
        }

    }