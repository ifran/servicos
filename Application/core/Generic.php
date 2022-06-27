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
        echo "<script>window.location.href = '" . HOST_PUBLIC . $sPage . "' </script>";
        die();
    }
    
    function alert($sMsg)
    {
        echo "<script>alert('" . $sMsg . "');</script>";
    }

    function setSelected($sName, $iValue)
    {
        if (isset($_POST[$sName]) && $_POST[$sName] == $iValue)
        {
            return 'selected';
        }
    }
?>