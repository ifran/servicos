<?php
    function validateSession($sPage = null)
    {
        if (!isset($_SESSION['bLogin']) AND $sPage != 'Login' AND $sPage != 'Register')
        {
            header('location:Login');
        }
    }

    function pre($sObj) 
    {
        $sRet  = '<pre>';
        $sRet .= print_r($sObj, true);
        $sRet .= '</pre>';
        echo $sRet;
    }

    function headerLocation($sPage)
    {
        echo "<script>window.location.href = '" . $sPage . "' </script>";
        die();
    }
?>