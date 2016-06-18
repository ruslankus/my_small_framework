<?php
/**
 * Created by PhpStorm.
 * User: ruslankus
 * Date: 13/06/16
 * Time: 17:50
 */

namespace App;


class View implements \Countable
{
    protected $data = [];

    public function __set($k,$v)
    {
        $this->data[$k] = $v;
    }


    public function __get($k)
    {
        return $this->data[$k];
    }
    
    public function __isset($k){
        return !empty($this->data[$k])? $this->data[$k] : null;
    } 


    public function display($template)
    {
        echo $this->render($template);
    }


    /**
     * @param $template string
     * @return string
     */
    public function render($template)
    {
        ob_start();
        
        foreach ($this->data as $prop => $value)
        {

            $$prop = $value;
            $data[$prop] = $value;
        }
        
        include $template;
        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }

    /**
     * Count elements of an object
     * @link http://php.net/manual/en/countable.count.php
     * @return int The custom count as an integer.
     * </p>
     * <p>
     * The return value is cast to an integer.
     * @since 5.1.0
     */
    public function count()
    {
        return count($this->data);
    }
}