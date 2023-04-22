<? defined("FKN") or http_response_code(403).die('Forbidden!');

class Profiler implements JsonSerializable
{
    private bool $finished = false;

    //Time (us (microtime))
    private float $time;
    
    //Memory (B (bytes))
    private int $memory_used;
    private int $memory_allocated;
    
    
    
    public function __construct (bool $useFirstScriptValues=false)
    {
        if($useFirstScriptValues){
            $this->time        = PROFILER_TIME;
            //$this->memory_used      = PROFILER_MEMORY;
            //$this->memory_allocated = PROFILER_MEMORY_REAL;
        }else{
            $this->time        = microtime(true);
            //$this->memory_used      = memory_get_usage(false);
            //$this->memory_allocated = memory_get_usage(true);
        }
    }
    
    public function end()
    {
        if($this->finished){
            return $this;
        }
        $this->finished = true;

        $this->time             = (microtime(true) - $this->time);
        $this->memory_used      = memory_get_peak_usage(false);
        $this->memory_allocated = memory_get_peak_usage(true);
    }
    
    public function jsonSerialize ()
    {
        self::end();
        return [
            'time' => TIME::FORMAT($this->time),
            'memory_used' => STORAGE::FORMAT($this->memory_used),
            'memory_allocated' => STORAGE::FORMAT($this->memory_allocated),
        ];
    }
    
    public function format()
    {
        self::end();
        return
            "<table>" .
                "<tr><td>Memory Allocated:</td><td>" . STORAGE::FORMAT($this->memory_allocated) . "</td></tr>" .
                "<tr><td>Memory Used:</td><td>" . STORAGE::FORMAT($this->memory_used) . "</td></tr>" .
                "<tr><td>Time:</td><td>" .TIME::FORMAT($this->time) . "</td></tr>" .
            "</table>";
    }

}
