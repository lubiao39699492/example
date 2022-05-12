if(!function_exists('array_each')){
    function array_each(array &$arr, $loop = false)
    {
        if($arr == null){
            return false;
        }
        $key   = key($arr);
        $value = current($arr);
        
        if ($key === null) {
            if($loop == true){
                reset($arr);
                return array_each($arr, $loop);
            }
            return false;
        }
        
        next($arr);
        
        return array(
            $key,
            $value
        );
    }
}
