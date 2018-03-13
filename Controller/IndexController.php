<?php

/**
 * Created by PhpStorm.
 * User: Гость
 * Date: 29.12.2015
 * Time: 20:02
 */
class IndexController
{
    public function indexAction()
    {
        return 1;
    }

    public function aboutAction(Request $request)
    {
        return 2;
    }

    public function contactAction(Request $request)
    {
        return 3;
    }
}
?>
