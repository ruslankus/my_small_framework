<?php

namespace App;


class MultiException extends \Exception implements \ArrayAccess, \Iterator , \Countable
{
    use TCollection;


}